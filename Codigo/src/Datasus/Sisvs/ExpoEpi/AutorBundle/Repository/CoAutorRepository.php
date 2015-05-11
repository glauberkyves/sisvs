<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;

class CoAutorRepository extends BaseRepository
{
		/**
		 * @função updateSituacaoInscricao serve para atualizar a situação da inscrição
		 * @param $dados
		 * @return mixed
		 */
		public function update($entity)
		{
				$entidade = $this->getEntityManager()->createQueryBuilder();
				$query    = $entidade->update($this->getEntityName(), 'c')
						->set('c.stAtivo', '?1')
						->where('c.coSeqCoAutor = ?2')
						->setParameter(1, 'N')
						->setParameter(2, $entity->getCoSeqCoAutor())
						->getQuery();
				return $query->execute();
		}



}
