<?php

namespace Datasus\Sisvs\ExpoEpi\EmailBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends CrudController
{
    public function indexAction(Request $request)
    {
        return $this->renderAction();
    }
}
