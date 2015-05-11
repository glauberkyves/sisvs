<?php

namespace Datasus\Core\BaseBundle\Controller;

class DefaultController extends ControllerAbstract
{
    public function indexAction()
    {
        return $this->render('DatasusCoreBaseBundle:Default:index.html.twig');
    }

    public function logoutAction()
    {
        $this->getRequest()->getSession()->clear();

        return $this->redirectByRouteName('datasus_core_base');
    }
}
