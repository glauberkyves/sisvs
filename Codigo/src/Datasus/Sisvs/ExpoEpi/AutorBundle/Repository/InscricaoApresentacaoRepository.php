<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;

class InscricaoApresentacaoRepository extends BaseRepository
{

		/**
		 * @função updateSituacaoInscricao serve para atualizar a situação da inscrição
		 * @param $dados
		 * @return mixed
		 */
		public function update($value)
		{
				$entidade = $this->getEntityManager()->createQueryBuilder();
				$query    = $entidade->update($this->getEntityName(), 'ia')
						->set('ia.stAtivo', '?1')
						->set('ia.dsApresentacao', '?2')
						->where('ia.coInscricao = ?3')
						->andWhere('ia.coApresentacao = ?4')
						->setParameter(1, 'S')
						->setParameter(2, $value->getDsApresentacao())
						->setParameter(3, $value->getCoInscricao()->getCoSeqInscricao())
						->setParameter(4, $value->getCoApresentacao()->getCoSeqApresentacao())
						->getQuery()
				;

				return $query->execute();
		}
}


