<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;

class HistoricoInscricaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\HistoricoInscricaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\HistoricoInscricaoType';

    /**
     * Deve receber um entidade InscricaoEntity
     *
     * @param InscricaoEntity $enInscricao
     * @param array $arrCoAutor
     */
    public function saveHistorico(InscricaoEntity $enInscricao, $sqSituacaoInscricao)
    {
        $enSituacaoInscricao = $this
            ->getService('datasus_sisvs_expoepi_autor.situacao_inscricao')
            ->find($sqSituacaoInscricao);

        $entity = $this->getEntity();
        $entity->setCoInscricao($enInscricao);
        $entity->setCoSituacaoInscricao($enSituacaoInscricao);
        $entity->setDtSituacao(new \DateTime("now"));

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }

}
