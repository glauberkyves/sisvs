<?php
namespace Datasus\Core\BaseBundle\EntityRepository;

class OrgaoClasse extends AbstractBase
{

    public function getListOrgaoClasse()
    {
        $qbd = $this->createQueryBuilder('o')
            ->where('o.stRegistroAtivo = \'S\'')
            ->orderBy('o.noOrgaoClasse', 'ASC');
        $query = $qbd->getQuery();
        return $query->getResult();
    }
}
