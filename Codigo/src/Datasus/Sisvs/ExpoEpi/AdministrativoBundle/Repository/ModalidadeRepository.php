<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

/**
 * ModalidadeRepository
 *
 * Copyright @ Ministerio da Saude.
 *
 * Este software e confidencial e de propriedade do Ministerio da Saude.
 * Nao e permitida sua distribuicao ou divulgacao do seu conteudo sem
 * expressa autorizacao do mesmo.
 */
class ModalidadeRepository extends BaseRepository
{
    public function getResultGrid(Request $request)
    {
        $params = array();
        parse_str($request->query->get('data'), $params);

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('m.coSeqModalidade, m.noModalidade, m.stAtivo, e.coSeqEvento')
            ->from($this->getEntityName(), 'm')
            ->innerJoin('m.coEvento', 'e');

        if (isset($params['coEvento']) && $params['coEvento']) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $params['coEvento']);
        }

        if (isset($params['stAtivo']) && $params['stAtivo']) {
            $query->andWhere('m.stAtivo = :stAtivo')
                ->setParameter('stAtivo', $params['stAtivo']);
        }

        if (isset($params['noModalidade']) && $params['noModalidade']) {
            $query->andWhere($query->expr()->like("UPPER(m.noModalidade)", "UPPER(:noModalidade)"))
                ->setParameter('noModalidade', '%' . $params['noModalidade'] . '%');
        }

        $this->addOrderBy($query, $request);

        return $query->getQuery()->getArrayResult();
    }

    public function addWhere(QueryBuilder $query, Request $request = null)
    {
        $params = array();
        parse_str($request->query->get('data'), $params);

        if (isset($params['coEvento']) && $params['coEvento']) {
            $query->andWhere($query->expr()->eq('e.coSeqEvento', ':coSeqEvento'))
                ->setParameter('coSeqEvento', $params['coEvento']);
        }

        if (isset($params['stAtivo']) && $params['stAtivo']) {
            $query->andWhere('m.stAtivo = :stAtivo')

                ->setParameter('stAtivo', $params['stAtivo']);
        }

        parent::addWhere($query, $request);
    }

    public function getModByTipMod($entity)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m.noModalidade, tm.coSeqTipoModalidade')
            ->from($this->getEntityName(), 'm')
            ->innerJoin('m.coTipoModalidade', 'tm')
            ->andWhere('m.coSeqModalidade = :coSeqModalidade')
            ->setParameter('coSeqModalidade', $entity->getCoSeqModalidade())
            ->getQuery()->getArrayResult();
    }

    public function getNoTipoModalidade($coModalidade)
    {
        $res = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('tm.noTipoModalidade')
            ->from($this->getEntityName(), 'm')
            ->innerJoin('m. coTipoModalidade', 'tm')
            ->andWhere('m.coSeqModalidade = :coModalidade')
            ->setParameter('coModalidade', $coModalidade)
            ->getQuery()
            ->execute();

        if (empty($res)) {
            return '';
        }

        return $res[0]['noTipoModalidade'];
    }

    public function checkDuplicity($entity)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $query        = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from($this->_entityName, 'm')
            ->innerJoin('m.coEvento', 'e')
            ->andWhere($queryBuilder->expr()->eq('UPPER(m.noModalidade)', 'UPPER(:noModalidade)'))
            ->setParameter('noModalidade', trim($entity->getNoModalidade()))
            ->andWhere($queryBuilder->expr()->eq('e.coSeqEvento', ':coSeqEvento'))
            ->setParameter('coSeqEvento', $entity->getCoEvento()->getCoSeqEvento());

        if ($entity->getCoSeqModalidade()) {
            $query->andWhere($queryBuilder->expr()->neq('m.coSeqModalidade', ':coSeqModalidade'))
                ->setParameter('coSeqModalidade', $entity->getCoSeqModalidade());
        }

        return $query->getQuery()->getResult();
    }

    public function findByModalidade(array $criteria = array(), array $orderBy = array())
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m.coSeqModalidade','m.noModalidade')
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->leftJoin('m.coArea', 'a')
            ->leftJoin('a.coTema','t')
            ->leftJoin('m.coModalidadeApresentacao','ma')
            ->leftJoin('m.coModalidadeCriterio','mc')
            ->innerJoin('m.coModalidadeInstituicao','mi')
            ->innerJoin('m.coTipoModalidade','tpm')
            ->leftJoin('m.coFormularioDeInscricao','f')
            ->where('f.coSeqFormularioInscricao is null')
		        ->andWhere('m.coTipoModalidade is not null')
            ->addGroupBy('m.coSeqModalidade','m.noModalidade');

        foreach ($criteria as $key => $value) {
            $query->andWhere($query->expr()->eq("m.{$key}", ":$key"))
                ->setParameter($key, $value);
        }

        if ($orderBy) {
            $query->orderBy('m.' . key($orderBy), current($orderBy));
        }

        $comboBox = array();
        foreach ($query->getQuery()->getArrayResult() as $key => $value) {
            $comboBox[$value['coSeqModalidade']] = $value['noModalidade'];
        }
        return $comboBox;
    }

    public function checkInscricao($coModalidade, $coFormulario = null){

        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('count(i) as total')
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity', 'm')
            ->innerJoin('m.coArea', 'a')
            ->innerJoin('a.coTema','t')
            ->innerJoin('t.coInscricao','i')
            ->innerJoin('m.coFormularioDeInscricao','fi')
		        ->where('i.stAtivo = :stAtivo')
		        ->setParameter('stAtivo', 'S');

		    if($coModalidade){
		        $query->andWhere($query->expr()->eq("m.coSeqModalidade", ":coSeqModalidade"))
				        ->setParameter('coSeqModalidade', $coModalidade);
		    }

		    if($coFormulario){
				    $query->andWhere($query->expr()->eq("fi.coSeqFormularioInscricao", ":coSeqFormularioInscricao"))
						    ->setParameter('coSeqFormularioInscricao', $coFormulario);
		    }

        return $query->getQuery()->getResult();

    }

    public function comboBox(array $criteria = array(), array $orderBy = array()){
        $metadata    = $this->getClassMetadata();
        $fields      = $metadata->getFieldNames();
        $coSeqEntity = $metadata->getSingleIdentifierFieldName();
        $noEntity    = $fields[1];

        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select("e.{$coSeqEntity}, e.{$noEntity}")
            ->from($this->getEntityName(), 'e');

        foreach ($criteria as $key => $value) {
            $query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
                ->setParameter($key, $value);
        }

        if ($orderBy) {
            $query->orderBy('e.' . key($orderBy), current($orderBy));
        }

        $comboBox = array();
        foreach ($query->getQuery()->getArrayResult() as $key => $value) {
            $comboBox[$value[$coSeqEntity]] = $value[$noEntity];
        }

        return $comboBox;
    }
}
