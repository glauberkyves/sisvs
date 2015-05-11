<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Core\BaseBundle\ServiceLayer\ServiceDataException;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Doctrine\Tests\ORM\Functional\Ticket\DDC1685Test;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class ModalidadeService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\ModalidadeEntityType';

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');
    }

    public function preSave(AbstractBase $entity)
    {
        if (!$entity->getCoSeqModalidade()) {
            if ($this->getRepository()->checkDuplicity($entity)) {
                throw new ServiceDataException("O nome Modalidade já existe no cadastro.");
            }
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $arrService = array(
            'svcArea' => 'DatasusSisvsExpoEpiAdministrativoBundle::AreaEntity',
            'svcCriterio' => 'DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeCriterioEntity',
            'svcApresentacao' => 'DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeApresentacaoEntity',
            'svcTipoInstituicao' => 'DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeInstituicaoEntity',
            'svcModalidade' => 'DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeEntity'
        );

        $rstArea = $this->getRepository($arrService['svcArea'])->findBy(array('coModalidade' => $entity->getCoSeqModalidade(), 'stAtivo' => 'S'));
        $rstBindModCrit = $this->getRepository($arrService['svcCriterio'])->findByCoModalidade($entity->getCoSeqModalidade());
        $rstBindModApre = $this->getRepository($arrService['svcApresentacao'])->findByCoModalidade($entity->getCoSeqModalidade());
        $rstBindModIns = $this->getRepository($arrService['svcTipoInstituicao'])->findByCoModalidade($entity->getCoSeqModalidade());
        $rstBindModTipMod = $this->getRepository($arrService['svcModalidade'])->getModByTipMod($entity);

        if (($rstArea || $rstBindModCrit || $rstBindModApre || $rstBindModIns || $rstBindModTipMod) && $entity->getStAtivo() == 'S') {
            throw new ServiceDataException("O registro não pode ser alterado e/ou inativado, pois já existem vinculações efetivadas.");
        }
    }

    public function getNoTipoModalidade($coModalidade)
    {
        return $this->getRepository()->getNoTipoModalidade($coModalidade);
    }

    public function findByModalidade(array $criteria = array(), array $orderBy = array())
    {
        return $this->getRepository()->findByModalidade($criteria, $orderBy);
    }

    public function checkInscricao($coModalidade, $coFormulario = null)
    {
        return $this->getRepository()->checkInscricao($coModalidade, $coFormulario);
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