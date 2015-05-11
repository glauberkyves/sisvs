<?php

	namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Repository;

	use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
	use Datasus\Sisvs\ExpoEpi\RelatorioBundle\Repository\RelatorioRepository;
	use Symfony\Component\HttpFoundation\Request;

	class InscricaoRepository extends RelatorioRepository
	{
		/**
		 * @param Request $request
		 *
		 * @return array
		 */
		public function getInscricoesPorAutor(Request $request, $coSeqUsuario)
		{
			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('i.coSeqInscricao,i.nuInscricao, i.dsTitulo,it.noInstituicao, m.noModalidade, a.noArea, t.noTema, e.noEvento, s.coSituacao, s.dsSituacao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('i.coInstituicao', 'it')
				->innerJoin('i.coUsuario', 'u')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->where('u.coSeqUsuario = :coSeqUsuario')
				->setParameter('coSeqUsuario', $coSeqUsuario)
				->andWhere('i.stAtivo = :stAtivo')
				->setParameter('stAtivo', 'S');

			$params = array();
			parse_str($request->query->get('data'), $params);

			if (isset($params['coEvento']) && $params['coEvento']) {
				$query->andWhere('e.coSeqEvento = :coEvento')
					->setParameter('coEvento', $params['coEvento']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere($this->getEntityManager()->createQueryBuilder()->expr()->like('UPPER(i.nuInscricao)', "UPPER( :inscricao )"))
					->setParameter('inscricao', "%{$params['nuInscricao']}%");
			}
			$this->addOrderBy($query, $request);
			return $query
				->getQuery()
				->getArrayResult();
		}

		/**
		 * @param Request $request
		 *
		 * @return array
		 */
		public function getInscricoesPorEvento(Request $request)
		{
			$situacaoDuplicata = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
			$situacaoModalidade = 'N';
			$params            = array();
			parse_str($request->query->get('data'), $params);

			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('i.coSeqInscricao,i.nuInscricao, i.dsTitulo, m.noModalidade, a.noArea,u.noUsuario, t.noTema, e.noEvento, s.coSituacao, s.dsSituacao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coUsuario', 'u')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->where('m.stAtivo <> :stAtivo')
				->setParameter('stAtivo', $situacaoModalidade)
				->andWhere('i.stAtivo <> :stAtivo')
                ->setParameter('stAtivo', $situacaoModalidade)
            ;


			if (isset($params['coEvento']) && $params['coEvento']) {
				$query->andWhere('e.coSeqEvento = :coEvento')
					->setParameter('coEvento', $params['coEvento']);
			}

			if (isset($params['dsSituacao']) && $params['dsSituacao']) {
				$query->andWhere('i.coSituacaoInscricao = :dsSituacao')
					->setParameter('dsSituacao', $params['dsSituacao']);
			}

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('m.coSeqModalidade = :modalidade')
					->setParameter('modalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('a.coSeqArea = :area')
					->setParameter('area', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('t.coSeqTema = :tema')
					->setParameter('tema', $params['coTema']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere($this->getEntityManager()->createQueryBuilder()->expr()->like('UPPER(i.nuInscricao)', "UPPER( :inscricao )"))
					->setParameter('inscricao', "%{$params['nuInscricao']}%");
			}
			$this->addOrderBy($query, $request);

			return $query->getQuery()->getArrayResult();
		}


		/**
		 * @param Request $request
		 *
		 * @return array
		 */
		public function getTotalDeInscricoesPorEvento(Request $request)
		{
			$situacaoDuplicata = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
			$situacaoEnviada   = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
			$situacaoPendente   = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
			$situacaoModalidade = 'N';

			$params = array();
			parse_str($request->query->get('data'), $params);
			$query = $this->getEntityManager()->createQueryBuilder();
			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('count(i.coSeqInscricao)')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coUsuario', 'u')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->where($query->expr()->in('i.coSituacaoInscricao', array($situacaoEnviada, $situacaoDuplicata)))
					->andWhere('i.stAtivo <> :stAtivo')
					->setParameter('stAtivo', $situacaoModalidade)

				->andWhere('e.coSeqEvento = :coEvento')->setParameter('coEvento', $params['coEvento'])
				->andWhere('m.stAtivo <> :stAtivo')
				->setParameter('stAtivo', $situacaoModalidade)
            ;

			if (isset($params['dsSituacao']) && $params['dsSituacao'] != $situacaoPendente) {
				$query->orWhere('i.coSituacaoInscricao = :dsSituacao')
					->setParameter('dsSituacao', $params['dsSituacao']);
			}

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('m.coSeqModalidade = :modalidade')
					->setParameter('modalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('a.coSeqArea = :area')
					->setParameter('area', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('t.coSeqTema = :tema')
					->setParameter('tema', $params['coTema']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere($this->getEntityManager()->createQueryBuilder()->expr()->like('i.nuInscricao', ":inscricao"))
					->setParameter('inscricao', "%{$params['nuInscricao']}%");
			}
			$this->addOrderBy($query, $request);

			return $query->getQuery()->getSingleScalarResult();
		}


		/**
		 * @param Request $request
		 *
		 * @return array
		 */
		public function getInscricoesPorTema(Request $request)
		{
			$situacaoEnviada   = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
			$situacaoDuplicada = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
			$situacaoModalidade = 'N';

			$params = array();
			parse_str($request->query->get('data'), $params);

			$query = $this->getEntityManager()->createQueryBuilder();

			$subQuery = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('count(i.coSeqInscricao) as ')
				->from($this->getEntityName(), 'i')
				->where('i.coTema = t.coSeqTema')
				->andWhere('i.stAtivo <> :stAtivo')
				->setParameter('stAtivo', $situacaoModalidade);

			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('t.noTema, t.coSeqTema,count(t.coSeqTema) as total')
				->from('DatasusSisvsExpoEpiAdministrativoBundle:TemaEntity ', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->innerJoin('t.coInscricao', 'i')
				->where($query->expr()->in('i.coSituacaoInscricao', array($situacaoEnviada, $situacaoDuplicada)))
				->andWhere('m.stAtivo <> :stAtivo')
				->setParameter('stAtivo', $situacaoModalidade)
					->addOrderBy('t.coSeqTema')
			;


			if (isset($params['coEvento']) && $params['coEvento']) {
				$query->andWhere('e.coSeqEvento = :evento')
					->setParameter('evento', $params['coEvento']);
			}

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('m.coSeqModalidade = :modalidade')
					->setParameter('modalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('a.coSeqArea = :area')
					->setParameter('area', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('t.coSeqTema = :tema')
					->setParameter('tema', $params['coTema']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere('i.nuInscricao = :inscricao')
					->setParameter('inscricao', $params['nuInscricao']);
			}
			$query->groupBy('t.noTema, t.coSeqTema');
			$this->addOrderBy($query, $request);

			return $query->getQuery()->getArrayResult();
		}

		public function getInscricoesPorArea(Request $request)
		{
			$situacaoEnviada   = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
			$situacaoDuplicada = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
			$situacaoModalidade = 'N';

			$params            = array();
			parse_str($request->query->get('data'), $params);

			$query = $this->getEntityManager()->createQueryBuilder();

			$subQuery = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('count(i.coSeqInscricao) as total')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coTema', 'tt')
				->innerJoin('tt.coArea', 'aa')
				->where('i.coTema = tt.coSeqTema')
				->andWhere($query->expr()->in('i.coSituacaoInscricao', array($situacaoEnviada, $situacaoDuplicada)))
				->andWhere('i.stAtivo = :stAtivo')
				->setParameter('stAtivo', 'S')
				->andWhere('tt.coSeqTema = a.coSeqArea');

			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('a.coSeqArea ,a.noArea, count(a.coSeqArea)')
				->addSelect('(' . $subQuery->getQuery()->getDQL() . ') inscricao')
				->from('DatasusSisvsExpoEpiAdministrativoBundle:AreaEntity ', 'a')
				->innerJoin('a.coTema', 't')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->innerJoin('t.coInscricao', 'ii')
				->where($query->expr()->in('ii.coSituacaoInscricao', array($situacaoEnviada, $situacaoDuplicada)))
				->andWhere('m.stAtivo <> :stAtivo')
				->setParameter('stAtivo', $situacaoModalidade)
				->addOrderBy('a.coSeqArea')
				->groupBy('a.coSeqArea ,a.noArea');


			if (isset($params['coEvento']) && $params['coEvento']) {
				$query->andWhere('e.coSeqEvento = :evento')
					->setParameter('evento', $params['coEvento']);
			}

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('m.coSeqModalidade = :modalidade')
					->setParameter('modalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('a.coSeqArea = :area')
					->setParameter('area', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('t.coSeqTema = :tema')
					->setParameter('tema', $params['coTema']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere('ii.nuInscricao = :inscricao')
					->setParameter('inscricao', $params['nuInscricao']);
			}

			return $query->getQuery()->getArrayResult();
		}

		/**
		 * @param Request $request
		 *
		 * @return array
		 */
		public function getInscricoesDuplicadasPorEvento(Request $request)
		{
			$sql = 'select t.noTema, t.coSeqTema, a.coSeqArea,m.coSeqModalidade,e.coSeqEvento,
            (select count(i.coSeqInscricao)
                   from DatasusSisvsExpoEpiAutorBundle:InscricaoEntity i
                    where i.coTema = t.coSeqTema) total
                           from DatasusSisvsExpoEpiAdministrativoBundle:TemaEntity t
                           inner join t.coArea a
                           inner join a.coModalidade m
                           inner join m.coEvento e
                    ';

			$query = $this->getEntityManager()->createQuery($sql);

			return $query->getResult();
		}

		/**
		 * @param Request $request
		 *
		 * @return array
		 * Retorna o total de registros de inscriçõs da base de dados
		 */
		public function getTotalDeInscricoes(Request $request)
		{
				$situacaoInscricao = 'N';
			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('count(i.coSeqInscricao),i.coSeqInscricao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
					->andWhere('i.stAtivo <> :stAtivo')
					->setParameter('stAtivo', $situacaoInscricao)
				->groupBy('i.coSeqInscricao');

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('m.coSeqModalidade = :modalidade')
					->setParameter('modalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('a.coSeqArea = :area')
					->setParameter('area', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('t.coSeqTema = :tema')
					->setParameter('tema', $params['coTema']);
			}

			if (isset($params['nuInscricao']) && $params['nuInscricao']) {
				$query->andWhere('i.nuInscricao = :inscricao')
					->setParameter('inscricao', $params['nuInscricao']);
			}
			return $query->getQuery()->getResult();
		}


		public function getCountDuplicidade(Request $request)
		{
			$situacaoPendente  = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
			$situacaoBloqueado = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
			$situacaoInscricao = 'N';

			$qrBuilder = $this->getEntityManager()->createQueryBuilder();

			$dqlDuplicidade = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('MIN(ii1.coSeqInscricao)')
				->from($this->getEntityName(), 'ii1')
				->innerJoin('ii1.coUsuario', 'uu1')
				->innerJoin('ii1.coInstituicao', 'inss1')
				->innerJoin('ii1.coTema', 'tt1')
//				->innerJoin('ii1.coHistorico', 'hh1')
				->innerJoin('ii1.coSituacaoInscricao', 'ss1')
				->where('(TRIM(ii1.dsTitulo) = TRIM(ii.dsTitulo)) OR (SUBSTRING(TO_CHAR(ii1.dsResumo), 0, 120) = SUBSTRING(TO_CHAR(ii.dsResumo), 0, 120))')
				->andWhere($qrBuilder->expr()->neq('ss1.coSituacao', $situacaoPendente))
				->andWhere($qrBuilder->expr()->neq('ss1.coSituacao', $situacaoBloqueado))
				->andWhere($qrBuilder->expr()->eq('uu1.coSeqUsuario', 'uu.coSeqUsuario'))
				->andWhere($qrBuilder->expr()->eq('tt1.coSeqTema', 'tt.coSeqTema'))
				->andWhere($qrBuilder->expr()->neq('ii1.coSeqInscricao', 'ii.coSeqInscricao'))
				->getQuery()
				->getDQL();

			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('COUNT(ii.coSeqInscricao)')
				->from($this->getEntityName(), 'ii')
				->innerJoin('ii.coUsuario', 'uu')
				->innerJoin('ii.coSituacaoInscricao', 'ss')
				->innerJoin('ii.coInstituicao', 'itt')
				->innerJoin('ii.coTema', 'tt')
				->innerJoin('tt.coArea', 'aa')
				->innerJoin('aa.coModalidade', 'mm')
				->innerJoin('mm.coEvento', 'ee')
				->where($qrBuilder->expr()->neq('ii.coSituacaoInscricao', $situacaoPendente))
				->andWhere($qrBuilder->expr()->neq('ii.coSituacaoInscricao', $situacaoBloqueado))
				->andWhere("($dqlDuplicidade) <> 0");

			$params = array();
			parse_str($request->query->get('data'), $params);

			if (isset($params['coEvento']) && $params['coEvento']) {
				$query->andWhere('ee.coSeqEvento = :evento')
					->setParameter('evento', $params['coEvento']);
			}

			if (isset($params['coModalidade']) && $params['coModalidade']) {
				$query->andWhere('mm.coSeqModalidade = :coModalidade')
					->setParameter('coModalidade', $params['coModalidade']);
			}

			if (isset($params['coArea']) && $params['coArea']) {
				$query->andWhere('aa.coSeqArea = :coArea')
					->setParameter('coArea', $params['coArea']);
			}

			if (isset($params['coTema']) && $params['coTema']) {
				$query->andWhere('tt.coSeqTema = :coTema')
					->setParameter('coTema', $params['coTema']);
			}

			return $query->getQuery()->getDQL();
		}

		/***
		 * @param Request $request
		 *
		 * @return array
		 *  Retorna a lista de possiveis duplicatas
		 */

			public function getCheckDuplicity(Request $request)
			{
					$situacaoPendente   = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
					$situacaoBloqueado  = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
					$situacaoModalidade = 'N';
					$qrBuilder          = $this->getEntityManager()->createQueryBuilder();

					$dqlDuplicidade = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('MIN(i1.coSeqInscricao)')
							->from($this->getEntityName(), 'i1')
							->innerJoin('i1.coUsuario', 'u1')
							->innerJoin('i1.coInstituicao', 'ins1')
							->innerJoin('i1.coTema', 't1')
							->innerJoin('i1.coSituacaoInscricao', 's1')
							->where('(TRIM(i1.dsTitulo) = TRIM(i.dsTitulo)) OR (SUBSTRING(TO_CHAR(i1.dsResumo), 0, 120) = SUBSTRING(TO_CHAR(i.dsResumo), 0, 120))')
							->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoPendente))
							->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoBloqueado))
							->andWhere($qrBuilder->expr()->eq('u1.coSeqUsuario', 'u.coSeqUsuario'))
							->andWhere($qrBuilder->expr()->eq('t1.coSeqTema', 't.coSeqTema'))
							->andWhere($qrBuilder->expr()->neq('i1.coSeqInscricao', 'i.coSeqInscricao'))
							->getQuery()
							->getDQL();

					$dqlDtSituacao = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('MIN(h2.dtSituacao)')
							->from('DatasusSisvsExpoEpiAutorBundle:HistoricoInscricaoEntity', 'h2')
							->where($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoPendente))
							->andWhere($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoBloqueado))
							->andWhere($qrBuilder->expr()->eq('h2.coInscricao', 'i.coSeqInscricao'))
							->andWhere($qrBuilder->expr()->isNotNull('h2.dtSituacao'))
							->getQuery()
							->getDQL();

					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('i.nuInscricao, i.coSeqInscricao, e.coSeqEvento, m.coSeqModalidade, a.coSeqArea, '
									. 't.coSeqTema, it.coSeqInstituicao, i.dsTitulo, u.noUsuario, it.coSeqInstituicao, '
									. 'it.noInstituicao, a.noArea, t.noTema, e.noEvento')
							->from($this->getEntityName(), 'i')
							->addSelect('(' . $dqlDtSituacao . ') as dtSituacao')
							->innerJoin('i.coUsuario', 'u')
							->innerJoin('i.coSituacaoInscricao', 's')
							->innerJoin('i.coInstituicao', 'it')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->where($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoPendente))
							->andWhere($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoBloqueado))
							->andWhere("($dqlDuplicidade) <> 0")
							->andWhere("({$this->getCountDuplicidade($request)}) > 1 ")
							->andWhere('m.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoModalidade)
							->andWhere('i.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoModalidade)
							->addOrderBy('i.nuInscricao','ASC');

					$params = array();
					parse_str($request->query->get('data'), $params);

					if (isset($params['coEvento']) && $params['coEvento']) {
							$query->andWhere('e.coSeqEvento = :evento')
									->setParameter('evento', $params['coEvento']);
					}

					if (isset($params['coModalidade']) && $params['coModalidade']) {
							$query->andWhere('m.coSeqModalidade = :coModalidade')
									->setParameter('coModalidade', $params['coModalidade']);
					}

					if (isset($params['coArea']) && $params['coArea']) {
							$query->andWhere('a.coSeqArea = :coArea')
									->setParameter('coArea', $params['coArea']);
					}

					if (isset($params['coTema']) && $params['coTema']) {
							$query->andWhere('t.coSeqTema = :coTema')
									->setParameter('coTema', $params['coTema']);
					}
					$this->addOrderBy($query,$request);

echo $query->getQuery()->getSQL();exit;
					return $query->getQuery()->getResult();
			}
			/***
		 * @param Request $request
		 *
		 * @return array
		 *  Retorna a lista de possiveis duplicatas
		 */

			public function getCheckDuplicityBlock(Request $request)
			{
					$params = array();
					parse_str($request->query->get('data'), $params);
					$situacaoDuplicada  = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
					$situacaoEnviada    = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
					$situacaoModalidade = 'N';
					$query              = $this->getEntityManager()->createQueryBuilder();

					$subQuery = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('min(hi.dtSituacao)')
							->from('DatasusSisvsExpoEpiAutorBundle:HistoricoInscricaoEntity', 'hi')
							->where($query->expr()->eq('hi.coSituacaoInscricao', $situacaoEnviada))
							->andWhere('hi.coInscricao = i.coSeqInscricao')
							->andWhere($query->expr()->isNotNull('hi.dtSituacao'));

					$queryN = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('i.nuInscricao, i.coSeqInscricao, i.dsTitulo, it.noInstituicao, a.noArea, t.noTema, e.noEvento,u.noUsuario')
							->distinct('i.coSeqInscricao')
							->from($this->getEntityName(), 'i')
							->addSelect('(' . $subQuery->getQuery()->getDQL() . ') dtSituacao')
							->innerJoin('i.coUsuario', 'u')
							->innerJoin('i.coSituacaoInscricao', 's')
							->innerJoin('i.coInstituicao', 'it')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->andWhere($query->expr()->eq('i.coSituacaoInscricao', $situacaoDuplicada))
							->andWhere('m.stAtivo <> :stAtivo')->setParameter('stAtivo', $situacaoModalidade)
							->andWhere('i.stAtivo <> :stAtivo')->setParameter('stAtivo', $situacaoModalidade);

					if (isset($params['coEvento']) && $params['coEvento']) {
							$queryN->andWhere('e.coSeqEvento = :evento')
									->setParameter('evento', $params['coEvento']);
					}

					if (isset($params['coModalidade']) && $params['coModalidade']) {
							$queryN->andWhere('m.coSeqModalidade = :coModalidade')
									->setParameter('coModalidade', $params['coModalidade']);
					}

					if (isset($params['coArea']) && $params['coArea']) {
							$queryN->andWhere('a.coSeqArea = :coArea')
									->setParameter('coArea', $params['coArea']);
					}

					if (isset($params['coTema']) && $params['coTema']) {
							$queryN->andWhere('t.coSeqTema = :coTema')
									->setParameter('coTema', $params['coTema']);
					}

					$result = $queryN->getQuery()->getResult();

					return $result;
			}

		public function getResultGridMail(Request $request)
		{
			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('u.coSeqUsuario, u.dsEmail, u.noUsuario, i.coSeqInscricao, i.nuInscricao,'
					. ' m.noModalidade, a.noArea, t.noTema, i.dsTitulo, s.coSituacao, s.dsSituacao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coUsuario', 'u')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->groupBy('u.coSeqUsuario, u.dsEmail, u.noUsuario, i.coSeqInscricao, i.nuInscricao,'
					. ' m.noModalidade, a.noArea, t.noTema, i.dsTitulo, s.coSituacao, s.dsSituacao');

			$params = array();
			parse_str($request->query->get('data'), $params);

			foreach ($params as $key => $value) {
				if ($value != '') {
					switch ($key) {
						case 'dsTitulo':
							$query->andWhere($query->expr()->like("i.{$key}", $query->expr()->lower(":$key")))
								->setParameter($key, "%$value%");
							break;

						case 'nuInscricao':
							$query->andWhere($query->expr()->like("i.{$key}", ":$key"))
								->setParameter($key, "%$value%");
							break;

						case 'noUsuario':
							$query->andWhere($query->expr()->like("u.{$key}", $query->expr()->upper(":$key")))
								->setParameter($key, "%$value%");
							break;

						case 'coSeqEvento':
							$query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coSeqModalidade':
							$query->andWhere($query->expr()->eq("m.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coSeqArea':
							$query->andWhere($query->expr()->eq("a.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coSeqTema':
							$query->andWhere($query->expr()->eq("t.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coSituacao':
							$query->andWhere($query->expr()->eq("s.{$key}", ":$key"))
								->setParameter($key, $value);
							break;
					}
				}
			}
			$this->addOrderBy($query, $request);
			return $query
				->getQuery()
				->getArrayResult();
		}

		public function getInscricoesPainel($ano = null)
		{
			if (null === $ano) {
				$ano = date('Y');
			}

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();

			return $queryBuilder
				->select('i.coSeqInscricao, i.dsTitulo, m.coSeqModalidade, m.noModalidade, a.noArea, t.noTema, e.noEvento, s.dsSituacao, i.nuInscricao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coTipoModalidade', 'tm')
				->innerJoin('m.coEvento', 'e')
				->innerJoin('i.coUsuario', 'u')
				->andWhere($queryBuilder->expr()->eq('e.stAtivo', "'S'"))
				->groupBy('i.coSeqInscricao, i.dsTitulo, m.coSeqModalidade, m.noModalidade, a.noArea, t.noTema, e.noEvento, s.dsSituacao, i.nuInscricao')
				->getQuery()
				->getResult();
		}

		public function getInscricaoModalidade(Request $request, $coUsuario)
		{
			$query = $this
				->getEntityManager()
				->createQueryBuilder()
				->select('i.coSeqInscricao, i.dsTitulo, m.noModalidade, a.noArea, t.noTema, e.noEvento, s.coSituacao, s.dsSituacao, i.nuInscricao')
				->from($this->getEntityName(), 'i')
				->innerJoin('i.coSituacaoInscricao', 's')
				->innerJoin('i.coTema', 't')
				->innerJoin('t.coArea', 'a')
				->innerJoin('a.coModalidade', 'm')
				->innerJoin('m.coEvento', 'e')
				->innerJoin('i.coUsuario', 'u')
				->where('i.stAtivo = :stAtivo')
				->setParameter('stAtivo', 'S')
				->andWhere($this->getEntityManager()->createQueryBuilder()->expr()->eq('u.coSeqUsuario', $coUsuario));
			$this->addOrderBy($query, $request);
			$params = array();
			parse_str($request->query->get('data'), $params);

			foreach ($params as $key => $value) {
				if ($value != '') {
					switch ($key) {
						case 'nuInscricao':
							$query->andWhere($query->expr()->like("i.{$key}", ":$key"))
								->setParameter($key, "%$value%");
							break;

						case 'coSeqArea':
							$query->andWhere($query->expr()->eq("a.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coSeqTema':
							$query->andWhere($query->expr()->eq("t.{$key}", ":$key"))
								->setParameter($key, $value);
							break;

						case 'coModalidade':
							$query->andWhere($query->expr()->eq("m.coSeqModalidade", ":$key"))
								->setParameter($key, $value);
							break;
					}
				}
			}
			$this->addOrderBy($query, $request);
			return $query->getQuery()->getResult();
		}

		public function generateNumber($coTema)
		{

			if (!$coTema) {
				return array();
			}
			$query = $this->getEntityManager()->createQueryBuilder()
				->select('ta.nuArea, tam.nuTema, COUNT(ti.coSeqInscricao) as quantidade ')
				->from('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity', 'tm')
				->innerJoin('DatasusSisvsExpoEpiAdministrativoBundle:AreaEntity', 'ta', 'WITH', 'ta.coModalidade = tm.coSeqModalidade')
				->innerJoin('DatasusSisvsExpoEpiAdministrativoBundle:TemaEntity', 'tam', 'WITH', 'tam.coArea = ta.coSeqArea')
				->leftJoin('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'ti', 'WITH', 'ti.coTema = tam.coSeqTema');
				$query->andWhere('tam.coSeqTema = :coTema')->setParameter('coTema', $coTema);
				$query->andWhere('ti.stAtivo = :stAtivo')->setParameter('stAtivo', 'S');
				$query->andWhere('ti.coSituacaoInscricao = :coSituacaoInscricao')->setParameter('coSituacaoInscricao', SituacaoInscricaoService::ST_SITUACAO_ENVIADA);
				$query->groupBy('ta.nuArea, tam.nuTema');

				return $query->getQuery()->getResult();
		}

			public function getResultGridMalaDireta(Request $request)
			{
					$query = $this->getEntityManager()->createQueryBuilder();

					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('DISTINCT u.coSeqUsuario, u.dsEmail, u.noUsuario')
							->from($this->getEntityName(), 'i')
							->innerJoin('i.coUsuario', 'u')
							->innerJoin('i.coSituacaoInscricao', 's')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->andWhere('i.stAtivo = :stAtivo')
							->setParameter('stAtivo', 'S')
							->groupBy('u.coSeqUsuario, u.dsEmail, u.noUsuario');

					$params = array();
					parse_str($request->query->get('data'), $params);
					foreach ($params as $key => $value) {
							if ($value != '') {
									switch ($key) {
											case 'coSeqEvento':
													$query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
															->setParameter($key, $value);
													break;

											case 'coSeqModalidade':
													$query->andWhere($query->expr()->eq("m.{$key}", ":$key"))
															->setParameter($key, $value);
													break;

											case 'coSeqArea':
													$query->andWhere($query->expr()->eq("a.{$key}", ":$key"))
															->setParameter($key, $value);
													break;

											case 'coSeqTema':
													$query->andWhere($query->expr()->eq("t.{$key}", ":$key"))
															->setParameter($key, $value);
													break;

											case 'coSituacao':
													$query->andWhere($query->expr()->eq("s.{$key}", ":$key"))
															->setParameter($key, $value);
													break;
											case 'envolvidos':
													if ($value == 2) {
//															$dql = $this
//																	->getEntityManager()
//																	->createQueryBuilder()
//																	->select('tri')
//																	->from('DatasusSisvsExpoEpiIntegranteBundle:TriagemEntity', 'tri')
//																	->getQuery()
//																	->getDQL();
//
//															$query->andWhere($query->expr()->exists($dql));
															$query->andWhere($query->expr()->in("s.coSituacao", ":coSituacao"))
																	->setParameter('coSituacao', array(
																			SituacaoInscricaoService::ST_SITUACAO_ENVIADA,
																			SituacaoInscricaoService::ST_SITUACAO_ANALISE_NA_TRIAGEM,
																			SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM,
																			SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM,
																			SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO,
																			SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO,
																	));
															if (isset($params['noUsuario']) and $params['noUsuario']) {
																	$query->andWhere($query->expr()->like("UPPER(ut.noUsuario)", "UPPER( :noUsuario ) "))
																			->setParameter('noUsuario', "%{$params['noUsuario']}%");
															}
													} else if ($value == 3) {
//															$dql = $this
//																	->getEntityManager()
//																	->createQueryBuilder()
//																	->select('sel')
//																	->from('DatasusSisvsExpoEpiIntegranteBundle:AvaliacaoEntity', 'sel')
//																	->getQuery()
//																	->getDQL();
//
//															$query->andWhere($query->expr()->exists($dql));
															$query->andWhere($query->expr()->in("s.coSituacao", ":coSituacao"))
																	->setParameter('coSituacao', array(
																			SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO,
																			SituacaoInscricaoService::ST_INSCRICAO_EM_ANAISE_NA_AVALIACAO,
																			SituacaoInscricaoService::ST_RECOMENDADO,
																			SituacaoInscricaoService::ST_NAO_RECOMENDADO,
																			SituacaoInscricaoService::ST_PRE_FINALISTA_ORAL,
																			SituacaoInscricaoService::ST_PRE_FINALISTA_POSTER,
																			SituacaoInscricaoService::ST_FINALISTA_ORAL,
																			SituacaoInscricaoService::ST_FINALISTA_POSTER,
																			SituacaoInscricaoService::ST_NAO_SELECIONADO
																	));
															if (isset($params['noUsuario']) and $params['noUsuario']) {
																	$query->andWhere($query->expr()->like("UPPER(ua.noUsuario)", "UPPER( :noUsuario ) "))
																			->setParameter('noUsuario', "%{$params['noUsuario']}%");
															}
													} else {
															if (isset($params['noUsuario']) and $params['noUsuario']) {
																	$query->andWhere($query->expr()->like("UPPER(u.noUsuario)", "UPPER( :noUsuario ) "))
																			->setParameter('noUsuario', "%{$params['noUsuario']}%");
															}
													}
													break;
									}
							}
					}
					$this->addOrderBy($query, $request);
					return $query
							->getQuery()
							->getArrayResult();
			}

			public function findOneByNuInscricao($request)
			{
					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('DISTINCT i.coSeqInscricao, i.dsTitulo, m.noModalidade, a.noArea, t.noTema, e.noEvento, s.coSituacao, s.dsSituacao, i.nuInscricao')
							->from($this->getEntityName(), 'i')
							->innerJoin('i.coSituacaoInscricao', 's')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->innerJoin('i.coUsuario', 'u')
//							->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:ParticipacaoInscricaoEntity', 'pi', 'WITH', 'pi.coInscricao = i.coSeqInscricao')
							->where("e.stAtivo = 'S'")
							->andWhere('i.stAtivo = :stAtivo')
							->setParameter('stAtivo', 'S');

					if ($request->get('coUsuario') and $request->get('envolvidos') == 1) {
							$query->andWhere('i.coUsuario = :coUsuario')->setParameter('coUsuario', $request->get('coUsuario'));
//						$query->andWhere('(i.coUsuario = :coUsuario) OR (pi.coUsuarioParticipacao = :coUsuario)')->setParameter('coUsuario', $request->get('coUsuario'));
					}
					if ($request->get('coUsuario') and $request->get('envolvidos') != 1) {
							$query->andWhere('pi.coUsuarioParticipacao = :coUsuarioParticipacao')->setParameter('coUsuarioParticipacao', $request->get('coUsuario'));
					}
					if ($request->get('coSeqInscricao')) {
							$query->andWhere('i.coSeqInscricao = :coSeqInscricao')->setParameter('coSeqInscricao', $request->get('coSeqInscricao'));
					}
					if ($request->get('coSeqEvento')) {
							$query->andWhere('e.coSeqEvento = :coSeqEvento')->setParameter('coSeqEvento', $request->get('coSeqEvento'));
					}
					if ($request->get('coSeqModalidade')) {
							$query->andWhere('m.coSeqModalidade = :coSeqModalidade')->setParameter('coSeqModalidade', $request->get('coSeqModalidade'));
					}
					if ($request->get('coSeqArea')) {
							$query->andWhere('a.coSeqArea = :coSeqArea')->setParameter('coSeqArea', $request->get('coSeqArea'));
					}
					if ($request->get('coSeqTema')) {
							$query->andWhere('t.coSeqTema = :coSeqTema')->setParameter('coSeqTema', $request->get('coSeqTema'));
					}
					if ($request->get('coSituacao')) {
							$query->andWhere('s.coSituacao = :coSituacao')->setParameter('coSituacao', $request->get('coSituacao'));
					}

					return $query
							->getQuery()
							->getArrayResult();
			}

			/**
			 * pega o último número da inscrição e acrescenta mais um
			 * para gerar o número temporário, pois o número temporário
			 * vai ser alterado no momento do envio da inscrição
			 * @param $entity
			 * @return mixed
			 */
			public function ultimaChaveInscricaoEvento($entity)
			{

					$situacaoModalidade = 'N';
					$situacaoIncricao = 'N';
					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('COUNT(i) + 1')
							->from($this->getEntityName(), 'i')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->where('m.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoModalidade)
							->andWhere('i.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoIncricao);

					if ($entity->getCoTema()->getCoArea()->getCoModalidade()->getCoEvento()->getCoSeqEvento()) {
							$query->andWhere('e.coSeqEvento = :coEvento')
									->setParameter('coEvento', $entity->getCoTema()->getCoArea()->getCoModalidade()->getCoEvento()->getCoSeqEvento());
					}
					return $query->getQuery()->getSingleScalarResult();
			}

			/**
			 * pega o último número da inscrição e acrescenta mais um
			 * para gerar o número definitivo.
			 * @param $entity
			 * @return mixed
			 */
			public function ultimaChaveInscricaoDefinitiva($entity)
			{

					$situacaoModalidade = 'N';
					$situacaoIncricao = 'N';
					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('COUNT(i) + 1')
							->from($this->getEntityName(), 'i')
							->innerJoin('i.coSituacaoInscricao', 's')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->where('m.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoModalidade)
							->andWhere('i.stAtivo <> :stAtivo')
							->setParameter('stAtivo', $situacaoIncricao)
							->andWhere('s.coSituacao <> :coSituacao')->setParameter('coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE);
					$query->andWhere('t.coSeqTema = :coSeqTema')->setParameter('coSeqTema', $entity->getCoTema()->getCoSeqTema());
					return $query->getQuery()->getSingleScalarResult();
			}

			public function ordemAPresetacaoInscricao($entity){

					$query = $this
							->getEntityManager()
							->createQueryBuilder()
							->select('ia.dsApresentacao,ap.noApresentacao,ap.coSeqApresentacao')
							->from('DatasusSisvsExpoEpiAutorBundle:InscricaoApresentacaoEntity', 'ia')
							->innerJoin('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeApresentacaoEntity', 'ma', 'WITH', 'ma.coApresentacao = ia.coApresentacao')
							->innerJoin('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i', 'WITH', 'i.coSeqInscricao = ia.coInscricao')
							->innerJoin('ia.coApresentacao', 'ap')
							->innerJoin('i.coTema', 't')
							->innerJoin('t.coArea', 'a')
							->innerJoin('a.coModalidade', 'm')
							->innerJoin('m.coEvento', 'e')
							->where('m.coSeqModalidade  =  :coSeqModalidade')
							->setParameter('coSeqModalidade', $entity->getCoTema()->getCoArea()->getCoModalidade()->getCoSeqModalidade())
							->andWhere('m.coSeqModalidade = ma.coModalidade')
							->andWhere('i.coSeqInscricao = :coSeqInscricao')
							->setParameter('coSeqInscricao', $entity->getCoSeqInscricao())
							->addOrderBy('ma.nuOrdem');

					return $query->getQuery()->getArrayResult();
			}
	}