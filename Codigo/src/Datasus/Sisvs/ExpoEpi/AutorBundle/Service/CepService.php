<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;

class CepService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\CepEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\CepEntityType';

}
