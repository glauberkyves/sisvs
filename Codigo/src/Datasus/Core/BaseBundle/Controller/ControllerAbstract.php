<?php

namespace Datasus\Core\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Datasus\Core\BaseBundle\ServiceLayer\ServiceData;

abstract class ControllerAbstract extends Controller
{
    /**
     * @var string - nome da service principal do controller
     */
    protected $service;
    
    /**
     * @var string - nome da view a ser renderizada
     */
    protected $indexView;
    
    /**
     * Action default da controller
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render($this->indexView);
    }
    
    public function renderJson($data)
    {
        $resp = json_encode($data);
        
        $header = array(
            'Content-Type' => 'application/json'
        );
        
        $response = new Response($resp, 200, $header);
        
        return $response;
    }

    /**
     * Retorna a Service respectiva da Controller
     *
     * @return object
     */
    protected function getService()
    {
        return $this->get($this->service);
    }

    /**
     * Retorna a Service respectiva da Controller mapeando para um banco de dados temporário SQLite
     *
     * @return object
     */
    protected function getTmpService()
    {
        $srv = $this->get($this->service);
        $srv->setEntityManager($this->get('doctrine')->getManager('tmp'));
         
        return $srv;
    }

    /**
     * @param string $message
     * @param string $type
     */
    protected function addMessage($message, $type = 'info')
    {
        $this->get('session')->getFlashBag()->add($type, $message);
    }
    
    protected function redirectByReferer($status = 302)
    {
        $params = $this->getRefererRoute();
    	return $this->redirectByRouteName($params[0], $status, $params[1]);
    }
    
    /**
     * Obtém o nome da rota do referer - útil para redirects
     * @return unknown
     */
    protected function getRefererRoute()
    {
        $request = $this->getRequest();
    
        //look for the referer route
        $referer = $request->headers->get('referer');
        $lastPath = substr($referer, strpos($referer, $request->getBaseUrl()));
        $lastPath = str_replace($request->getBaseUrl(), '', $lastPath);
        $lastPath = explode('?', $lastPath);
        $routePath = $lastPath[0];
    
        $matcher = $this->get('router')->getMatcher();
        $parameters = $matcher->match($routePath);
        $route = $parameters['_route'];
        
        $tmp= array();
        
        if (isset($lastPath[1])) {
            $params = explode('&',$lastPath[1]);
            foreach($params as $param){
            	$par = explode('=', $param);
            	$tmp[$par[0]] = $par[1];
            }
        }
            
        $params = $tmp;
          
        return array($route, $params);
    }

    /**
     * Redireciona com base no nome da rota
     * @param string $routeName
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectByRouteName(
        $routeName,
        $status = 302,
        $parameters = array(),
        $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH
    )
    {
        return $this->redirect($this->generateUrl($routeName, $parameters , $referenceType), $status);
    }

    /**
     *
     * @return Symfony\Component\Translation\IdentityTranslator
     */
    protected function getTranslator()
    {
        return $this->get('translator');
    }
}