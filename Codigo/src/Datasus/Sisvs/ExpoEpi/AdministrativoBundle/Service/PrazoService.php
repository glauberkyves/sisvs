<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;

class PrazoService extends CrudService
{
    protected $entity = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Form\FormularioInscricaoEntityType';
}
