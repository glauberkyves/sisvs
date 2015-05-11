<?php

		namespace Datasus\Sisvs\ExpoEpi\EmailBundle\Service;

		use Datasus\Sisvs\Base\BaseBundle\Service\BaseService;
		use Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\Dominio\Atores;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
		use Doctrine\Common\Collections\Criteria;
		use Symfony\Component\HttpFoundation\Request;

		class EmailService extends BaseService
		{
				protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity';

				/**
				 * @param array $criteria
				 * @param array $orderBy
				 */
				public function comboBox(array $criteria = array(), array $orderBy = array())
				{
						$repository = 'DatasusSisvsExpoEpiAutorBundle:SituacaoInscricaoEntity';
						$params = array();

						if ($criteria['envolvido'] == Atores::SEQ_TRIADOR) {
								$params = new Criteria();
								$params->andWhere($params->expr()->in('coSituacao', array(
										SituacaoInscricaoService::ST_SITUACAO_ENVIADA,
										SituacaoInscricaoService::ST_SITUACAO_ANALISE_NA_TRIAGEM,
										SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM,
										SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM,
										SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO,
										SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO,

								)));

								$result = array();
								foreach ($this->getRepository($repository)->matching($params)->toArray() as $value) {
										$result[$value->getCoSituacao()] = $value->getDsSituacao();
								}

								return $result;
						}

						if ($criteria['envolvido'] == Atores::SEQ_AUTOR) {
								$params = new Criteria();
								$params->andWhere($params->expr()->in('coSituacao', array(
										SituacaoInscricaoService::ST_SITUACAO_PENDENTE,
										SituacaoInscricaoService::ST_SITUACAO_ENVIADA,
								)));

								$result = array();
								foreach ($this->getRepository($repository)->matching($params)->toArray() as $value) {
										$result[$value->getCoSituacao()] = $value->getDsSituacao();
								}

								return $result;
						}

						if ($criteria['envolvido'] == Atores::SEQ_AVALIADOR) {
								$params = new Criteria();
								$params->andWhere($params->expr()->in('coSituacao', array(
										SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO,
										SituacaoInscricaoService::ST_INSCRICAO_EM_ANAISE_NA_AVALIACAO,
										SituacaoInscricaoService::ST_RECOMENDADO,
										SituacaoInscricaoService::ST_NAO_RECOMENDADO,
										SituacaoInscricaoService::ST_PRE_FINALISTA_ORAL,
										SituacaoInscricaoService::ST_PRE_FINALISTA_POSTER,
										SituacaoInscricaoService::ST_FINALISTA_ORAL,
										SituacaoInscricaoService::ST_FINALISTA_POSTER,
										SituacaoInscricaoService::ST_NAO_SELECIONADO
								)));

								$result = array();
								foreach ($this->getRepository($repository)->matching($params)->toArray() as $value) {
										$result[$value->getCoSituacao()] = $value->getDsSituacao();
								}

								return $result;
						}

						return $this->getRepository($repository)->comboBox($params, $orderBy);
				}

				public function getResultGrid(Request $request)
				{
						$params = array();
						parse_str($request->query->get('data'), $params);
						$repository = 'DatasusSisvsExpoEpiAutorBundle::InscricaoEntity';
						$this->dataGrid = $this->getRepository($repository)->getResultGridMalaDireta($request);

						return parent::getResultGrid($request);
				}

				public function findAllCoSeqUsuario($ids)
				{
						$repository = 'DatasusSisvsBaseSecurityBundle::UsuarioEntity';
						return $this->getRepository($repository)->findAllCoSeqUsuario($ids);
				}
		}
