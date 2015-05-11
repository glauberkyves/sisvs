<?php

		namespace Datasus\Sisvs\ExpoEpi\EmailBundle\Controller;

		use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
		use Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\Dominio\Atores;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
		use Doctrine\Common\Collections\ArrayCollection;
		use Symfony\Component\HttpFoundation\Request;
		use Symfony\Component\HttpFoundation\Response;

		class MalaDiretaController extends CrudController
		{
				protected $service = 'datasus_sisvs_expoepi_email.email';
				protected $baseRoute = 'datasus_sisvs_expoepi_email_mala_direta';

				public function indexAction(Request $request)
				{
						$this->init();

						return $this->renderAction();
				}

				public function init()
				{
						$srvEvento = $this->getService('datasus_sisvs_expoepi_administrativo.evento');

						$this->params['cmbEnvento'] = $srvEvento->findByStAtivo('S', array('noEvento' => 'ASC'));
						$this->params['cmbAtores'] = Atores::getAtores();

						$this->getRequest()->getSession()->set('arrInscricao', new ArrayCollection());
				}

				public function getAllConfigGrid($data)
				{
						foreach ($data->rows as $key => $value) {
								$coUsuario = $data->rows[$key]['cell']['coSeqUsuario'];
								$email = $value['cell']['dsEmail'];

								$check = "<input id=\"check\" type=\"checkbox\" value=\"{$email}\" name=\"coUsuario[{$coUsuario}]\">";
								$anexo = "<input id=\"anexo\" type=\"checkbox\" value=\"{$coUsuario}\" name=\"coUsuario[{$coUsuario}]\" disabled=\"disabled\">";

								$data->rows[$key]['cell']['anexo'] = $anexo;
								$data->rows[$key]['cell']['check'] = $check;
						}
				}

				/**
				 * @param Request $request
				 *
				 * @return Response
				 */
				public function viewAction(Request $request)
				{
						$coUsuario = $this->getRequest()->get('id');
						$params = array();
						parse_str($request->query->get('data'), $params);
						$service = 'datasus_sisvs_expoepi_autor.inscricao';
						$this->getRequest()->request->set('coUsuario', $coUsuario);
						$this->getRequest()->request->set('envolvidos', $params['envolvidos']);
						$this->getRequest()->request->set('coSeqEvento', $params['coSeqEvento']);
						$this->getRequest()->request->set('coSeqModalidade', $params['coSeqModalidade']);
						$this->getRequest()->request->set('coSeqArea', $params['coSeqArea']);
						$this->getRequest()->request->set('coSeqTema', $params['coSeqTema']);
						$this->getRequest()->request->set('coSituacao', $params['coSituacao']);
						$result = $this->getService($service)->findOneByNuInscricao($this->getRequest());
						$this->params['dados'] =  $result;

						$this->params['usuario'] = $coUsuario;
						return $this->renderAction();
				}

				public function anexoAction(Request $request)
				{
						$session = $this->getRequest()->getSession();
						$arrInscricao = $session->get('arrInscricao');
						$coUsuario = null;
						$inscricao = array();
						foreach($this->getRequest()->query->get('usuario') as $key=>$value){
								$coUsuario = $key;
								$inscricao[$key] = $value;
						}
						$arrInscricao->set($coUsuario, array('inscricao'=>$inscricao));

						return $this->renderJson(true);
				}

				public function writeMailAction()
				{
						$session = $this->getRequest()->getSession();
						$arrInscricao = $session->get('arrInscricao');

						$idsInscricao = array();
						$arrUsuario = array();
						foreach ($this->getRequest()->request->all() as $key => $value) {
								if ($key != 'inscricao') {
										foreach ($arrInscricao as $usuario => $inscricao) {
												$arrUsuario[] = $usuario;
												foreach ($inscricao['inscricao'] as $coInscricao) {
														$idsInscricao[] = $coInscricao;
												}
										}
								}
						}
						$result = $this->getService()->findAllCoSeqUsuario($arrUsuario);
						$this->params['listaEmail'] = null;
						foreach($result as $value){
								$this->params['listaEmail'] .= $value['dsEmail'].", ";
						}
						$this->params['listaEmail'] = rtrim($this->params['listaEmail'],", ");

						$this->params['email'] = $this->container->getParameter('mail_expoepi');
						return $this->renderAction();
				}

				public function sendAction()
				{
						$session = $this->getRequest()->getSession();
						$arrInscricao = $session->get('arrInscricao');
						$assunto = $this->getRequest()->get('assunto');
						$body = $this->getRequest()->get('body');
						$context = $this;

						foreach ($arrInscricao as $key => $value) {
								try {
										$arrAnexo[$key] = array();
										if (isset($value['inscricao']) && $value['inscricao']) {
												foreach($value['inscricao'] as $usuario=>$inscricao){
														if($usuario == $key){
																foreach($inscricao as $codigo){
																		$arrAnexo[$key][] = $context->generateZip($codigo);
																}
														}
												}
										}
										if ($this->getRequest()->files->get('multi-upload') != null) {
												foreach ($this->getRequest()->files->get('multi-upload') as $file) {
														if ($file != null) {
																if ($move = $file->move(sys_get_temp_dir(), $file->getClientOriginalName())) {
																		$arrAnexo[$key][] = $move->getPathname();
																}
														}
												}
										}
										$result = $this->getService()->findAllCoSeqUsuario(array($key));
										$this->sendMail($result[0]['dsEmail'], $assunto, $body, $arrAnexo[$key]);
										$this->addMessage('Mala Direta enviada com sucesso.', 'success');

								} catch (\Exception $exc) {
										if ('dev' == $this->container->get('kernel')->getEnvironment()) {
												$this->getService()->registerError($exc->getMessage());
										} else {
												$this->getService()->registerError('Ocorreu um erro interno.');
										}

										$logger = $this->container->get('logger');
										$logger->info('[ SISVS ] - Erro interno.');
										$logger->error($exc->getMessage());

										return $this->redirect($this->generateUrl('datasus_sisvs_expoepi_email_mala_direta'));
								}
						}
						return $this->redirectSave();
				}

				private function generateZip($nuInscricao)
				{
						$this->getRequest()->request->set('coSeqInscricao', $nuInscricao);
						$temp = sys_get_temp_dir();
						$html = $this->getDataPdf()->getContent();

						$nuInscricao = $this->getRequest()->request->get('coSeqInscricao');
						$nameFolder = $temp . '/' . $nuInscricao . date("Y_m_d_His") . '/';

						# cria pasta temporaria pra armazenar as incricoes e seus anexos
						if (!mkdir($nameFolder, 0777, true)) {
								$this->getService()->registerError('Erro ao gerar pasta de inscrições.');
								$this->getService()->triggerErrors();
						}

						$filePdf = $nameFolder . $nuInscricao . '.pdf';
						file_put_contents($filePdf, $this->getPdf()->generatePDF($html));

						$zip = new \ZipArchive();
						$filename = "{$nameFolder}{$this->getRequest()->request->get('coSeqInscricao')}.zip";

						if ($zip->open($filename, \ZipArchive::CREATE) !== true) {
								$this->getService()->registerError('Erro ao gerar Zip');
								$this->getService()->triggerErrors();
						}

						# adicioanndo a inscricao
						$zip->addFile($filePdf, $nuInscricao . '.pdf');
						$service = 'datasus_sisvs_expoepi_autor.anexo';
						$result = $this->getService($service)->getAnexoInscricao($nuInscricao);
						if($result){
								# adicioando seus anexos
								foreach ($result as $entity) {
										$fileAnexo = $nameFolder . $entity['noArquivo'];
										file_put_contents($fileAnexo, stream_get_contents($entity['dsArquivo']));
										$zip->addFile($fileAnexo, $entity['noArquivo']);
								}
						}

						$zip->close();

						return $filename;
				}

				public function getDataPdf()
				{
						$nuInscricao = $this->getRequest()->request->get('coSeqInscricao');
						$this->getRequest()->request->set('coSeqInscricao', $nuInscricao);
						$service = 'datasus_sisvs_expoepi_autor.inscricao';
						$result = $this->getService($service)->findOneByNuInscricao($this->getRequest());
						$request = $this->getRequest();
						$request->setMethod('GET');
						$request->query->set('id', $result[0]['coSeqInscricao']);

						$srv = $this->getService('datasus_sisvs_expoepi_acompanhamento.acompanhar_evento_controller');
						$srv->getRequest()->query->set('id', $result[0]['coSeqInscricao']);

						return $srv->getDataPdf($request);
				}

				public function sendMail($email, $assunto, $body, $anexos = array())
				{

						$message = new \Swift_Message();
						$message
								->setSubject($assunto)
								->setFrom($this->container->getParameter('mailer_destinatario'))
								->setTo(array($email))
								->setBody($body, 'text/html');

						if ($anexos) {
								foreach ($anexos as $anexo) {
										$attach = \Swift_Attachment::fromPath($anexo);
										$message->attach($attach);
								}
						}
						return $this->get('mailer')->send($message);
				}

				protected function renderAction($view = null)
				{
						$srvEvento = 'datasus_sisvs_expoepi_administrativo.evento';
						$this->params['imLogotipo'] = false;
						$this->params['entity'] = $this->getService($srvEvento)->findOneByAnEvento(date('Y'));
						if ($this->params['entity']) {
								if ($this->params['entity']->getImLogotipo()) {
										$file = getcwd()
												. DIRECTORY_SEPARATOR
												. 'bundles'
												. DIRECTORY_SEPARATOR
												. 'datasussisvsexpoepiemail'
												. DIRECTORY_SEPARATOR
												. 'images'
												. DIRECTORY_SEPARATOR
												. 'logo'
												. substr($this->params['entity']->getNoLogotipo(), strlen($this->params['entity']->getNoLogotipo()) - 4);

										file_put_contents($file, stream_get_contents($this->params['entity']->getImLogotipo()));
								}
						}

						return parent::renderAction();
				}
		}
