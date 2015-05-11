<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;

class AutorService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\AutorEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\AutorEntityType';

}
