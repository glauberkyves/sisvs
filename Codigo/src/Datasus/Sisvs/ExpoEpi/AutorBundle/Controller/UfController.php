<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;

class UfController extends CrudController
{
    protected $service = 'datasus_sisvs_expoepi_autor.uf';
    protected $baseRoute = 'autor_uf';

    public function init()
    {
    }
}
