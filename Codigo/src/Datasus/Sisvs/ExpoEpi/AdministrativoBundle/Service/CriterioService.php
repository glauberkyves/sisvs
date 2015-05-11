<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\HttpFoundation\Request;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class CriterioService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\CriterioEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\CriterioEntityType';

		public function listaCriterios(Request $request)
		{
				$this->dataGrid = $this->getRepository()->listaCriterios($request);

				return $this->getResultGrid($request);
		}

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');
    }

    public function preSave(AbstractBase $entity)
    {
        if ($this->getRepository()->checkDuplicity($entity)) {
            $this->registerError('administrativo.validations.criterio.NotEqualTo');
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $result = $this->getRepository('DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeCriterioEntity')->findByCoCriterio($entity->getCoSeqCriterio());

        if ($result && $entity->getStAtivo() == 'S') {
            $this->registerError('administrativo.validations.criterio.activeInactive');
        }
    }
    public function update($entity)
    {
        try {
            $this->getEntityManager()->merge($entity);
            $this->getEntityManager()->flush();
        } catch (\Exception $exc) {
            throw new ServiceCrudException($exc->getMessage());
        }
        return $entity;
    }
}
