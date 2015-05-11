<?php

namespace Datasus\Core\BaseBundle\Doctrine\ORM\Mapping;

use Doctrine\ORM\Mapping\DefaultQuoteStrategy;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class OracleSession
{

    public function postConnect(ConnectionEventArgs $args)
    {
        $args->getConnection()->executeUpdate('ALTER SESSION SET NLS_DATE_FORMAT=\'YYYY-MM-DD HH24:MI:SS\'');
        $args->getConnection()->executeUpdate('ALTER SESSION SET NLS_COMP=\'LINGUISTIC\'');
        $args->getConnection()->executeUpdate('set role RO_SISVS_T identified by ds33pto10');
    }

}
