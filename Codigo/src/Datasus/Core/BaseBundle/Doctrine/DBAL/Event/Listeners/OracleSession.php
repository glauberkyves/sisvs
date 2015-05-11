<?php

namespace Datasus\Core\BaseBundle\Doctrine\DBAL\Event\Listeners;

use Doctrine\DBAL\Event\ConnectionEventArgs;
use Symfony\Component\DependencyInjection\Container;

class OracleSession
{
    protected $container;
    protected $role = 'set role %s identified by %s';

    public function __construct(Container $container)
    {
        $this->container = $container;

        $roleUser = $container->getParameter('default_database_role_user');
        $rolePass = $container->getParameter('default_database_role_pass');

        $this->role = sprintf($this->role, $roleUser, $rolePass);
    }

    public function postConnect(ConnectionEventArgs $args)
    {
        $args->getConnection()->exec('ALTER SESSION SET NLS_DATE_FORMAT=\'YYYY-MM-DD HH24:MI:SS\'');
        $args->getConnection()->exec('ALTER SESSION SET NLS_DATE_FORMAT = "DD-MON-YYYY"');

        if ('dev' != $this->container->get('kernel')->getEnvironment()) {
            $args->getConnection()->exec($this->role);
        }
    }
}
