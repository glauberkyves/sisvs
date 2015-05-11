<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Symfony\Component\HttpFoundation\Request;

class CriterioRepository extends BaseRepository
{
		public function listaCriterios(Request $request)
		{
				$params = array();
				parse_str($request->query->get('data'), $params);

            $columns = array(
                'e.noCriterio,
                e.coSeqCriterio,
                e.stAtivo'
            );

				$query = $this
						->getEntityManager()
						->createQueryBuilder()
						->select($columns)
						->from($this->getEntityName(), 'e');

				if ($params['stAtivo'] == '' and $params['noCriterio'] == '') {
						$query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
								->setParameter('stAtivo', 'S');
				}
				if ($params['stAtivo'] != null) {
						$query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
								->setParameter('stAtivo', $params['stAtivo']);
				}

				if (isset($params['noCriterio']) and $params['noCriterio']) {
						$query->andWhere($query->expr()->like("UPPER(e.noCriterio)", "UPPER(:noCriterio)"))
								->setParameter('noCriterio', '%' . $params['noCriterio'] . '%');
				}

            $this->addOrderBy($query, $request);
				return $query
						->getQuery()
						->getArrayResult();
		}
}
