<?php

		namespace Datasus\Sisvs\ExpoEpi\RelatorioBundle\Controller;

		use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
		use Doctrine\ORM\Query\Expr;
		use Symfony\Component\HttpFoundation\Response;

		class RelatorioInscricaoController extends CrudController
		{
				protected $service = 'datasus_sisvs_expoepi_relatorio.relatorio_inscricao';
				protected $baseRoute = 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao';

				public function init()
				{
						$srvEvento  = $this->getService('datasus_sisvs_expoepi_administrativo.evento');
						$srvSitInsc = $this->getService('datasus_sisvs_expoepi_autor.situacao_inscricao');
						$srvTipInst = $this->getService('datasus_sisvs_expoepi_administrativo.instituicao');
						$srvRegiao  = $this->getService('datasus_sisvs_expoepi_administrativo.regiao');
						$srvSexo    = $this->getService('datasus_sisvs_expoepi_administrativo.sexo');
						$srvEstado  = $this->getService('datasus_sisvs_expoepi_administrativo.uf');

						$this->params['cmbEvento']            = $srvEvento->findByStAtivo('S');
						$this->params['cmbSituacaoInscricao'] = $srvSitInsc->findByStInscricao('S');
						$this->params['cmbTipoInstituicao']   = $srvTipInst->findByStAtivo('S');
						$this->params['cmbRegiao']            = $srvRegiao->findByStRegistroAtivo('S');
						$this->params['cmbSexo']              = $srvSexo->findByStRegistroAtivo('S');
						$this->params['cmbEstado']            = $srvEstado->findByCoPais(1);
				}

				public function searchAction()
				{
						$request = $this->getRequest();
						$data    = $this->getService()->getDataRelatorioInscricao($request);

						return $this->renderJson($this->getAllConfigGrid($data));
				}

				public function getAllConfigGrid($data)
				{
						foreach ($data->rows as $key => $value) {
								$porcentagem = substr(($value['cell']['quantidade'] / $value['cell']['total']) * 100, 0, 5);

								$data->rows[$key]['cell']['porcentagem'] = $porcentagem . '%';
						}

						return $data;
				}

				public function graficoAction()
				{
						$srvEvento                 = $this->getService('datasus_sisvs_expoepi_administrativo.evento');
						$this->params['cmbEvento'] = $srvEvento->findByStAtivo('S');
						$this->params['status']    = false;

						if ($this->getRequest()->isMethod('POST')) {
								$this->params['status'] = true;
								$this->params['title']  = $this->getService()->getTitleChart();
								$this->params['total']  = $this->getService()->getTotalChart();
								$this->params['json']   = $this->getService()->mountJson();

								if ($this->getRequest()->get('query') == 'inscricoes-por-situacao') {
										$result = $this->getService()->getDataChart();

										$this->params['total']         = $this->getService()->getTotalChart();

										$this->params['totalPendente'] = 0;

										foreach ($result as $value) {
												if ($value['coSituacao'] == SituacaoInscricaoService::ST_SITUACAO_PENDENTE) {
														$this->params['totalPendente'] = $value['total'];
//														$this->params['total']         = $this->params['total'] - $this->params['totalPendente'];
												}
										}
								}
						}

						return $this->renderAction('DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:grafico.html.twig');
				}


				public function getDataExcel()
				{
						$template = $this->getTemplateExcel();

						$template
								->getProperties()
								->setTitle($this->getService()->getTitleChart());

						$template
								->getActiveSheet()
								->setTitle('Relatório');

						if ($this->getRequest()->get('blobImg')) {
								$this->getService()->getDataExcelGrafico($template);
								$this->getService()->setHeaderExcel($template);

						} else {
								$data   = $this->getService()->getDataRelatorioInscricao($this->getRequest());
								$result = $this->getAllConfigGrid($data);
								$config = array('data' => $result->rows, 'columns' => array());
								parse_str($this->getRequest()->query->get('data'), $config['columns']);

								$this->getService()->getDataExcel($template, $config);
						}

						return $template;
				}

				public function getDataPdf()
				{
						$this->params['data']    = array();
						$this->params['columns'] = array();
						$this->params['grafico'] = true;

						if ($this->getRequest()->get('blobImg')) {
								$this->params['pathImg'] = $this->getService()->generateImage();

						} else {
								$data   = $this->getService()->getDataRelatorioInscricao($this->getRequest());
								$result = $this->getAllConfigGrid($data);

								$this->params['grafico'] = false;
								$this->params['data']    = $result->rows;
								$this->params['columns'] = array();
								parse_str($this->getRequest()->query->get('data'), $this->params['columns']);
						}

						$view = 'DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:viewPdf.html.twig';

						return $this->renderAction($view);
				}

				public function geralAction($view = null)
				{
						$request = $this->getRequest();
						$request->query->set('coEvento', $request->get('coSeqEvento'));

						$this->params['arrEvento']     = $this->getService()->getTotalPorEvento($request);
						$this->params['arrModalidade'] = $this->getService()->getTotalPorModalidade($request);

						foreach ($this->params['arrModalidade'] as $modalidade) {
								$request->query->set('coModalidade', $modalidade['coSeqModalidade']);
								$this->params['arrArea'][$modalidade['coSeqModalidade']] = $this->getService()->getTotalPorArea($request);

								foreach ($this->params['arrArea'][$modalidade['coSeqModalidade']] as $area) {
										$request->query->set('coArea', $area['coSeqArea']);
										$this->params['arrTema'][$area['coSeqArea']] = $this->getService()->getTotalPorTema($request);
								}
						}

						$this->params['estadoInstituicao']    = $this->getService()->getTotalPorEstado($request);
						$this->params['municipioInstituicao'] = $this->getService()->getTotalPorMunicipio($request);
						$this->params['regiaoInstituicao']    = $this->getService()->getTotalPorRegiao($request);
						$this->params['municipioUsuario']     = $this->getService()->getTotalPorMunicipioAutor($request);
						$this->params['estadoUsuario']        = $this->getService()->getTotalPorEstadoAutor($request);
						$this->params['regiaoUsuario']        = $this->getService()->getTotalPorRegiaoAutor($request);
						$this->params['tipoInstituicao']      = $this->getService()->getTotalTipoInstituicao($request);
						$this->params['arrSexo']              = $this->getService()->getTotalPorSexo($request);

						$this->params['arrSituacao']   = $this->getService()->getTotalSituacaoInscricao($request);
						$this->params['arrDuplicadas'] = array_unique($this->getService()->getTotalDeDuplicatas($request), 1);

						$this->params['total']         = $this->params['arrEvento'][0]['total'];
						$this->params['anEvento']      = $this->params['arrEvento'][0]['anEvento'];

						return $this->renderAction($view);
				}

				public function geralPdfAction()
				{
						$html = $this->geralAction('DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:geralPdf.html.twig');
						$data = $this->getPdf()->generatePDF($html->getContent());

						return new Response(
								$data,
								200,
								array(
										'Content-Type'        => 'application/pdf',
										'Content-Disposition' => 'attachment; filename="file.pdf"',
								)
						);
				}

				public function geralExcelAction()
				{
						$template = $this->getTemplateExcel();

						$this->geralAction();
						$this->getService()->moutRelatorioExcel($template, $this);

						// create the writer
						$writer = $this->get('phpexcel')->createWriter($template, 'Excel5');
						// create the response
						$response = $this->get('phpexcel')->createStreamedResponse($writer);
						// adding headers
						$response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
						$response->headers->set('Content-Disposition', 'attachment;filename=stream-file.xls');
						$response->headers->set('Pragma', 'public');
						$response->headers->set('Cache-Control', 'maxage=1');

						return $response;
				}

				public function getParams()
				{
						return $this->params;
				}
}