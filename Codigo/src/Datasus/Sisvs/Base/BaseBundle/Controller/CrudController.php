<?php

namespace Datasus\Sisvs\Base\BaseBundle\Controller;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Liuggio\ExcelBundle\Factory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xi\Bundle\BreadcrumbsBundle\Model\Breadcrumb;

class CrudController extends AbstractController
{
    /**
     * @var
     */
    protected $baseRoute, $service, $entity, $params = array();

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $this->init();

        $form = $this->getFormEntity();
        $form->handleRequest($request);

        $this->params['entity'] = $this->entity;
        $this->params['form']   = $form->createView();

        return $this->renderAction();
    }

    /**
     * Metódo de apoio ao inicialiar o controller
     */
    public function init()
    {

    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    protected function getFormEntity()
    {
        if (null === $this->entity) {
            $this->entity = $this->getService()->getEntity();
        }

        $params = $this->getParamsForm();

        return $this->createForm($this->getService()->getEntityType(), $this->entity, $params);
    }

    /**
     * @return array
     */
    protected function getParamsForm()
    {
        return array(
            'action' => $this->generateUrl($this->getRequest()->attributes->get('_route'), array(
                    'id' => $this->getRequest()->get('id')
                )),
            'method' => 'POST',
        );
    }

    /**
     * @return Response
     */
    protected function renderAction($view = null)
    {
        if (null === $view) {
            $view = $this->resolveRouteName();
        }

        return $this->render($view, $this->params);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $this->init();

        $this->form = $this->getFormEntity();
        $this->form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $this->entity = $this->form->getData();
            $valid        = $this->validateEntity();

            if ($this->form->isValid() && $valid) {
                return $this->saveEntity($this->entity, $request);
            }
        }

        $this->params['entity'] = $this->entity;
        $this->params['form']   = $this->form->createView();

        return $this->renderAction();
    }

    /**
     * @param AbstractBase $entity
     *
     * @return bool
     */
    protected function validateEntity(AbstractBase $entity = null)
    {
        if (null == $entity) {
            $entity = $this->entity;
        }

        $validator = $this->get('validator');
        $errors    = $validator->validate($entity);

        if ($errors->count()) {
            foreach ($errors->getIterator() as $error) {
                $this->addMessage($error->getMessage(), 'error');
            }
        }

        return $errors->count() ? false : true;
    }

    /**
     * @param AbstractBase $entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    protected function saveEntity(AbstractBase $entity)
    {
        try {
            call_user_func_array(array($this->getService(), 'save'), func_get_args());
            $this->addMessage($this->resolveMessageSuccess(), 'success');

            return $this->redirectSave();
        } catch (\Exception $exc) {

            $this->addMessage($exc->getMessage(), 'error');

            $this->params['entity'] = $this->entity;
            $this->params['form']   = $this->form->createView();

            return $this->renderAction();
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectSave()
    {
        return $this->redirect($this->generateUrl($this->baseRoute));
    }

    /**
     * @param array $configRooute
     */
    public function setCustomBreadCrumb(array $configRooute = array())
    {
        foreach ($configRooute as $key => $value) {
            $configRooute[$key] = new Breadcrumb($value['label'], $value['url']);
        }

        $extension = $this->extension('breadcrumb');
        $extension->setCustomBreadCrumb($configRooute);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request)
    {
        $this->init();

        $id           = $request->get('id');
        $this->entity = $this->getService()->find($id);

        if (!$this->entity) {
            $this->addMessage('Entidade não localizada.', 'error');

            return $this->redirect($this->generateUrl($this->baseRoute));
        }

        $this->form = $this->getFormEntity();
        $this->form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $this->entity = $this->form->getData();
            $valid        = $this->validateEntity($this->entity);

            if ($this->form->isValid() && $valid) {
                return $this->saveEntity($this->entity, $request);
            }
        }

        $this->params['entity'] = $this->entity;
        $this->params['form']   = $this->form->createView();

        return $this->renderAction();

    }

    /**
     * @return Response
     */
    public function searchAction()
    {
        $this->init();

        $request = $this->getRequest();
        $data    = $this->getService()->getResultGrid($request);
        $this->getAllConfigGrid($data);

        return $this->renderJson($data);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function toogleStatusAction()
    {
        $this->init();

        try {
            $sqCodigo = $this->getRequest()->get('id');
            $result   = $this->getService()->toogleStatus($sqCodigo);

            if ($this->getRequest()->isXmlHttpRequest()) {
                return $this->renderJson($result);
            } else {
                if ($result['stAtivo'] == 'N') {
                    $this->addMessage('Registro inativado com sucesso.', 'success');
                } else {
                    $this->addMessage('Registro ativado com sucesso.', 'success');
                }

                return $this->redirectToogleStatus();
            }
        } catch (\Exception $exc) {
            if ('dev' == $this->container->get('kernel')->getEnvironment()) {
                $logger = $this->container->get('logger');
                $logger->info('[ SISVS ] - Erro interno.');
                $logger->error($exc->getMessage());
            }

            $this->addMessage($exc->getMessage(), 'error');

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToogleStatus()
    {
        return $this->redirect($this->generateUrl($this->baseRoute));
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function viewAction(Request $request)
    {
        $id           = $request->get('id');
        $this->entity = $this->getService()->find($id);

        if (!$this->entity) {
            return new Response('Entidade não localizada.');
        }

        $this->params['entity'] = $this->entity;

        return $this->renderAction();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function downloadAction(Request $request)
    {
        $this->init();

        $file = $this->getFile($request);

        $response = new Response();
        $response->setStatusCode(200);

        $response->headers->set('Content-Description', 'File Transfer');
        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Type', 'application/download');
        $response->headers->set('Content-Disposition', 'attachment;Filename="' . $file['filename'] . '";');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Expires', '0');
        $response->headers->set('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->headers->set('Pragma', 'public');

        $response->prepare($request);
        $response->setContent($file['content']);
        $response->sendHeaders();
        $response->sendContent();

        return $response;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function getFile(Request $request)
    {
        trigger_error('Método não implementado.');
    }

    /**
     * @return Response
     */
    public function viewPdfAction()
    {
        $html = $this->getDataPdf();
        $data = $this->getPdf()->generatePDF($html->getContent());

        return new Response(
            $data,
            200,
            array(
                'Content-Type'        => 'application/pdf',
		            'Content-Disposition' => 'attachment; filename="file.pdf"'
            )
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function getDataPdf()
    {
        $this->init();

        $id           = $this->getRequest()->get('id');
        $this->entity = $this->getService()->find($id);

        if (!$this->entity) {
            $this->addMessage('Entidade não localizada.', 'error');

            return $this->redirect($this->generateUrl($this->baseRoute));
        }

        $this->params['entity'] = $this->entity;

        return $this->renderAction();
    }

    public function viewExcelAction()
    {
        // ask the service for a Excel5
        $phpExcelObject = $this->getDataExcel();

        // create the writer
				$writer = \PHPExcel_IOFactory::createWriter($phpExcelObject, 'Excel2007');
				$writer->setIncludeCharts(true);
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=stream-file.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;
    }

    /**
     * @return \PHPExcel
     */
    public function getDataExcel()
    {
        return $this->getTemplateExcel();
    }

    /**
     * @return \PHPExcel
     */
    public function getTemplateExcel($ano = null)
    {
        $phpExcelObject = $this->getExcel()->createPHPExcelObject();

        if (null === $ano) {
            $ano = date('Y');
        }

        $srvEvento = 'datasus_sisvs_expoepi_administrativo.evento';
        $entity    = $this->getService($srvEvento)->findOneByAnEvento($ano);
				if(!$entity){
						$entity = $this->getService($srvEvento)->findOneByAnEvento($ano - 1);
				}
        if (is_resource($entity->getImLogotipo())) {
            $tmp_dir  = sys_get_temp_dir();
            $filename = $entity->getNoLogotipo();
            $path     = $tmp_dir . DIRECTORY_SEPARATOR . $filename;

            if (!file_exists($path)) {
                $img = stream_get_contents($entity->getImLogotipo());
                file_put_contents($path, $img);
            }
        }

        $objDrawing = new \PHPExcel_Worksheet_Drawing();
        $objDrawing->setPath($path);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setWorksheet($phpExcelObject->getActiveSheet());
        $objDrawing->setWidth(120);

        $title = $entity->getNoEvento() . " - MOSTRA NACIONAL DE EXPERIÊNCIAS BEM SUCEDIDAS EM EPIDEMIOLOGIA, \n"
						. "PREVENÇÃO E CONTROLE DE DOENÇAS. MINISTÉRIO DA SAÚDE / SECRETARIA DE VIGILÂNCIA EM SAÚDE.";

        # style logo
        $phpExcelObject
            ->setActiveSheetIndex(0)
            ->mergeCells('A1:B5')
            ->getStyle('A1:B5')
            ->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center')

            # style titulo
            ->getActiveSheet()
            ->setCellValue('C1', $title)
            ->mergeCells('C1:N5')
            ->getStyle('C1:N5')
            ->getAlignment()
            ->setWrapText(true)
            ->setHorizontal('center')
            ->setVertical('center');

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM
                )
            )
        );

        $phpExcelObject
            ->getActiveSheet()
            ->getStyle('A1:N5')
            ->applyFromArray($styleArray);

        return $phpExcelObject;
    }

    /**
     * @return Factory
     */
    public function getExcel()
    {
        return $this->get('phpexcel');
    }
}