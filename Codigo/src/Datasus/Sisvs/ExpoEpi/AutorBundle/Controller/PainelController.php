<?php

		namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Controller;


		use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
		use Symfony\Component\HttpFoundation\Request;

		class PainelController extends CrudController
		{
				protected $service = 'datasus_sisvs_expoepi_autor.inscricao';
				protected $baseRoute = 'autor_painel';

				public function __construct($container = null)
				{
						if ($container) {
								$this->setContainer($container);
						}
				}

				public function indexAction(Request $request)
				{
						$coSeqModalidade = $request->get('coSeqModalidade');
						$srvModalidade   = 'datasus_sisvs_expoepi_administrativo.modalidade';

						$entity                     = $this->getService($srvModalidade)->find($coSeqModalidade);
						$this->params['modalidade'] = $entity;

						return parent::indexAction($request);
				}

				public function searchAction()
				{
						$request   = $this->getRequest();
						$coUsuario = $this->getUser()->getAttr()->getCoSeqUsuario();
						$data      = $this->getService()->getInscricaoModalidade($request, $coUsuario);
						$this->getAllConfigGrid($data);

						return $this->renderJson($data);
				}

				public function getAllConfigGrid($data)
				{
						foreach ($data->rows as $key => $value) {
								$html      = $this->extension('html');
								$editRoute = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
								$pdfRoute  = $this->generateUrl($this->baseRoute . '_view_pdf', array('id' => $value['id']));
								if ($value['cell']['dsSituacao'] == 'Inscrição Pendente') {
										$html->url(array(
												'href'  => $editRoute,
												'title' => 'Alterar'
										), 'edit');
								}

								if ($value['cell']['dsSituacao'] == 'Inscrição Pendente') {
										$html->url(array(
												'title'   => 'Enviar Inscrição',
												'onclick' => "Inscricao.send({$value['id']})",
										), 'enviar');
								}
								$html->url(array(
										'title' => 'Visualizar Pdf',
										'href'  => $pdfRoute,
								), 'view');


								switch ($data->rows[$key]['cell']['coSituacao']) {
										case SituacaoInscricaoService::ST_SITUACAO_PENDENTE:
												$situacao                               = $data->rows[$key]['cell']['dsSituacao'];
												$data->rows[$key]['cell']['dsSituacao'] = "<span class=\"btn-danger\">{$situacao}</span>";
												break;

										case SituacaoInscricaoService::ST_SITUACAO_ANALISE_NA_TRIAGEM:
										case SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM:
										case SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM:
										case SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO:
										case SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO:
										case SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA:
												$data->rows[$key]['cell']['dsSituacao'] = 'Em análise';
												break;
								}

								$data->rows[$key]['cell']['dsTitulo'] = html_entity_decode(strip_tags($data->rows[$key]['cell']['dsTitulo']));

								$data->rows[$key]['cell']['acao'] = $html->render();
						}
				}

				public function sendAction(Request $request)
				{
						$coInscricao = $request->get('id');

						if ($coInscricao) {
								$this->entity = $this->getService()->send($coInscricao);

								return $this->redirectSave();

						} else {
								$form = $request->get('datasus_sisvs_expoepi_autorbundle_inscricaoentity');

								try {

										if ($form['coSeqInscricao']) {
												$request->query->set('id', $form['coSeqInscricao']);
												$action = $this->editAction($request);

												if ($this->getSession()->getFlashBag()->get('success')) {
														$this->addMessage('Inscrição Enviada com sucesso!', 'success');
												}

												return $action;
										} else {
												$request->query->set('coSeqModalidade', $request->get('coSeqModalidade'));
												$action = $this->createAction($request);

												if ($this->getSession()->getFlashBag()->get('success')) {
														$this->addMessage('Inscrição Enviada com sucesso!', 'success');
												}

												return $action;
										}
								} catch (\Excpetion $exc) {
										var_dump($exc->getMessage());
										die;
								}
						}
				}

				protected function redirectSave()
				{
						$coModalidade = $this->entity->getCoTema()->getCoArea()->getCoModalidade()->getCoSeqModalidade();

						return $this->redirect($this->generateUrl($this->baseRoute, array('coSeqModalidade' => $coModalidade)));
				}

				public function editAction(Request $request)
				{
						$id           = $request->get('id');
						$this->entity = $this->getService()->findOneByCoSeqInscricao($id);

						$this->params['dataInscricao'] = $this->entity->getDtVeracidade();
						$this->params['modalidade'] = $this->entity->getCoTema()->getCoArea()->getCoModalidade();
						$this->getConfigModaliadde();
						$this->resolveMessageSuccess();

						if ($this->entity->getCoInstituicao()->getCoMunicipioIbge()) {
								$coMunicipio = $this->entity->getCoInstituicao()->getCoMunicipioIbge()->getCoMunicipioIbge();
								$coEstado    = $this->entity->getCoInstituicao()->getCoMunicipioIbge()->getCoUfIbge()->getCoUfIbge();
								$noRegiao    = $this->entity->getCoInstituicao()->getCoMunicipioIbge()->getCoUfIbge()->getCoRegiao()->getNoRegiao();

								$this->params['municipioInst'] = $coMunicipio;
								$this->params['estadoInst']    = $coEstado;
								$this->params['regiaoInst']    = $noRegiao;
						} else {
								$this->params['municipioInst'] = 0;
								$this->params['estadoInst']    = 0;
								$this->params['regiaoInst']    = null;
						}

						if (date('Y-m-d') <= $this->params['modalidade']->getCoFormularioDeInscricao()->getDtFim()->format('Y-m-d')) {
								return parent::editAction($request);
						} else {
								$this->addMessage('Período de inscrição expirado', 'warning');
						}

						return $this->renderAction('DatasusSisvsExpoEpiAutorBundle:Painel:index.html.twig');
				}

				protected function resolveMessageSuccess()
				{
						$msgSuccess = "Inscrição salva com sucesso!."
								. 'Observação: Sua inscrição só será finalizada depois de ser ENVIADA, porém, '
								. 'uma vez enviada, não poderá mais ser alterada.';

						if ($this->getRequest()->get('id')) {
								$msgSuccess = 'Alteração realizada com sucesso!.'
										. 'Observação: Sua inscrição só será finalizada depois de ser ENVIADA, porém, '
										. 'uma vez enviada, não poderá mais ser alterada.';
						}

						return $msgSuccess;
				}

				public function getConfigModaliadde()
				{
						$this->params['formulario'] = $this->params['modalidade']->getCoFormularioDeInscricao();
						$this->params['user']       = $this->getUser()->getAttr();

						$srvMunicipio = 'datasus_sisvs_expoepi_administrativo.municipio';
						$coMunicipio  = $this->getService($srvMunicipio)->find($this->getUser()->getAttr()->getCoMunicipioIbge());

						if ($coMunicipio) {
								$this->params['municipioUser'] = $coMunicipio->getNoMunicipio();
								$this->params['estadoUser']    = $coMunicipio->getCoUfIbge()->getNoUf();
								$this->params['regiaoUser']    = $coMunicipio->getCoUfIbge()->getCoRegiao()->getNoRegiao();
						}


						if($this->entity->getCoSeqInscricao()){
								$this->params['inscricaoApresentacao'] = $this->getService()->ordemAPresetacaoInscricao($this->entity);
						}

						if (!$this->entity->getCoSeqInscricao()) {
								$index = 0;
								foreach ($this->params['modalidade']->getCoModalidadeApresentacao() as $coModalidadeApresentacao) {
										$index++;

										$srvInscricaoApresentacao = 'datasus_sisvs_expoepi_autor.inscricao_apresentacao';
										$enIncricaoApresentacao   = $this->getService($srvInscricaoApresentacao)->getEntity();

										$enIncricaoApresentacao->setCoApresentacao($coModalidadeApresentacao->getCoApresentacao());
										$enIncricaoApresentacao->setNuOrdem($index);
										$this->entity->getCoInscricaoApresentacao()->add($enIncricaoApresentacao);
								}
						}
				}

				public function createAction(Request $request)
				{
						$coSeqModalidade = $request->get('coSeqModalidade');
						$coSeqFormulario = $request->get('coSeqFormulario');
						$srvModalidade   = 'datasus_sisvs_expoepi_administrativo.modalidade';

						$this->entity               = $this->getService()->getEntity();
						$this->params['modalidade'] = $this->getService($srvModalidade)->find($coSeqModalidade);

						$this->getConfigModaliadde();

						if ($coSeqFormulario) {
								return parent::createAction($request);
						}

						if (date('Y-m-d') <= $this->params['modalidade']->getCoFormularioDeInscricao()->getDtFim()->format('Y-m-d')) {
								return parent::createAction($request);
						} else {
								$this->addMessage('Período de inscrição expirado', 'warning');
						}

						return $this->renderAction('DatasusSisvsExpoEpiAutorBundle:Painel:index.html.twig');
				}

				public function acessarAction(Request $request)
				{
						$this->init();

						$srvEvento = 'datasus_sisvs_expoepi_administrativo.evento';
						$criteria  = array('anEvento' => date('Y'), 'stAtivo' => 'S');

						$srvUsuario = 'datasus_sisvs_base_service_scpa';
						$user       = $this->getService($srvUsuario)->find($this->getUser()->getAttr()->getCoSeqUsuario());

						$this->params['evento'] = $this->getService($srvEvento)->findOneBy($criteria);

						$arrModalidade = array();
						foreach ($user->getCoInscricao() as $entity) {
								$coModalidade = $entity->getCoTema()->getCoArea()->getCoModalidade()->getCoSeqModalidade();
								if (!in_array($coModalidade, $arrModalidade)) {
										$arrModalidade[] = $coModalidade;
								}
						}

						$this->params['arrModalidade'] = $arrModalidade;

						return $this->renderAction('DatasusSisvsExpoEpiAutorBundle:Painel:painel.html.twig');
				}

				public function init()
				{
						$this->params['urlSCPA'] = $this->container->getParameter('scpa_cadastro');
				}

				protected function renderAction($view = null)
				{
						$coModalidade = $this->getRequest()->get('coSeqModalidade');

						$configRoute = array(
								'autor_painel' => array(
										'label' => 'Informações da Inscrição',
										'url'   => $this->generateUrl('autor_painel', array(
														'coSeqModalidade' => $coModalidade
												)
										)
								)
						);

						$this->setCustomBreadCrumb($configRoute);

						return parent::renderAction($view);
				}

				protected function getParamsForm()
				{
						return array(
								'action' => $this->generateUrl($this->getRequest()->attributes->get('_route'), array(
										'id'              => $this->getRequest()->get('id'),
										'coSeqModalidade' => $this->getRequest()->get('coSeqModalidade')
								)),
								'method' => 'POST',
						);
				}

				public function viewPdfAction()
				{
						$id           = $this->getRequest()->query->get('id');
						$entity = $this->getService()->findOneByCoSeqInscricao($id);
						$this->params['inscricaoApresentacao'] = $this->getService()->ordemAPresetacaoInscricao($entity);

						$this->params['dataInscricao'] = $entity->getDtVeracidade();

						$this->params['user'] = $this->getUser()->getAttr();
						$srvMunicipio         = 'datasus_sisvs_expoepi_administrativo.municipio';
						$coMunicipio          = $this->getService($srvMunicipio)->find($this->getUser()->getAttr()->getCoMunicipioIbge());
						if ($coMunicipio) {
								$this->params['municipioUser'] = $coMunicipio->getNoMunicipio();
								$this->params['estadoUser']    = $coMunicipio->getCoUfIbge()->getNoUf();
								$this->params['regiaoUser']    = $coMunicipio->getCoUfIbge()->getCoRegiao()->getNoRegiao();
						}
						return parent::viewPdfAction();
				}

		}