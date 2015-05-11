<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;

class SituacaoFormularioService extends CrudService
{
    protected $entity = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\SituacaoFormularioEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Form\SituacaoFormularioEntityType';
}