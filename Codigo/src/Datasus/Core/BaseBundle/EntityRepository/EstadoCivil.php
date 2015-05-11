<?php
namespace Datasus\Core\BaseBundle\EntityRepository;

class EstadoCivil extends AbstractBase
{

    public function getListEstadoCivil()
    {
        $qbd = $this->createQueryBuilder('e');

        $qbd->where('e.stRegistroAtivo = \'S\'')
            ->andWhere($qbd->expr()
            ->in('e.coEstadoCivil', array(
            '01',
            '02',
            '03',
            '05'
        )))
            ->orderBy('e.dsEstadoCivil', 'ASC');
        $query = $qbd->getQuery();
        return $query->getResult();
    }
}
