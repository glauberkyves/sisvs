<?php

		namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

		use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;

		class CoAutorService extends CrudService
		{

				protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\CoAutorEntity';
				protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\CoAutorType';

				/**
				 *
				 * Deve receber um entidade InscricaoEntity
				 * Deve receber um array como o exemplo
				 *
				 * array(
				 *      0 => array(
				 *          'noAutor' => 'Autor',
				 *          'noInstituicao' => 'Instituicao'
				 *      ),
				 *      1 => array(
				 *          'noAutor' => 'Autor 2',
				 *          'noInstituicao' => 'Instituicao 2'
				 *      )
				 * )
				 *
				 * @param InscricaoEntity $enInscricao
				 * @param array $arrCoAutor
				 */
				public function saveCoAutor(InscricaoEntity $enInscricao, $arrCoAutor)
				{
						# remove todos os relacionamentos com o coAutor
						$arrCoAutorOld = $this->getRepository()->findByCoInscricao($enInscricao->getCoSeqInscricao());
						if ($arrCoAutorOld) {
								foreach ($arrCoAutorOld as $entity) {
										$this->getRepository()->update($entity);
								}
						}
						# insere os coAutor
						foreach ($arrCoAutor as $value) {

								$entity = $this->getEntity();
								$entity->fromArray($value->toArray());
								$entity->setCoInscricao($enInscricao);
								$entity->setStAtivo('S');

								if ($entity->getNoAutor() != null) {
										$this->getEntityManager()->persist($entity);
										$this->getEntityManager()->flush($entity);
								}
						}
				}

		}
