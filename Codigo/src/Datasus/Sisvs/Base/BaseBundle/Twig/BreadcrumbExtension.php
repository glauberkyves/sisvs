<?php

namespace Datasus\Sisvs\Base\BaseBundle\Twig;

use Symfony\Component\Routing\Exception\MethodNotAllowedException;

/**
 * Extends Twig to output breadcrumbs
 */
class BreadcrumbExtension extends \Twig_Extension
{
    /**
     * @var BreadcrumbExtension
     */
    public static $instance;
    /**
     * @var array
     */
    public $customBreadCrumb = array();
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var BreadcrumbService
     */
    protected $service;

    /**
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->container = $container;
        $this->service   = $container->get("xi_breadcrumbs");
    }

    public function newInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self($this->container);
        }

        return self::$instance;
    }

    /**
     * {$inheritDoc}
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            "breadcrumb" => new \Twig_Function_Method(
                    $this, "renderBreadcrumbs", array("is_safe" => array("html"))
                )
        );
    }

    /**
     * Returns the rendered breadcrumbs
     *
     * @return string
     */
    public function renderBreadcrumbs()
    {
        $router  = $this->container->get('router');
        $request = $this->container->get('request');

        $route = $request->get('_route');
        try {
            $params = $router->match(rawurldecode($request->getPathInfo()));
        } catch (MethodNotAllowedException $e) {
            return;
        }

        $breadCrumb = $this->service->getBreadcrumbs((string)$route, $params);

        if (self::$instance) {
            foreach (self::$instance->customBreadCrumb as $key => $value) {
                if (isset($breadCrumb[$key])) {
                    $breadCrumb[$key] = $value;
                }
            }
        }

        return $this->container->get("templating")->render(
            "DatasusSisvsBaseBaseBundle::breadcrumbs.html.twig",
            array('breadcrumbs' => $breadCrumb)
        );
    }

    /**
     * @return array
     */
    public function getCustomBreadCrumb()
    {
        return $this->customBreadCrumb;
    }

    /**
     * @param array $customBreadCrumb
     */
    public function setCustomBreadCrumb($customBreadCrumb)
    {
        $this->customBreadCrumb = $customBreadCrumb;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'breadcrumb';
    }
}
