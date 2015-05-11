<?php
namespace Datasus\Core\BaseBundle\ServiceLayer;

use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Validator;

abstract class ServiceAbstract
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;
    /**
     *
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;
    /**
     * @var Container
     */
    protected $container;

    /**
     *
     * @param
     *            \Doctrine\ORM\EntityManager
     */
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->setEntityManager($entityManager);
        $this->setContainer($container);
    }

    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     *
     * @param
     *            \Doctrine\ORM\EntityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     *
     * @return Datasus\Core\BaseBundle\Entity\User
     */
    public function getUser()
    {
        return $this->getContainer()
            ->get('security.context')
            ->getToken()
            ->getUser();
    }

    /**
     * @return \Symfony\Component\DependencyInjection\Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param \Symfony\Component\DependencyInjection\Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getService($service)
    {
        return $this->getContainer()->get($service);
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->getContainer()->get('request');
    }

    /**
     *
     * @return \Symfony\Component\Security\Core\SecurityContext
     */
    public function getSecurityContext()
    {
        return $this->securityContext;
    }

    /**
     *
     * @param \Symfony\Component\Security\Core\SecurityContext $securityContext
     */
    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;

        return $this;
    }

    /**
     * @param $message
     */
    public function registerError($message)
    {
        $error = $this->getTranslator()->trans($message, array(), 'validators');
        $this->getMessenger()->add('error', $error);
    }

    /**
     * @return Translator
     */
    protected function getTranslator()
    {
        return $this->getContainer()->get('translator');

    }

    /**
     * @return FlashBag
     */
    public function getMessenger()
    {
        return $this->getContainer()->get('request')->getSession()->getFlashBag();
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        $this->getContainer()->get('request')->getSession();
    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->getContainer()->get('validator');
    }

    public function triggerErrors()
    {
        if ($this->isValidLifecycle()) {
            throw new ServiceCrudException();
        }
    }

    /**
     * Verifica se o ciclo de vida do crud foi executado sem registro de erros
     *
     * @return bool
     */
    protected function isValidLifecycle()
    {
        return $this->getMessenger()->has('error');
    }


}