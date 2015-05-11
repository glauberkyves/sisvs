<?php

		namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

		use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
		use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;

		class AnexoService extends CrudService
		{

				protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\AnexoEntity';
				protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\AnexoEntityType';

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
				 * @param array $arrAnexo
				 */
				public function saveAnexo(InscricaoEntity $enInscricao, $arrAnexo)
				{
						if ($enInscricao->getCoSeqInscricao()) {
								$this->getEntityManager()->getUnitOfWork()->clear();

								$arrAnexoSave = array();
								foreach ($this->getRequest()->get('anexo', array()) as $anexo) {

										if (!in_array($anexo['Arquivo'], $arrAnexoSave)) {
												$arrAnexoSave[] = $anexo['Arquivo'];
										}
								}
								foreach ($this->findByCoInscricao($enInscricao->getCoSeqInscricao()) as $value) {
										if (!in_array($value->getNoArquivo(), $arrAnexoSave)) {
												$this->getRepository()->update($value);
												/**
												 * @todo//
												 */
//												$this->getEntityManager()->remove($value);
										}
								}

								$this->getEntityManager()->flush();

								$srvInscricao = 'datasus_sisvs_expoepi_autor.inscricao';
								$enInscricao  = $this->getService($srvInscricao)->find($enInscricao->getCoSeqInscricao());
						}

						foreach ($arrAnexo as $key => $value) {
								if ($value && $value->getDsArquivo()) {
										$entity = $this->getEntity();

										$tmp_dir  = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
										$filename = $value->getDsArquivo()->getFilename();
										$path     = $tmp_dir . '/' . $filename;

										$stream = fopen($path, 'rb');
										$entity->setDsArquivo(stream_get_contents($stream));

										$entity->setNoArquivo($value->getDsArquivo()->getClientOriginalName());
										$entity->setCoInscricao($enInscricao);
										$entity->setStAtivo('S');

										$this->getEntityManager()->persist($entity);
										$this->getEntityManager()->flush($entity);
								}
						}
				}
		}
