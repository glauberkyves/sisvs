<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;
use Symfony\Component\HttpFoundation\Request;

class ApresentacaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ApresentacaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\ApresentacaoEntityType';

    public function listaApresentacao(Request $request)
    {
        $this->dataGrid = $this->getRepository()->listaApresentacao($request);

        return $this->getResultGrid($request);
    }

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');
    }

    public function preSave(AbstractBase $entity)
    {
        if ($this->getRepository()->checkDuplicity($entity)) {
            $this->registerError('administrativo.validations.apresentacao.NotEqualTo');
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $result = $this
            ->getRepository('DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeApresentacaoEntity')
            ->findByCoApresentacao($entity->getCoSeqApresentacao());

        if ($result && $entity->getStAtivo() == 'S') {
            $this->registerError('administrativo.validations.apresentacao.activeInactive');
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
