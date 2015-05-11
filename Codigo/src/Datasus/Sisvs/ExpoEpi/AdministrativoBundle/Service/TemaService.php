<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\Config\Definition\Exception\Exception;

class TemaService extends CrudService
{

		protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TemaEntity';
		protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\TemaEntityType';

		public function preInsert(AbstractBase $entity)
		{
				$entity->setStAtivo('S');

				$coSeqTpClassificacao = $entity->getCoTipoClassificacao()->getCoSeqTipoClassificacao();

				if ($coSeqTpClassificacao == 1) {
						$coArea = $entity->getCoArea()->getCoSeqArea();
						$criteria = array(
								'coArea' => $coArea,
								'stAtivo' => 'S'
						);
						$arrTema = $this->findBy($criteria, array('coSeqTema' => 'DESC'));;
						if ($arrTema) {
								$codeLast = current($arrTema)->getNuTema() + 1;
								$entity->setNuTema($codeLast);
						} else {
								$entity->setNuTema(1);
						}
				}
		}

		public function preSave(AbstractBase $entity)
		{
				$desc = $entity->getDsTema();
				$nova_desc = str_replace("\n", "", $desc);
				$entity->setDsTema($nova_desc);

				if ($this->getRepository()->checkDuplicity($entity)) {
						$this->registerError('administrativo.validations.tema.NotEqualTo');
				}
		}

		public function changeOrder(AbstractBase $entity, $order)
		{

				try {
						if ($order == 'up') {
								$criteria = array(
										'nuTema' => $entity->getNuTema() - 1,
										'coArea' => $entity->getCoArea()->getCoSeqArea(),
										'stAtivo' => 'S'
								);

								$entityOld = $this->findOneBy($criteria);
								$orderOld = $entityOld->getNuTema();
								$entityOld->setNuTema($entity->getNuTema());
								$this->getEntityManager()->persist($entityOld);
								$this->getEntityManager()->flush($entityOld);

								$entity->setNuTema($orderOld);
								$this->getEntityManager()->persist($entity);
								$this->getEntityManager()->flush($entity);

						} else {
								$criteria = array(
										'nuTema' => $entity->getNuTema() + 1,
										'coArea' => $entity->getCoArea()->getCoSeqArea(),
										'stAtivo' => 'S'
								);
								$entityOld = $this->findOneBy($criteria);
								$orderOld = $entityOld->getNuTema();

								$entityOld->setNuTema($entity->getNuTema());
								$this->getEntityManager()->persist($entityOld);
								$this->getEntityManager()->flush($entityOld);

								$entity->setNuTema($orderOld);
								$this->getEntityManager()->persist($entity);
								$this->getEntityManager()->flush($entity);
						}

						return true;
				} catch (Exception $exc) {
						return false;
				}
		}

		public function preActiveInactive(AbstractBase $entity)
		{
				$coSeqTpClassificacao = $entity->getCoTipoClassificacao()->getCoSeqTipoClassificacao();

				if ($coSeqTpClassificacao == 1) {
						$entity->setNuTema(null);
				}

		}

		public function postActiveInactive(AbstractBase $entity)
		{
				$coSeqTpClassificacao = $entity->getCoTipoClassificacao()->getCoSeqTipoClassificacao();

				if ($coSeqTpClassificacao == 1) {
						$criteria = array(
								'coArea' => $entity->getCoArea()->getCoSeqArea(),
								'stAtivo' => 'S'
						);

						$index = 1;
						$arrTema = $this->findBy($criteria, array('coSeqTema' => 'asc'));
						foreach ($arrTema as $value) {
								$value->setNuTema($index);

								if ($entity->getCoSeqTema() != $value->getCoSeqTema()) {
										$this->getEntityManager()->persist($value);
										$this->getEntityManager()->flush($value);

										$index++;
								}
						}

						if ($entity->getStAtivo() == 'S') {
								$res = $this->getRepository()->getProximoTema($entity);

                            if($res['nuTema'] == null){
                                $res['nuTema']  = 1;
                                $entity->setNuTema($res['nuTema']);
                            }

                            $entity->setNuTema($res['nuTema']);
								$this->getEntityManager()->persist($entity);
								$this->getEntityManager()->flush($entity);
						}

				}
		}

		/**
		 * função responsável por ativar ou inativar o tema
		 * @param $dados
		 * @return mixed
		 */
		public function ativaInativaTema($sqCodigo)
		{
				return $this->getRepository()->ativaInativaTema($sqCodigo);
		}

		public function findByTema(array $criteria = array())
		{
				return $this->getRepository()->findByTema($criteria);
		}

}