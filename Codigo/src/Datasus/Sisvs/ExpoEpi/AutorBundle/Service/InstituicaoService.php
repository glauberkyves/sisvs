<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;

class InstituicaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InstituicaoEntity';
    protected $entityType = true;

    public function saveInstituicao(InscricaoEntity $enInscricao)
    {
        $entity = $this->getEntity();
        if ($enInscricao->getCoInstituicao()->getCoSeqInstituicao()) {
            $entity = $this->getRepository()->find($enInscricao->getCoInstituicao()->getCoSeqInstituicao());
        } else {
            $entity->setStAtivo('S');
        }

        $entity->setCoTipoInstituicao($enInscricao->getCoInstituicao()->getCoTipoInstituicao());
        $entity->setCoMunicipioIbge($enInscricao->getCoInstituicao()->getCoMunicipioIbge());

        $entity->setNoInstituicao($enInscricao->getCoInstituicao()->getNoInstituicao());
        $entity->setDsComplemento($enInscricao->getCoInstituicao()->getDsComplemento());
        $entity->setDsEndereco($enInscricao->getCoInstituicao()->getDsEndereco());
        $entity->setNoBairro($enInscricao->getCoInstituicao()->getNoBairro());

        $entity->setNuCep(preg_replace("/[^0-9]/", "", $enInscricao->getCoInstituicao()->getNuCep()));
        $entity->setNuTelefone(preg_replace("/[^0-9]/", "", $enInscricao->getCoInstituicao()->getNuTelefone()));
        $entity->setNuFax(preg_replace("/[^0-9]/", "", $enInscricao->getCoInstituicao()->getNuFax()));

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);

        return $entity;
    }
}
