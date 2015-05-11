<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Symfony\Component\HttpFoundation\Request;

class ApresentacaoRepository extends BaseRepository
{
    public function listaApresentacao(Request $request)
    {
        $params = array();
        parse_str($request->query->get('data'), $params);

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from($this->getEntityName(), 'e')
            ->addOrderBy('e.coSeqApresentacao');

        if ($params['stAtivo'] == '' and $params['noApresentacao'] == '') {
            $query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
                ->setParameter('stAtivo', 'S');
        }
        if ($params['stAtivo'] != null) {
            $query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
                ->setParameter('stAtivo', $params['stAtivo']);
        }

        if (isset($params['noApresentacao']) and $params['noApresentacao']) {
            $query->andWhere($query->expr()->like("UPPER(e.noApresentacao)", "UPPER(:noApresentacao)"))
                ->setParameter('noApresentacao', '%' . $params['noApresentacao'] . '%');
        }
        $this->addOrderBy($query, $request);
        return $query
            ->getQuery()
            ->getArrayResult();
    }
}
