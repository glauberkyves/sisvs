<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;

class SituacaoInscricaoService extends CrudService
{

		CONST ST_SITUACAO_PENDENTE = 1;
		CONST ST_SITUACAO_ENVIADA = 2;
		CONST ST_SITUACAO_INSCRICAO_DUPLICADA = 3;
		CONST ST_SITUACAO_VALIDA = 4;
		CONST ST_SITUACAO_EM_ANALISE = 5;
		CONST ST_SITUACAO_ANALISE_NA_TRIAGEM = 6;
		CONST ST_SITUACAO_ACEITA_NA_TRIAGEM = 7;
		CONST ST_NAO_RECOMENDADO = 8;
		CONST ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM = 9;
		CONST ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM = 10;
		CONST ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO = 11;
		CONST ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO = 12;
		CONST ST_INSCRICAO_EM_ANAISE_NA_AVALIACAO = 13;
		CONST ST_INSCRICAO_ACEITA_NA_AVALIACAO = 14;
		CONST ST_INSCRICAO_REJEITADA_NA_AVALIACAO = 15;
		CONST ST_PRE_FINALISTA_ORAL = 17;
		CONST ST_PRE_FINALISTA_POSTER = 18;
		CONST ST_FINALISTA_ORAL = 19;
		CONST ST_FINALISTA_POSTER = 20;
		CONST ST_NAO_SELECIONADO = 21;
		CONST ST_RECOMENDADO = 22;
		CONST ST_INSCRICAO_PENDENTE_TRIAGEM = 23;
		CONST ST_INSCRICAO_PENDENTE_AVALIACAO = 24;
    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\SituacaoInscricaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Form\SituacaoInscricaoEntityType';

}
