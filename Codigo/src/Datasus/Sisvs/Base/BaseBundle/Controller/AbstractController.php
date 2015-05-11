<?php

namespace Datasus\Sisvs\Base\BaseBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Spraed\PDFGeneratorBundle\PDFGenerator\PDFGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AbstractController extends Controller
{
    /**
     * @param null $extensionTwig
     * @return object
     */
    public function extension($extensionTwig = null)
    {
        $extension = array(
            'base'       => 'base.twig.base_extension',
            'html'       => 'base.twig.extension_html',
            'breadcrumb' => 'base.twig.breadcrumb'
        );

        if (null == $extensionTwig) {
            $extensionTwig = 'base';
        }

        if (!in_array($extensionTwig, array_keys($extension))) {
            trigger_error('Extensão não existe.');
        }

        return $this->container->get($extension[$extensionTwig])->newInstance();
    }

    public function comboBoxAction()
    {
        $criteria = $this->getRequest()->query->all();
        $orderBy  = $this->getRequest()->query->get('order');

        if (!is_array($orderBy)) {
            $orderBy = array();
        }

        unset($criteria['order']);
        $result = $this->getService()->comboBox($criteria, $orderBy);

        return $this->renderJson($result);
    }

    /**
     * Retorna a Service respectiva da Controller
     *
     * @return CrudService
     */
    protected function getService($service = null)
    {
        if (null === $service) {
            $service = $this->service;
        }

        return $this->get($service);
    }

    protected function renderJson($data)
    {
        $resp = json_encode($data);

        $header = array(
            'Content-Type' => 'application/json'
        );

        $response = new Response($resp, 200, $header);

        return $response;
    }

    /**
     * @return PDFGenerator
     */
    public function getPdf()
    {
        return $this->get('spraed.pdf.generator');
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->get('session');
    }

    protected function getAllConfigGrid($data)
    {

    }

    protected function resolveRouteName()
    {
        $pattern = "#Controller\\\([a-zA-Z]*)Controller#";
        $matches = array();
        preg_match($pattern, $this->getRequest()->attributes->get('_controller'), $matches);

        $search  = array('Controller', '\\', $matches[1], 'Action', '::');
        $repalce = array('', '', ':' . $matches[1], '.html.twig', ':');
        $bundle  = str_replace($search, $repalce, $this->getRequest()->attributes->get('_controller'));

        return $bundle;
    }

    protected function resolveMessageSuccess()
    {
        $msgSuccess = 'Registro incluído com sucesso.';

        if ($this->getRequest()->get('id')) {
            $msgSuccess = 'Registro alterado com sucesso.';
        }

        return $msgSuccess;
    }

    /**
     * @param string $message
     * @param string $type
     */
    protected function addMessage($message, $type = 'info')
    {
        $this->getRequest()->getSession()->getFlashBag()->add($type, $message);
    }

}
