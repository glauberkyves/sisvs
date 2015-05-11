<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;

class AnexoRepository extends BaseRepository
{
    public function getAnexoInscricao($inscricao)
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select("a.coSeqAnexo, a.dsArquivo, a.noArquivo")
		        ->from($this->getEntityName(), 'a')
		        ->where('a.stAtivo = :stAtivo')
		        ->setParameter('stAtivo', 'S');

        if ($inscricao) {
            $query->andWhere($query->expr()->in("a.coInscricao", ":coInscricao"))
                ->setParameter('coInscricao', $inscricao);
        }
        return $query->getQuery()->getResult();
    }

		/**
		 * @função updateSituacaoInscricao serve para atualizar a situação da inscrição
		 * @param $dados
		 * @return mixed
		 */
		public function update($value)
		{
				$entidade = $this->getEntityManager()->createQueryBuilder();
				$query    = $entidade->update($this->getEntityName(), 'a')
						->set('a.stAtivo', '?1')
						->where('a.coInscricao = ?2')
						->andWhere('a.coSeqAnexo = ?3')
						->setParameter(1, 'N')
						->setParameter(2, $value->getCoInscricao())
						->setParameter(3, $value->getCoSeqAnexo())
						->getQuery()
				;
//echo $query->getQuery()->getSQL();exit;
				return $query->execute();
		}
}
