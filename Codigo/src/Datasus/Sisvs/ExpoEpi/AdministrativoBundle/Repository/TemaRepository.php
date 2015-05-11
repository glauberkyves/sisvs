<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

class TemaRepository extends BaseRepository
{
		public function getResultGrid(Request $request)
		{
				$query = $this
						->getEntityManager()
						->createQueryBuilder()
						->select('e.coSeqTema, e.noTema, e.nuTema, tc.coSeqTipoClassificacao, tc.dsClassificacao, e.stAtivo')
						->from($this->getEntityName(), 'e')
						->innerJoin('e.coTipoClassificacao', 'tc')
						->innerJoin('e.coArea', 'a')
						->orderBy('e.nuTema', 'asc');

				$params = array();
				parse_str($request->query->get('data'), $params);

				if (isset($params['coArea']) && $params['coArea']) {
						$query->andWhere('a.coSeqArea = :coArea')
								->setParameter('coArea', $params['coArea']);
				}

				if (isset($params['noTema']) && $params['noTema']) {
						$query->andWhere($query->expr()->like("UPPER(e.noTema)", "UPPER(:noTema)"))
								->setParameter('noTema', '%' . $params['noTema'] . '%');
				}

				if (isset($params['stAtivo']) && $params['stAtivo'] == 'N') {
						$query->andWhere('e.stAtivo = :stAtivo')
								->setParameter('stAtivo', $params['stAtivo']);
				} else {
						$query->andWhere('e.stAtivo = :stAtivo')
								->setParameter('stAtivo', 'S');
				}
				/**
				 * @todo rever a nescessidade da utilização desse método
				 * $this->addOrderBy($query, $request);
				 */
				$result = $query->getQuery()->getArrayResult();
				return $this->ordenarItens($result);
		}

		private function ordenarItens(array $result)
		{
				$arrAlfa = array(
						"A", "B", "C", "D", "E", "F", "G", "H", "I", "J",
						"K", "L", "M", "N", "O", "P", "Q", "R", "S", "U",
						"V", "W", "X", "Y", "Z"
				);

				foreach ($result as $key => $value) {
						if ($value['coSeqTipoClassificacao'] == 1 && $value['nuTema']) {
								$result[$key]['nuTema'] = strtolower($arrAlfa[$value['nuTema'] - 1] . ')');
						}
				}

				return $result;
		}

		public function addWhere(QueryBuilder $query, Request $request = null)
		{
				$params = array();
				parse_str($request->query->get('data'), $params);

				if (isset($params['coArea']) && $params['coArea']) {
						$query->andWhere($query->expr()->eq('a.coSeqArea', ':coSeqArea'))
								->setParameter('coSeqArea', $params['coArea']);
				}

				parent::addWhere($query, $request);
		}

		public function checkDuplicity($entity)
		{
				$coSeqTpClassificacao = is_object($entity->getCoTipoClassificacao())
						? $entity->getCoTipoClassificacao()->getCoSeqTipoClassificacao() :
						$entity->getCoTipoClassificacao();

				$queryBuilder = $this->getEntityManager()->createQueryBuilder();
				$query = $this
						->getEntityManager()
						->createQueryBuilder()
						->select('e')
						->from($this->_entityName, 'e')
						->innerJoin('e.coArea', 'a')
						->innerJoin('e.coTipoClassificacao', 'tc')
						->andWhere($queryBuilder->expr()->eq('UPPER(e.noTema)', 'UPPER(:noTema)'))
						->setParameter('noTema', trim($entity->getNoTema()))
						->andWhere($queryBuilder->expr()->eq('a.coSeqArea', ':coSeqArea'))
						->setParameter('coSeqArea', $entity->getCoArea())
						->andWhere($queryBuilder->expr()->eq('tc.coSeqTipoClassificacao', ':coSeqTipoClassificacao'))
						->setParameter('coSeqTipoClassificacao', $coSeqTpClassificacao);

				if ($entity->getCoSeqTema()) {
						$query->andWhere($queryBuilder->expr()->neq('e.coSeqTema', ':coSeqTema'))
								->setParameter('coSeqTema', $entity->getCoSeqTema());
				}

				return $query->getQuery()->getResult();
		}

		/**
		 * função utilizada para pegar o proximo número do tema que está
		 * para a área selecionada
		 * @param $entity
		 * @return mixed
		 * @throws \Doctrine\ORM\NonUniqueResultException
		 */
		public function getProximoTema($entity)
		{
				$querySelect = $this
						->getEntityManager()
						->createQueryBuilder()
						->select('MAX(t.nuTema) + 1 as nuTema')
						->from($this->getEntityName(), 't')
						->innerJoin('t.coArea', 'a')
						->where('a.coSeqArea = :coSeqArea')
						->setParameter('coSeqArea', $entity->getCoArea()->getCoSeqArea());
				return $querySelect->getQuery()->getOneOrNullResult();

		}

		public function findByTema(array $criteria = array()){
				$query = $this->getEntityManager()
						->createQueryBuilder()
						->select("e.coSeqTema, e.noTema,e.nuTema")
						->from($this->getEntityName(), 'e')
						->addOrderBy("e.noTema",'ASC');

				foreach ($criteria as $key => $value) {
						$query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
								->setParameter($key, $value);
				}

				$comboBox = array();
				foreach ($query->getQuery()->getArrayResult() as $key => $value) {
						$comboBox[$value['coSeqTema']] = $value['noTema'];
				}

 				return $comboBox;
		}

}
