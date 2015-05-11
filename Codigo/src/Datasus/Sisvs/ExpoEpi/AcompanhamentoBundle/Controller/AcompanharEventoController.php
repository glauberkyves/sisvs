<?php

	namespace Datasus\Sisvs\ExpoEpi\AcompanhamentoBundle\Controller;

	use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
	use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;

	class AcompanharEventoController extends CrudController
	{
		protected $service = 'datasus_sisvs_expoepi_autor.inscricao';
		protected $baseRoute = 'acompanhar_evento';

		public function __construct($container = null)
		{
			if ($container) {
				$this->setContainer($container);
			}
		}

		public function init()
		{
			$srvEvento             			= $this->getService('datasus_sisvs_expoepi_administrativo.evento');
			$this->params['cmbEvento']  = $srvEvento->findByStAtivo('S', array('noEvento' => 'ASC'));
			
			$this->params['inscricao']  = $this->getService()->getTotalDeInscricoes($this->getRequest());
			$this->params['duplicata']  = $this->getService()->getTotalDeDuplicatas($this->getRequest());

			$this->params['arrSituacao'] = $this
				->getService('datasus_sisvs_expoepi_autor.situacao_inscricao')
				->findBy(array(), array('dsSituacao' => 'ASC'));
		}

		public function searchAction()
		{
			$request = $this->getRequest();

			$data = $this->getService()->getInscricoesPorEvento($request);
			$this->getAllConfigGrid($data);


			return $this->renderJson($data);
		}

		public function getAllConfigGrid($data)
		{
			foreach ($data->rows as $key => $value) {
				$html         = $this->extension('html');
				$viewPdfRoute = $this->generateUrl($this->baseRoute . '_view_pdf', array('id' => $value['id']));
				$viewAnexo    = $this->generateUrl($this->baseRoute . '_view_downloads');

				$html->url(array(
					'title' => 'Visualizar Pdf da Inscrição',
					'href'  => $viewPdfRoute,
				), 'file');

				$html->url(array(
					'title'   => 'Download Anexos',
					'onclick' => "utils.view('{$value['id']}', '{$viewAnexo}')",
				), 'download');

				$html->url(array(
					'title'   => 'Detalhar Inscrição',
					'onclick' => "utils.view('{$value['id']}')",
				), 'view');

				if ($data->rows[$key]['cell']['coSituacao'] == SituacaoInscricaoService::ST_SITUACAO_PENDENTE) {
					$situacao                               = $data->rows[$key]['cell']['dsSituacao'];
					$data->rows[$key]['cell']['dsSituacao'] = "<span class=\"btn-danger\">{$situacao}</span>";
				}
				$data->rows[$key]['cell']['dsTitulo'] = html_entity_decode(strip_tags($data->rows[$key]['cell']['dsTitulo']));
				$data->rows[$key]['cell']['acao'] = $html->render();
			}
		}

		public function viewInscricaoAreaAction(Request $request)
		{
			$request              = $this->getRequest();
			$this->params['area'] = $this->getService()->getInscricoesPorArea($request);

			return $this->renderAction();
		}

		public function viewTotalInscricaoAction(Request $request)
		{
			$request                  = $this->getRequest();
			$this->params['total'][0] = $this->getService()->getTotalDeInscricoesPorEvento($request);
			return $this->renderJson($this->params['total']);
		}

		public function viewInscricaoCategoriaAction(Request $request)
		{
			$request              = $this->getRequest();
			$this->params['tema'] = $this->getService()->getInscricoesPorTema($request);

			return $this->renderAction();
		}

		public function viewDownloadsAction(Request $request)
		{
			return parent::viewAction($request);
		}

		public function viewSituacaoInscricaoAction(Request $request)
		{
			return parent::viewAction($request);
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

		public function viewPdfAction()
		{
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
