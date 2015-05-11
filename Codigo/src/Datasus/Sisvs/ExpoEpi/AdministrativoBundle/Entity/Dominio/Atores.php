<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\Dominio;


class Atores
{
    CONST SEQ_AUTOR     = 1;
    CONST SEQ_TRIADOR   = 2;
    CONST SEQ_AVALIADOR = 3;
    CONST AUTOR         = 'Autor';
    CONST TRIADOR       = '	Triador';
    CONST AVALIADOR     = 'Avaliador';

    /**
     * @return array
     */
    public static function getAtores()
    {
        return array(
            self::SEQ_AUTOR     => self::AUTOR,
            self::SEQ_TRIADOR   => self::TRIADOR,
            self::SEQ_AVALIADOR => self::AVALIADOR,
        );
    }
}
