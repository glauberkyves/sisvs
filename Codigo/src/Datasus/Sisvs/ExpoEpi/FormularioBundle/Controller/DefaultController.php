<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DatasusSisvsExpoEpiFormularioBundle:Default:index.html.twig', array('name' => $name));
    }
}
