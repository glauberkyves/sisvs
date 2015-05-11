<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Symfony\Component\HttpFoundation\Request;

class AreaRepository extends BaseRepository
{

    public function getResultGrid(Request $request)
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('a.coSeqArea,
                      a.noArea,
                      a.stAtivo,
                      m.coSeqModalidade')
            ->from($this->getEntityName(), 'a')
            ->innerJoin('a.coModalidade', 'm');

        $params = array();
        parse_str($request->query->get('data'), $params);

        if (isset($params['coModalidade']) && $params['coModalidade']) {
            $query->andWhere($query->expr()->eq('m.coSeqModalidade', ':coSeqModalidade'))
                ->setParameter('coSeqModalidade', $params['coModalidade']);
        }

        if (isset($params['stAtivo']) && $params['stAtivo']) {
            $query->andWhere('a.stAtivo = :stAtivo')
                ->setParameter('stAtivo', $params['stAtivo']);
        }

        if (isset($params['noArea']) && $params['noArea']) {
            $query->andWhere($query->expr()->like("UPPER(a.noArea)", "UPPER(:noArea)"))
                ->setParameter('noArea', '%' . $params['noArea'] . '%');
        }

        $this->addOrderBy($query, $request);

        return $query->getQuery()->getArrayResult();
    }

    public function checkDuplicity($entity)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $query        = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('a')
            ->from($this->_entityName, 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->andWhere($queryBuilder->expr()->eq('UPPER(a.noArea)', 'UPPER(:noArea)'))
            ->setParameter('noArea', trim($entity->getNoArea()))
            ->andWhere($queryBuilder->expr()->eq('m.coSeqModalidade', ':coSeqModalidade'))
            ->setParameter('coSeqModalidade', $entity->getCoModalidade()->getCoSeqModalidade());

        if ($entity->getCoSeqArea()) {
            $query->andWhere($queryBuilder->expr()->neq('a.coSeqArea', ':coSeqArea'))
                ->setParameter('coSeqArea', $entity->getCoSeqArea());
        }
        return $query->getQuery()->getResult();
    }

	public function getAreaModalidadeEvento($coModalidade){
		/*se a modalidade não existir vai retornar um array vazio*/
		if(!$coModalidade){
			return array();
		}

		$query = $this
			->getEntityManager()
			->createQueryBuilder()
			->select('e.coSeqEvento')
			->from('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity', 'm')
			->innerJoin('m.coEvento', 'e')
			->where('m.coSeqModalidade = :coSeqModalidade')
			->setParameter('coSeqModalidade', $coModalidade)
			->groupBy('e.coSeqEvento');

		/*retornando o evento da modalidade que está sendo passada como parametro*/
		$coSeqEvento = $query->getQuery()->getSingleScalarResult();

		if(!$coSeqEvento){
			return array();
		}

		$queryArea = $this
			->getEntityManager()
			->createQueryBuilder()
			->select('count(a.nuArea) + 1')
			->from($this->getEntityName(), 'a')
			->innerJoin('a.coModalidade', 'm')
			->innerJoin('m.coEvento', 'e')
			->where('e.coSeqEvento = :coSeqEvento')
			->setParameter('coSeqEvento', $coSeqEvento)
			->groupBy('e.coSeqEvento');
		/*retornando a quantidade de áreas já cadastradas para aquele evento*/
		return $queryArea->getQuery()->getResult();

	}
}
