<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Symfony\Component\HttpFoundation\Request;

class InstituicaoRepository extends BaseRepository
{
    public function listaInstituicoes(Request $request)
    {
        $params = array();
        parse_str($request->query->get('data'), $params);

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('e.coSeqInstituicao, e.noInstituicao, e.stAtivo')
            ->from($this->getEntityName(), 'e')
            ->addOrderBy('e.coSeqInstituicao');

        if ($params['stAtivo'] == '' and $params['noInstituicao'] == '') {
            $query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
                ->setParameter('stAtivo', 'S');
        }
        if ($params['stAtivo'] != null) {
            $query->andWhere($query->expr()->eq("e.stAtivo", ":stAtivo"))
                ->setParameter('stAtivo', $params['stAtivo']);
        }

        if (isset($params['noInstituicao']) and $params['noInstituicao']) {
            $query->andWhere($query->expr()->like("UPPER(e.noInstituicao)", "UPPER(:noInstituicao)"))
                ->setParameter('noInstituicao', '%' . $params['noInstituicao'] . '%');
        }
        $this->addOrderBy($query, $request);
        return $query
            ->getQuery()
            ->getArrayResult();
    }
}
