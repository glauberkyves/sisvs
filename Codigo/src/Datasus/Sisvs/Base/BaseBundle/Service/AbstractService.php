<?php

namespace Datasus\Sisvs\Base\BaseBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Core\BaseBundle\ServiceLayer\ServiceAbstract;

abstract class AbstractService extends ServiceAbstract
{

    protected $entity;

    public function getMetadataEntity($entity = null)
    {
        if ($entity && !$entity instanceof AbstractBase) {
            throw new ServiceCrudException("O objeto informado deve ser uma entidade");
        }

        if (null == $entity) {
            $entity = $this->entity;
        } else {
            $entity = get_class($entity);
        }

        return $this->getEntityManager()->getClassMetadata($entity);
    }

    public function __call($name, $arguments)
    {
        try {
            $repository = $this->getEntityManager()->getRepository($this->entity);

            return call_user_func_array(array($repository, $name), $arguments);

        } catch (\Exception $exc) {
            if ('dev' == $this->getContainer()->get('kernel')->getEnvironment()) {
                $this->registerError($exc->getMessage());
            } else {
                $this->registerError('Ocorreu um erro interno.');
            }

            $logger = $this->getContainer()->get('logger');
            $logger->info('[ SISVS ] - Erro interno.');
            $logger->error($exc->getMessage());
        }
    }

    /**
     * @todo Melhorar chamada de repositorio
     *
     * @param null $entityName
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository($entityName = null)
    {
        if (null == $entityName) {
            $entityName = $this->entity;
        }

        return $this->getEntityManager()->getRepository($this->getNamespaceEntity($entityName));
    }

    protected function getNamespaceEntity($entityName)
    {
        if (false === strpos($entityName, '::')) {
            return $entityName;
        }

        $nameBundle = substr($entityName, 0, strpos($entityName, '::'));
        $bundle     = $this->getContainer()->get('kernel')->getBundle($nameBundle);

        $search = array(
            'namespace' => $nameBundle,
            'separator' => '::'
        );

        $replace = array(
            'namespace' => $bundle->getNamespace(),
            'separator' => '\Entity\\'
        );

        return str_replace($search, $replace, $entityName);
    }

    public function getEntity($entity = null)
    {
        if (null == $entity) {
            $entity = $this->entity;
        }

        return new $entity;
    }
}

