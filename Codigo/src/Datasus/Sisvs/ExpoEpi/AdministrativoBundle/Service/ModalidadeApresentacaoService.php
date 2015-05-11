<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class ModalidadeApresentacaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeApresentacaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\ModalidadeApresentacaoEntityType';

    public function saveApresentacaoModalidade(array $params)
    {
        $srvApresentacao  = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.apresentacao');
        $srvModalidade    = $this->getContainer()->get('datasus_sisvs_expoepi_administrativo.modalidade');
        $entityModalidade = $srvModalidade->find($params['coSeqModalidade']);

        if (!isset($params['checkApresentacao'])) {
            $this->registerError('administrativo.validations.default.MoreThanOne');
            $this->triggerErrors();
        }

        foreach ($params['checkApresentacao'] as $value) {
            $enApresentacao = $srvApresentacao->find($value);
            $entity         = $this->getEntity();

            $entity->setCoModalidade($entityModalidade);
            $entity->setCoApresentacao($enApresentacao);

            $this->save($entity);
        }
    }


			public function saveModalidadeAvaliacao(array $params)
			{
					$contador = 0;
					foreach ($params['coApresentacao'] as $value) {
							$contador++;
							$valores['coApresentacao'][] = $value;
							$valores['nuOrdem'][]        = $contador;
					}

					for ($i = 0; $i < count($valores['coApresentacao']); $i++) {
							$coModalidade   = $params['coModalidade'];
							$coApresentacao = $valores['coApresentacao'][$i];
							$nuOrdem        = $valores['nuOrdem'][$i];
							$this->getRepository()->updateModalidadeApresentacao($coModalidade, $coApresentacao, $nuOrdem);
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
