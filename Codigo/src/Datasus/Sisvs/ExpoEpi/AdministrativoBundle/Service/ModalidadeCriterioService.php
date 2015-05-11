<?php

		namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

		use Datasus\Core\BaseBundle\Entity\AbstractBase;
		use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
		use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

		class ModalidadeCriterioService extends CrudService
		{

				protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeCriterioEntity';
				protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\ModalidadeCriterioEntityType';

				public function saveModalidadeCriterio($params)
				{
						$srvCriterio      = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.criterio');
						$srvModalidade    = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.modalidade');
						$entityModalidade = $srvModalidade->find($params['coSeqModalidade']);
						if (!isset($params['checkCriterio'])) {
								$this->registerError('administrativo.validations.default.MoreThanOne');
								$this->triggerErrors();
						}

						foreach ($params['checkCriterio'] as $value) {
								$enCriterio = $srvCriterio->find($value);
								$entity     = $this->getEntity();
								$entity->setCoModalidade($entityModalidade);
								$entity->setCoCriterio($enCriterio);

								if (isset($params['stPermiteBloqueio'])) {
										foreach ($params['stPermiteBloqueio'] as $bloqueio) {
												if ($bloqueio == $value) {
														$entity->setStPermiteBloqueio('S');
												}
										}
								}
								if (isset($params['stPossuiCategoria'])) {
												if ($value == $params['stPossuiCategoria']) {
														$entity->setStPossuiCategoria('S');
										}
								}
								if (isset($params['stNaoInformado'])) {
										foreach ($params['stNaoInformado'] as $informado) {
												if ($informado == $value) {
														$entity->setStNaoInformado('S');
												}
										}
								}
								$this->save($entity);
						}
				}

				public function save(AbstractBase $entity)
				{
						try {
								$this->getEntityManager()->persist($entity);
								$this->getEntityManager()->flush($entity);
						} catch (\Exception $exc) {
								throw new ServiceCrudException($exc->getMessage());
						}

						return $entity;
				}
		}
