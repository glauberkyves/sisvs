<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\HttpFoundation\Request;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class InstituicaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\InstituicaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\InstituicaoEntityType';

    public function listaInstituicoes(Request $request)
    {
        $this->dataGrid = $this->getRepository()->listaInstituicoes($request);

        return $this->getResultGrid($request);
    }

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');
    }

    public function preSave(AbstractBase $entity)
    {
        $desc = $entity->getDsInstituicao();
        $nova_desc = str_replace("\n", "", $desc);
        $entity->setDsInstituicao($nova_desc);

        if ($this->getRepository()->checkDuplicity($entity)) {
            $this->registerError('administrativo.validations.instituicao.NotEqualTo');
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $result = $this->getRepository('DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeInstituicaoEntity')->findBycoInstituicao($entity->getCoSeqInstituicao());

        if ($result && $entity->getStAtivo() == 'S') {
            $this->registerError('administrativo.validations.instituicao.activeInactive');
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
