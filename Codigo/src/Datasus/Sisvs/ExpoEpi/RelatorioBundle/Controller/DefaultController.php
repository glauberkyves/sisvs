<?php

namespace Datasus\Sisvs\ExpoEpi\RelatorioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DatasusSisvsExpoEpiRelatorioBundle:Default:index.html.twig', array('name' => $name));
    }
}
