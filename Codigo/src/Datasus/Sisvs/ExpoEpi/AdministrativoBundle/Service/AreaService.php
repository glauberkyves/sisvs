<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\AreaEntity;

class AreaService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\AreaEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\AreaEntityType';

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');
        $this->generateCodigoArea($entity);
    }

    private function generateCodigoArea(AreaEntity $entity)
    {
	    $result = $this->getRepository()->getAreaModalidadeEvento($this->getRequest()->query->get('coModalidade'));
	    if (!$result) {
		    $entity->setNuArea('A01');
	    } else {
		    $codigo = 'A' . str_pad($result[0][1], 2, '0', STR_PAD_LEFT);
		    $entity->setNuArea($codigo);
	    }

    }

    public function preSave(AbstractBase $entity)
    {
        if ($this->getRepository()->checkDuplicity($entity)) {
            $this->registerError('administrativo.validations.area.NotEqualTo');
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $result = $this->getRepository('DatasusSisvsExpoEpiAdministrativoBundle::TemaEntity')->findByCoArea($entity->getCoSeqArea());

        if ($result && $entity->getStAtivo() == 'S') {
            $this->registerError('administrativo.validations.area.activeInactive');
        }
    }
}
