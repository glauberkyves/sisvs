<?php

		namespace Datasus\Sisvs\ExpoEpi\AcompanhamentoBundle\Controller;

		use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
		use Symfony\Component\HttpFoundation\Request;
		use Symfony\Component\HttpFoundation\Response;

		class AcompanharDuplicataController extends CrudController
		{
				protected $service = 'datasus_sisvs_expoepi_autor.inscricao';
				protected $baseRoute = 'acompanhar_duplicata';

				public function searchAction()
				{
						$request = $this->getRequest();
						$params  = array();
						parse_str($request->get('data'), $params);

						if (isset($params['tpConsulta']) && $params['tpConsulta'] == 'bloqueadas') {
								$data = $this->getService()->getCheckDuplicityBlock($request);
						} else {
								$data = $this->getService()->getCheckDuplicity($request);
						}

						$this->getAllConfigGrid($data);

						return $this->renderJson($data);
				}

				public function getAllConfigGrid($data)
				{
						foreach ($data->rows as $key => $value) {
								$html         = $this->extension('html');
								$viewAnexo    = $this->generateUrl($this->baseRoute . '_view_downloads');
								$viewPdfRoute = $this->generateUrl($this->baseRoute . '_view_pdf', array('id' => $value['id']));

								$id = $value['id'];
								$html->url(array(
										'title' => 'Visualizar dados da Inscrição',
										'href'  => $viewPdfRoute,
								), 'file');

								$html->url(array(
										'title'   => 'Download Anexos',
										'onclick' => "utils.view('{$value['id']}', '{$viewAnexo}')",
								), 'download');
								$check                                  = "<input id=\"check\" type=\"checkbox\" value=\"{$id}\" name=\"{$id}\">";
								$data->rows[$key]['cell']['dtSituacao'] = date('d/m/Y H:i:s', strtotime($value['cell']['dtSituacao']));
								$data->rows[$key]['cell']['dsTitulo']   = html_entity_decode(strip_tags($data->rows[$key]['cell']['dsTitulo']));

								$data->rows[$key]['cell']['check']      = $check;
								$data->rows[$key]['cell']['dtSituacao'] = date('d/m/Y H:i:s', strtotime($value['cell']['dtSituacao']));
								$data->rows[$key]['cell']['acao']       = $html->render();
						}
				}

				public function viewInscricaoAreaAction(Request $request)
				{
						$this->params['area'] = $this->getService()->getInscricoesPorArea($request);

						return parent::viewAction($request);
				}

				public function toogleAction()
				{
						foreach ($this->getRequest()->request->all() as $key => $sqCodigo) {
								$sqCodigo = str_replace('jqg_grid_', '', $key);
								$this->getService()->toogleDuplicata($sqCodigo);
						}

						$this->addMessage('Inscrição(ões) bloqueada(s) com sucesso.', 'success');

						return $this->redirect($this->generateUrl($this->baseRoute));
				}

				public function toogleBlockAction()
				{
						foreach ($this->getRequest()->request->all() as $key => $sqCodigo) {
								$sqCodigo = str_replace('jqg_grid_', '', $key);
								$this->getService()->toogleBlock($sqCodigo);
						}

						$this->addMessage('Inscrição(ões) desbloqueada(s) com sucesso.', 'success');

						return $this->redirect($this->generateUrl($this->baseRoute));
				}

				public function init()
				{
						$this->params['cmbEnvento'] = $this->getService('datasus_sisvs_expoepi_administrativo.evento')
								->findByStAtivo('S', array('noEvento' => 'ASC'));

				}

				/**
				 * @param Request $request
				 *
				 * @return Response
				 */
				public function downloadAction(Request $request)
				{
						$srvAnexo = $this->getService('datasus_sisvs_expoepi_autor.anexo');
						$coAnexo  = $srvAnexo->find($this->getRequest()->get('id'));

						$filename = $coAnexo->getNoArquivo();
						$content  = stream_get_contents($coAnexo->getDsArquivo());

						$response = new Response();
						$response->setStatusCode(200);

						$response->headers->set('Content-Description', 'File Transfer');
						$response->headers->set('Content-Type', 'application/force-download');
						$response->headers->set('Content-Type', 'application/octet-stream');
						$response->headers->set('Content-Type', 'application/download');
						$response->headers->set('Content-Disposition', 'attachment;Filename="' . $filename . '";');
						$response->headers->set('Content-Transfer-Encoding', 'binary');
						$response->headers->set('Expires', '0');
						$response->headers->set('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
						$response->headers->set('Pragma', 'public');

						$response->prepare($request);
						$response->setContent($content);
						$response->sendHeaders();
						$response->sendContent();

						return $response;
				}

				public function viewDownloadsAction(Request $request)
				{
						return parent::viewAction($request);
				}

		}
