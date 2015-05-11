<?php
namespace Datasus\Core\BaseBundle\EntityRepository;

class Especialidade extends AbstractBase
{
	public function getEspecialidadesMedicas()
	{	
		$qbd = $this->createQueryBuilder('e');
		$qbd->join('Datasus\Core\BaseBundle\Entity\OrgaoClasse', 'o')
			->where   ('e.stRegistroAtivo = \'S\'')
			->andWhere($qbd->expr()->in('o.coOrgaoClasse', array(8, 22)))
			->orderBy ('e.dsEspecialidade','ASC');
		$query = $qbd->getQuery();
		return $query->getResult();
	}
}
