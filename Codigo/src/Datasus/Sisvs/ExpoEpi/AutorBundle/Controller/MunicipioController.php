<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;

class MunicipioController extends CrudController
{
    protected $service = 'datasus_sisvs_expoepi_autor.municipio';
    protected $baseRoute = 'autor_municipio';

    public function init()
    {
    }
}
