<?php

		namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

		use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;


		class InscricaoApresentacaoService extends CrudService
		{

				protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoApresentacaoEntity';
				protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\InscricaoApresentacaoEntityType';

				/**
				 *
				 * Deve receber um entidade InscricaoEntity
				 * Deve receber um array como o exemplo
				 *
				 * array(
				 *      0 => array(
				 *          'coApresentacao' => 1,
				 *          'dsApresentacao' => 'Descricao'
				 *      ),
				 *      1 => array(
				 *          'coApresentacao' => 2,
				 *          'dsApresentacao' => 'Descricao 2'
				 *      )
				 * )
				 *
				 * @param InscricaoEntity $enInscricao
				 * @param array $arrInscricaoApresentacao
				 */
				public function saveInscricaoApresentacao(InscricaoEntity $enInscricao, $arrInscricaoApresentacao)
				{
						# remove todos os relacionamentos com a inscricao
						$arrInscricaoApresentacaoOld = $this->findByCoInscricao($enInscricao->getCoSeqInscricao());

						if ($arrInscricaoApresentacaoOld) {
								foreach ($arrInscricaoApresentacaoOld as $entity) {
										foreach ($arrInscricaoApresentacao as $value) {
												$this->getRepository()->update($value);
										}
								}
						} else {

								# insere as inscricoes com suas apresentacoes
								$index = 0;
								foreach ($arrInscricaoApresentacao as $value) {
										$index++;
										$entity = $this->getEntity();

										$entity->setCoInscricao($enInscricao);
										$entity->setCoApresentacao($value->getCoApresentacao());
										$entity->setDsApresentacao($value->getDsApresentacao());
										$entity->setStAtivo('S');
										$entity->setNuOrdem($index);

										$this->getEntityManager()->persist($entity);
										$this->getEntityManager()->flush($entity);
								}
						}
				}
}
