<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;

class MunicipioService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\MunicipioEntity';
    protected $entityType = true;

}
