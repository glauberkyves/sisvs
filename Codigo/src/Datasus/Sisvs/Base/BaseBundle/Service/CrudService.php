<?php

namespace Datasus\Sisvs\Base\BaseBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\UnitOfWork;
use Symfony\Component\DependencyInjection\Container;

class CrudService extends BaseService
{

    protected $entity;
    protected $entityType;

    /**
     * @param EntityManager $entityManager
     * @param Container $container
     */
    public function __construct(EntityManager $entityManager, Container $container)
    {
        if (!$this->entity || !$this->entityType) {
            throw new ServiceCrudException("Necessário informar as entidades de uso.");
        }

        parent::__construct($entityManager, $container);
    }

    /**
     * @param AbstractBase $entity
     *
     * @return AbstractBase
     * @throws Exception\ServiceCrudException
     */
    public function save(AbstractBase $entity)
    {
        $insert    = false;
        $arguments = func_get_args();

        $metadata = $this->getMetadataEntity($entity);
        $method   = 'get' . ucfirst(current($metadata->getIdentifier()));

        if ($entity->{$method}()) {
            $this->getEntityManager()->getUnitOfWork()->removeFromIdentityMap($entity);
            $entity->loadValues($this->getRepository()->find($entity->{$method}()));
            $arguments[0] = $entity;
        }

        call_user_func_array(array($this, 'preSave'), $arguments);

        $state = $this->getEntityManager()->getUnitOfWork()->getEntityState($entity);

        if ($state == UnitOfWork::STATE_NEW) {
            $insert = true;
            call_user_func_array(array($this, 'preInsert'), $arguments);
        } else {
            call_user_func_array(array($this, 'preUpdate'), $arguments);
        }

        $this->triggerErrors();

        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush($entity);
        } catch (\Exception $exc) {
            throw new ServiceCrudException($exc->getMessage());
        }

        if ($insert) {
            call_user_func_array(array($this, 'postInsert'), $arguments);
        } else {
            call_user_func_array(array($this, 'postUpdate'), $arguments);
        }

        call_user_func_array(array($this, 'postSave'), $arguments);

        $this->triggerErrors();

        return $entity;
    }

    /**
     * @param         $sqCodigo
     * @param null $stAtivo
     * @param Request $request
     *
     * @return bool|\Exception
     */
    public function toogleStatus($sqCodigo)
    {
        $entity = $this->getEntityManager()->find($this->entity, $sqCodigo);

        if (!method_exists($entity, 'getStAtivo') || !$entity) {
            return false;
        }

        call_user_func_array(array($this, 'preActiveInactive'), array($entity));

        $entity->setStAtivo($entity->getStAtivo() == 'S' ? 'N' : 'S');

        $this->triggerErrors();

        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush($entity);

            call_user_func_array(array($this, 'postActiveInactive'), array($entity));

            return $entity->toArray();
        } catch (\Exception $exc) {
            throw new ServiceCrudException($exc->getMessage());
        }
    }

    public function preSave(AbstractBase $entity)
    {

    }

    public function postSave(AbstractBase $entity)
    {

    }

    public function preInsert(AbstractBase $entity)
    {

    }

    public function postInsert(AbstractBase $entity)
    {

    }

    public function preUpdate(AbstractBase $entity)
    {

    }

    public function postUpdate(AbstractBase $entity)
    {

    }

    public function preActiveInactive(AbstractBase $entity)
    {

    }

    public function postActiveInactive(AbstractBase $entity)
    {

    }

    public function getEntityType($entityType = null)
    {
        if (null == $entityType) {
            $entityType = $this->entityType;
        }

        return new $entityType;
    }

    public function removeAll(array $arrEntity)
    {
        foreach ($arrEntity as $entity) {
            $this->getEntityManager()->remove($entity);
        }
    }

    public function flush($entity = null)
    {
        $this->getEntityManager()->flush($entity);
    }

}
