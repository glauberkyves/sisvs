<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class ModalidadeInstituicaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeInstituicaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\ModalidadeInstituicaoEntityType';

    public function saveModalidadeInstituicao(array $params)
    {
        $srvInstituicao  = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.instituicao');
        $srvModalidade    = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.modalidade');
        $entityModalidade = $srvModalidade->find($params['coSeqModalidade']);

        if (!isset($params['checkInstituicao'])) {
            $this->registerError('administrativo.validations.default.MoreThanOne');
            $this->triggerErrors();
        }

        foreach ($params['checkInstituicao'] as $value) {
            $enInstituicao = $srvInstituicao->find($value);
            $entity        = $this->getEntity();

            $entity->setCoModalidade($entityModalidade);
            $entity->setCoInstituicao($enInstituicao);

            $this->save($entity);
        }
    }

    public function save(AbstractBase $entity)
    {

        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush($entity);
        } catch (\Exception $exc) {
            throw new ServiceCrudException($exc->getMessage());
        }

        return $entity;
    }

}
