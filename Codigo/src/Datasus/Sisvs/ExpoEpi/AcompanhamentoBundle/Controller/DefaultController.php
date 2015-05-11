<?php

namespace Datasus\Sisvs\ExpoEpi\AcompanhamentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DatasusSisvsExpoEpiAcompanhamentoBundle:Default:index.html.twig', array('name' => $name));
    }
}
