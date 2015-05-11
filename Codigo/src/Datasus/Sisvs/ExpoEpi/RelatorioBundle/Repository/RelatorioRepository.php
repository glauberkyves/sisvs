<?php

namespace Datasus\Sisvs\ExpoEpi\RelatorioBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
use Symfony\Component\HttpFoundation\Request;

class RelatorioRepository extends BaseRepository
{

    public function getDQLTotalInscricoesEnviadas()
    {
        $builder = $this->getEntityManager()->createQueryBuilder();

        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('count(DISTINCT ii1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'ii1')
            ->innerJoin('ii1.coHistorico', 'hh1')
            ->innerJoin('hh1.coSituacaoInscricao', 'ss1')
            ->innerJoin('ii1.coTema', 'tt1')
            ->innerJoin('tt1.coArea', 'aa1')
            ->innerJoin('aa1.coModalidade', 'mm1')
            ->innerJoin('mm1.coEvento', 'ee1')
            ->where($builder->expr()->eq('ee1.coSeqEvento', 'e.coSeqEvento'))
            ->andWhere($builder->expr()->neq('ss1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('ii1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

    }


    /**
     * @return Retorna a quantidade de inscrições por modalidade
     */
    public function getTotalPorEvento(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('e1.coSeqEvento', 'e.coSeqEvento'))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT e.coSeqEvento, e.noEvento as title, e.anEvento')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:EventoEntity', 'e')
            ->where('e.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por modalidade
     */
    public function getTotalPorModalidade(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('m1.coSeqModalidade', 'm.coSeqModalidade'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT m.coSeqModalidade, m.noModalidade as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por area
     */
    public function getTotalPorArea(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('a1.coSeqArea', 'a.coSeqArea'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
        ;

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT a.coSeqArea, a.noArea as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:AreaEntity', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->addOrderBy('a.coSeqArea');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        if ($request->get('coModalidade')) {
            $query->andWhere('m.coSeqModalidade = :coSeqModalidade')
                ->setParameter('coSeqModalidade', $request->get('coModalidade'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por tema
     */
    public function getTotalPorTema(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('t1.coSeqTema', 't.coSeqTema'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT t.coSeqTema, t.noTema as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:TemaEntity', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        if ($request->get('coArea')) {
            $query->andWhere('a.coSeqArea = :coSeqArea')
                ->setParameter('coSeqArea', $request->get('coArea'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por instituição
     */

    public function getTotalPorInstituicao(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('ins1.coSeqInstituicao', 'ins.coSeqInstituicao'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE));

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT ins.coSeqInstituicao, ins.noInstituicao as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAutorBundle:InstituicaoEntity', 'ins')
            ->innerJoin('ins.coInscricao', 'i')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por municipio
     */
    public function getTotalPorMunicipio(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('ins1.coMunicipioIbge', 'mu1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('mu1.coMunicipioIbge', 'mu.coMunicipioIbge'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT mu.coMunicipioIbge, mu.noMunicipio as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAutorBundle:InstituicaoEntity', 'ins')
            ->innerJoin('ins.coInscricao', 'i')
            ->innerJoin('ins.coMunicipioIbge', 'mu')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por estado
     */
    public function getTotalPorEstado(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('ins1.coMunicipioIbge', 'mu1')
            ->innerJoin('mu1.coUfIbge', 'es1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('es1.coUfIbge', 'es.coUfIbge'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT es.coUfIbge, es.noUf as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAutorBundle:InstituicaoEntity', 'ins')
            ->innerJoin('ins.coInscricao', 'i')
            ->innerJoin('ins.coMunicipioIbge', 'mu')
            ->innerJoin('mu.coUfIbge', 'es')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }
        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por Região
     */
    public function getTotalPorRegiao(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('ins1.coMunicipioIbge', 'mu1')
            ->innerJoin('mu1.coUfIbge', 'es1')
            ->innerJoin('es1.coRegiao', 'r1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('r1.coRegiao', 'r.coRegiao'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT r.coRegiao, r.noRegiao as title')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAutorBundle:InstituicaoEntity', 'ins')
            ->innerJoin('ins.coInscricao', 'i')
            ->innerJoin('ins.coMunicipioIbge', 'mu')
            ->innerJoin('mu.coUfIbge', 'es')
            ->innerJoin('es.coRegiao', 'r')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por municipio
     */
    public function getTotalPorMunicipioAutor(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao) as total, mu.noMunicipio as title')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coUsuario', 'u1')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity', 'mu', 'WITH', 'mu.coMunicipioIbge = u1.coMunicipioIbge')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e1.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }
        $query->groupBy('mu.noMunicipio');

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por estado
     */
    public function getTotalPorEstadoAutor(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao) as total, uf.noUf as title')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coUsuario', 'u1')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity', 'mu', 'WITH', 'mu.coMunicipioIbge = u1.coMunicipioIbge')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:UfEntity', 'uf', 'WITH', 'mu.coUfIbge = uf.coUfIbge')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->addGroupBy('uf.noUf');

        if ($request->get('coEvento')) {
            $query->andWhere('e1.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por Região
     */
    public function getTotalPorRegiaoAutor(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)  as total, rg.noRegiao as title')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coUsuario', 'u1')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity', 'mu', 'WITH', 'mu.coMunicipioIbge = u1.coMunicipioIbge')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:UfEntity', 'uf', 'WITH', 'mu.coUfIbge = uf.coUfIbge')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:RegiaoEntity', 'rg', 'WITH', 'rg.coRegiao = uf.coRegiao')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->addGroupBy('rg.noRegiao');

        if ($request->get('coEvento')) {
            $query->andWhere('e1.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @return Retorna a quantidade de inscrições por sexo
     */

    public function getTotalPorSexo(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $queryTotal = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('COUNT(DISTINCT i1.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('i1.coHistorico', 'h1')
            ->innerJoin('h1.coSituacaoInscricao', 's1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('t1.coArea', 'a1')
            ->innerJoin('a1.coModalidade', 'm1')
            ->innerJoin('m1.coEvento', 'e1')
            ->where($builder->expr()->eq('ins1.coSeqInstituicao', 'ins.coSeqInstituicao'))
            ->andWhere($builder->expr()->neq('s1.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('m1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i1.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT ins.coSeqInstituicao, ins.noInstituicao as title, u.coSexo')
            ->addSelect("( {$queryTotal->getQuery()->getDQL()}) as total")
            ->from('DatasusSisvsExpoEpiAutorBundle:InstituicaoEntity', 'ins')
            ->innerJoin('ins.coInscricao', 'i')
            ->innerJoin('i.coUsuario', 'u')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('a.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        $result = array(
            0 => array(
                'title' => 'Masculino',
                'total' => 0
            ),
            1 => array(
                'title' => 'Feminino',
                'total' => 0
            )
        );

        foreach ($query->getQuery()->getArrayResult() as $value) {

            switch (strtolower($value['coSexo'])) {
                case 'm':
                    $result[0]['total'] += $value['total'];
                    break;

                case 'f':
                    $result[1]['total'] += $value['total'];
                    break;
            }
        }

        return $result;
    }

    /**
     * @return Retorna a quantidade de inscrições por situação da inscrição
     */

    public function getTotalSituacaoInscricao(Request $request)
    {
        $situacaoPendente = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
        $params = array();
        parse_str($request->query->get('data'), $params);

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('st.coSituacao, st.dsSituacao as title, COUNT(i.coSeqInscricao) as total')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i')
            ->innerJoin('i.coSituacaoInscricao', 'st')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where('e.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->groupBy('st.coSituacao, st.dsSituacao');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array Retorna a quantidade de inscrições por situação da inscrição
     */

    public function getTotalTipoInstituicao(Request $request)
    {
        $situacaoPendente = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;

        $params = array();
        parse_str($request->query->get('data'), $params);


        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('ti.noInstituicao as title, COUNT(i.coSeqInscricao) as total')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i')
            ->innerJoin('i.coSituacaoInscricao', 'st')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->leftJoin('i.coInstituicao', 'ins')
            ->leftJoin('ins.coTipoInstituicao', 'ti')
            ->where('e.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('m.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->andWhere('i.coSituacaoInscricao <> :coSituacaoInscricao')
            ->setParameter('coSituacaoInscricao', $situacaoPendente)
            ->andWhere('i.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->groupBy('ti.noInstituicao');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :coSeqEvento')
                ->setParameter('coSeqEvento', $request->get('coEvento'));
        }

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    /***
     * @param Request $request
     *
     * @return array
     *  Retorna o total de possiveis duplicatas
     */
    public function getTotalDeDuplicatas(Request $request)
    {
        $situacaoPendente = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
        $situacaoBloqueado = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
        $situacaoModalidade = 'N';
        $qrBuilder = $this->getEntityManager()->createQueryBuilder();

        $dqlDuplicidade = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('MIN(i1.coSeqInscricao)')
            ->from($this->getEntityName(), 'i1')
            ->innerJoin('i1.coUsuario', 'u1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->where('(TRIM(i1.dsTitulo) = TRIM(i.dsTitulo)) OR (SUBSTRING(TO_CHAR(i1.dsResumo), 0, 120) = SUBSTRING(TO_CHAR(i.dsResumo), 0, 120))')
            ->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoPendente))
            ->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoBloqueado))
            ->andWhere($qrBuilder->expr()->eq('u1.coSeqUsuario', 'u.coSeqUsuario'))
            ->andWhere($qrBuilder->expr()->eq('t1.coSeqTema', 't.coSeqTema'))
            ->andWhere($qrBuilder->expr()->neq('i1.coSeqInscricao', 'i.coSeqInscricao'))
            ->getQuery()
            ->getDQL();

        $dqlDtSituacao = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('MIN(h2.dtSituacao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:HistoricoInscricaoEntity', 'h2')
            ->where($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoPendente))
            ->where($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoBloqueado))
            ->andWhere($qrBuilder->expr()->eq('h2.coInscricao', 'i.coSeqInscricao'))
            ->andWhere($qrBuilder->expr()->isNotNull('h2.dtSituacao'))
            ->getQuery()
            ->getDQL();

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('i.nuInscricao, i.coSeqInscricao, e.coSeqEvento, m.coSeqModalidade, a.coSeqArea, '
                . 't.coSeqTema,  i.dsTitulo, u.noUsuario,'
                . ' a.noArea, t.noTema, e.noEvento')
            ->from($this->getEntityName(), 'i')
            ->addSelect('(' . $dqlDtSituacao . ') as dtSituacao')
            ->innerJoin('i.coUsuario', 'u')
            ->innerJoin('i.coSituacaoInscricao', 's')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoPendente))
            ->andWhere($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoBloqueado))
            ->andWhere("($dqlDuplicidade) <> 0")
            ->andWhere("({$this->getCountDuplicidade($request)}) > 1 ")
            ->andWhere('m.stAtivo <> :stAtivo')
            ->setParameter('stAtivo', $situacaoModalidade)
            ->andWhere('i.stAtivo <> :stAtivo')
            ->setParameter('stAtivo', 'N');

        if ($request->get('coEvento')) {
            $query->andWhere('e.coSeqEvento = :evento')
                ->setParameter('evento', $request->get('coEvento'));
        }
        $result = $query->getQuery()->getArrayResult();

        if ($result) {
            $result[0]['title'] = 'Quantidade de Possíveis Inscrições Duplicadas';
            $result[0]['total'] = count($result);
        }

        return $result;
    }

    public function getDataRelatorioInscricao(Request $request)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params = array();
        parse_str($request->query->get('data'), $params);

        $columns = array(
            'DISTINCT e.coSeqEvento', 'e.noEvento', 'e.anEvento',
            'm.coSeqModalidade', 'm.noModalidade'
        );

        foreach ($params as $key => $value) {

            if ($value != '') {
                switch ($key) {
                    case 'coSeqArea':
                        $columns[] = 'a.coSeqArea';
                        $columns[] = 'a.noArea';
                        break;
                    case 'coSeqTema':
                        $columns[] = 't.coSeqTema';
                        $columns[] = 't.noTema';
                        break;
                    case 'coRegiao':
                        $columns[] = 'r.coRegiao';
                        $columns[] = 'r.noRegiao';
                        break;
                    case 'coUfIbge':
                        $columns[] = 'es.coUfIbge';
                        $columns[] = 'es.noUf';
                        break;
                    case 'coMunicipioIbge':
                        $columns[] = 'mu.coMunicipioIbge';
                        $columns[] = 'mu.noMunicipio';
                        break;

                    case 'coRegiaoAutor':
                        $columns[] = 'reu.coRegiao';
                        $columns[] = 'reu.noRegiao';
                        break;
                    case 'coUfIbgeAutor':
                        $columns[] = 'ufu.coUfIbge';
                        $columns[] = 'ufu.noUf';
                        break;
                    case 'coMunicipioIbgeAutor':
                        $columns[] = 'um.coMunicipioIbge';
                        $columns[] = 'um.noMunicipio';
                        break;

                    case 'coSexo':
                        $columns[] = 'u.coSexo';
                        break;
                    case 'coSituacao':
                        $columns[] = 's.coSituacao';
                        $columns[] = 's.dsSituacao';
                        break;
                    case 'coSeqInstituicao':
                        $columns[] = 'tpi.coSeqInstituicao as coSeqTipoInstituicao';
                        $columns[] = 'tpi.noInstituicao as noTipoInstituicao';
                        break;
                    case 'inInstituicao';
                        $columns[] = 'ins.noInstituicao';
                        break;
                }
            }
        }

        $query = $builder
            ->select($columns)
            ->addSelect('(' . $this->getQueryQuantidade($params) . ') quantidade')
            ->addSelect('(' . $this->getDQLTotalInscricoesEnviadas() . ') total')
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:EventoEntity', 'e')
            ->innerJoin('e.coModalidade', 'm')
            ->innerJoin('m.coArea', 'a')
            ->innerJoin('a.coTema', 't')
            ->innerJoin('t.coInscricao', 'i')
            ->innerJoin('i.coSituacaoInscricao', 's')
            ->innerJoin('i.coInstituicao', 'ins')
            ->innerJoin('ins.coTipoInstituicao', 'tpi')
            ->innerJoin('ins.coMunicipioIbge', 'mu')
            ->innerJoin('mu.coUfIbge', 'es')
            ->innerJoin('es.coRegiao', 'r')
            ->innerJoin('i.coUsuario', 'u')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity', 'um', 'WITH', 'u.coMunicipioIbge = um.coMunicipioIbge')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:UfEntity', 'ufu', 'WITH', 'ufu.coUfIbge = um.coUfIbge')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:RegiaoEntity', 'reu', 'WITH', 'reu.coRegiao = ufu.coRegiao')
            ->andWhere('i.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S')
            ->addGroupBy('e.coSeqEvento, m.coSeqModalidade, e.noEvento, e.anEvento, m.noModalidade')
            ->orderBy('m.noModalidade', 'ASC');

        foreach ($params as $key => $value) {
            if ($value != '') {
                switch ($key) {
                    case 'coSeqEvento':
                        $query->andWhere($builder->expr()->eq("e.{$key}", $value));
                        break;
                    case 'coSeqModalidade':
                        $query->andWhere($builder->expr()->eq("m.{$key}", $value));
                        break;
                    case 'inInstituicao':
                        $query->addGroupBy('ins.coSeqInstituicao, ins.noInstituicao');
                        break;
                    case 'coSeqArea':
                        $query->andWhere($builder->expr()->eq("a.{$key}", $value))
                            ->addGroupBy('a.coSeqArea, a.noArea');
                        break;
                    case 'coSeqTema':
                        $query->andWhere($builder->expr()->eq("t.{$key}", $value))
                            ->addGroupBy('t.coSeqTema, t.noTema');
                        break;
                    case 'coRegiao':
                        $query->andWhere($builder->expr()->eq("r.{$key}", $value))
                            ->addGroupBy('r.coRegiao, r.noRegiao');
                        break;
                    case 'coUfIbge':
                        $query->andWhere($builder->expr()->eq("es.{$key}", "'{$value}'"))
                            ->addGroupBy('es.coUfIbge, es.noUf');
                        break;
                    case 'coMunicipioIbge':
                        $query->andWhere($builder->expr()->eq("mu.{$key}", $value))
                            ->addGroupBy('mu.coMunicipioIbge, mu.noMunicipio');
                        break;
                    case 'coRegiaoAutor':
                        $query->andWhere($builder->expr()->eq("reu.coRegiao", $value))
                            ->addGroupBy('reu.coRegiao, reu.noRegiao');
                        break;
                    case 'coUfIbgeAutor':
                        $query->andWhere($builder->expr()->eq("ufu.coUfIbge", "'{$value}'"))
                            ->addGroupBy('ufu.coUfIbge, ufu.noUf');
                        break;
                    case 'coMunicipioIbgeAutor':
                        $query->andWhere($builder->expr()->eq("um.coMunicipioIbge", $value))
                            ->addGroupBy('um.coMunicipioIbge, um.noMunicipio');
                        break;
                    case 'coSexo':
                        $query->andWhere($builder->expr()->eq("u.{$key}", "'{$value}'"))
                            ->addGroupBy('u.coSexo');
                        break;
                    case 'coSituacao':
                        $query->andWhere($builder->expr()->eq("s.{$key}", $value))
                            ->addGroupBy('s.coSituacao, s.dsSituacao');
                        break;
                    case 'coSeqInstituicao':
                        $query->andWhere($builder->expr()->eq("tpi.{$key}", $value))
                            ->addGroupBy('tpi.coSeqInstituicao, tpi.noInstituicao');
                        break;
                }
            }
        }

        $arrDupicata = $this->getQueryTotalDuplicata($request);
        $result = array();

        foreach ($query->getQuery()->getArrayResult() as $key => $value) {
            $result[$key] = $value;
            $result[$key]['duplicata'] = 0;

            foreach ($arrDupicata as $duplicata) {
                if ($duplicata['coSeqEvento'] == $value['coSeqEvento']) {

                    $result[$key]['duplicata'] += 1;
                }
            }
        }
        return $result;
    }

    /**
     *
     * Subquery
     *
     * @param $builder
     * @param $request
     *
     * @return string
     */
    public function getQueryQuantidade(array $params)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();

        $queryQuantidade = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('count(DISTINCT ii.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'ii')
            ->innerJoin('ii.coHistorico', 'hh')
            ->innerJoin('hh.coSituacaoInscricao', 'ss')
            ->innerJoin('ii.coTema', 'tt')
            ->innerJoin('tt.coArea', 'aa')
            ->innerJoin('aa.coModalidade', 'mm')
            ->innerJoin('mm.coEvento', 'ee')
            ->innerJoin('ii.coInstituicao', 'inss')
            ->innerJoin('ii.coUsuario', 'uu')
            ->innerJoin('inss.coTipoInstituicao', 'tpii')
            ->leftJoin('inss.coMunicipioIbge', 'muu')
            ->leftJoin('muu.coUfIbge', 'ess')
            ->leftJoin('ess.coRegiao', 'rr')
            ->leftJoin('DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity', 'mua', 'WITH', 'uu.coMunicipioIbge = mua.coMunicipioIbge')
            ->leftJoin('mua.coUfIbge', 'esa')
            ->leftJoin('esa.coRegiao', 'rra')
            ->where($builder->expr()->eq('mm.coSeqModalidade', 'm.coSeqModalidade'))
            ->andWhere($builder->expr()->neq('ss.coSituacao', SituacaoInscricaoService::ST_SITUACAO_PENDENTE))
            ->andWhere('ii.stAtivo = :stAtivo')
            ->setParameter('stAtivo', 'S');

        foreach ($params as $key => $value) {
            if ($value != '') {
                switch ($key) {
                    case 'coSeqArea':
                        $queryQuantidade->andWhere($builder->expr()->eq("aa.{$key}", $value));
                        break;
                    case 'coSeqTema':
                        $queryQuantidade->andWhere($builder->expr()->eq("tt.{$key}", $value));
                        break;
                    case 'coRegiao':
                        $queryQuantidade->andWhere($builder->expr()->eq("rr.{$key}", $value));
                        break;
                    case 'coUfIbge':
                        $queryQuantidade->andWhere($builder->expr()->eq("ess.{$key}", "'{$value}'"));
                        break;
                    case 'coMunicipioIbge':
                        $queryQuantidade->andWhere($builder->expr()->eq("muu.{$key}", $value));
                        break;
                    case 'coSexo':
                        $queryQuantidade->andWhere($builder->expr()->eq("uu.{$key}", "'{$value}'"));
                        break;
                    case 'coSituacao':
                        $queryQuantidade->andWhere($builder->expr()->eq("ss.{$key}", $value));
                        break;
                    case 'coSeqInstituicao':
                        $queryQuantidade->andWhere($builder->expr()->eq("tpii.{$key}", $value));
                        break;
                    case 'coMunicipioIbgeAutor':
                        $queryQuantidade->andWhere($builder->expr()->eq("uu.coMunicipioIbge", $value));
                        break;
                    case 'inInstituicao':
                        $queryQuantidade->andWhere($builder->expr()->like('inss.noInstituicao', 'ins.noInstituicao'));
                        break;
                }
            }
        }

        return $queryQuantidade->getQuery()->getDQL();
    }

    /**
     *
     * Subquery
     *
     * @param $builder
     * @param $request
     *
     * @return string
     */
    public function getQueryTotal($builder, $request)
    {
        $queryQuantidade = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('DISTINCT COUNT(iii.coSeqInscricao)')
            ->from('DatasusSisvsExpoEpiAdministrativoBundle:EventoEntity', 'eee')
            ->innerJoin('eee.coModalidade', 'mmm')
            ->innerJoin('mmm.coArea', 'aaa')
            ->innerJoin('aaa.coTema', 'ttt')
            ->innerJoin('ttt.coInscricao', 'iii')
            ->where($builder->expr()->eq('eee.coSeqEvento', 'e.coSeqEvento'))
            ->where($builder->expr()->eq('mmm.coSeqModalidade', 'm.coSeqModalidade'))
            ->where($builder->expr()->eq('aaa.coSeqArea', 'a.coSeqArea'))
            ->where($builder->expr()->eq('ttt.coSeqTema', 't.coSeqTema'));

        $params = array();
        parse_str($request->query->get('data'), $params);

        foreach ($params as $key => $value) {
            if ($value != '') {
                switch ($key) {
                    case 'coSeqEvento':
                        $queryQuantidade->andWhere($builder->expr()->eq("eee.{$key}", $value));
                        break;
                    case 'coSeqModalidade':
                        $queryQuantidade->andWhere($builder->expr()->eq("mmm.{$key}", $value));
                        break;
                }
            }
        }

        return $queryQuantidade->getQuery()->getDQL();
    }

    /**
     *
     * Subquery
     *
     * @param $builder
     * @param $request
     *
     * @return string
     */
    public function getQueryTotalDuplicata(Request $request)
    {
        $params = array();
        $search = array(
            'coSeqEvento',
            'coSeqModalidade',
            'coSeqArea',
            'coSeqTema',
        );
        $replace = array(
            'coEvento',
            'coModalidade',
            'coArea',
            'coTema',
        );

        parse_str(str_replace($search, $replace, $request->query->get('data')), $params);

        return $this->getCheckDuplicity($request);
    }

    /***
     * @param Request $request
     *
     * @return array
     *  Retorna a lista de possiveis duplicatas
     */

    public function getCheckDuplicity(Request $request)
    {
        $situacaoPendente = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
        $situacaoBloqueado = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
        $situacaoModalidade = 'N';
        $qrBuilder = $this->getEntityManager()->createQueryBuilder();

        $dqlDuplicidade = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('MIN(i1.coSeqInscricao)')
            ->from($this->getEntityName(), 'i1')
            ->innerJoin('i1.coUsuario', 'u1')
            ->innerJoin('i1.coInstituicao', 'ins1')
            ->innerJoin('i1.coTema', 't1')
            ->innerJoin('i1.coSituacaoInscricao', 's1')
            ->where('(TRIM(i1.dsTitulo) = TRIM(i.dsTitulo)) OR (SUBSTRING(TO_CHAR(i1.dsResumo), 0, 120) = SUBSTRING(TO_CHAR(i.dsResumo), 0, 120))')
            ->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoPendente))
            ->andWhere($qrBuilder->expr()->neq('s1.coSituacao', $situacaoBloqueado))
            ->andWhere($qrBuilder->expr()->eq('u1.coSeqUsuario', 'u.coSeqUsuario'))
            ->andWhere($qrBuilder->expr()->eq('t1.coSeqTema', 't.coSeqTema'))
            ->andWhere($qrBuilder->expr()->eq('ins1.noInstituicao', 'it.noInstituicao'))
            ->andWhere($qrBuilder->expr()->neq('i1.coSeqInscricao', 'i.coSeqInscricao'))
            ->getQuery()
            ->getDQL();

        $dqlDtSituacao = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('MIN(h2.dtSituacao)')
            ->from('DatasusSisvsExpoEpiAutorBundle:HistoricoInscricaoEntity', 'h2')
            ->where($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoPendente))
            ->andWhere($qrBuilder->expr()->neq('h2.coSituacaoInscricao', $situacaoBloqueado))
            ->andWhere($qrBuilder->expr()->eq('h2.coInscricao', 'i.coSeqInscricao'))
            ->andWhere($qrBuilder->expr()->isNotNull('h2.dtSituacao'))
            ->getQuery()
            ->getDQL();

        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('i.nuInscricao, i.coSeqInscricao, e.coSeqEvento, m.coSeqModalidade, a.coSeqArea, '
                . 't.coSeqTema, it.coSeqInstituicao, i.dsTitulo, u.noUsuario, it.coSeqInstituicao, '
                . 'it.noInstituicao, a.noArea, t.noTema, e.noEvento')
            ->from($this->getEntityName(), 'i')
            ->addSelect('(' . $dqlDtSituacao . ') as dtSituacao')
            ->innerJoin('i.coUsuario', 'u')
            ->innerJoin('i.coSituacaoInscricao', 's')
            ->innerJoin('i.coInstituicao', 'it')
            ->innerJoin('i.coTema', 't')
            ->innerJoin('t.coArea', 'a')
            ->innerJoin('a.coModalidade', 'm')
            ->innerJoin('m.coEvento', 'e')
            ->where($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoPendente))
            ->andWhere($qrBuilder->expr()->neq('i.coSituacaoInscricao', $situacaoBloqueado))
            ->andWhere("($dqlDuplicidade) <> 0")
            ->andWhere("({$this->getCountDuplicidade($request)}) > 1 ")
            ->andWhere('m.stAtivo <> :stAtivo')
            ->setParameter('stAtivo', $situacaoModalidade);

		    $params = array();
        parse_str($request->query->get('data'), $params);

        if (isset($params['coEvento']) && $params['coEvento']) {
            $query->andWhere('e.coSeqEvento = :evento')
                ->setParameter('evento', $params['coEvento']);
        }

        if (isset($params['coModalidade']) && $params['coModalidade']) {
            $query->andWhere('m.coSeqModalidade = :coModalidade')
                ->setParameter('coModalidade', $params['coModalidade']);
        }

        if (isset($params['coArea']) && $params['coArea']) {
            $query->andWhere('a.coSeqArea = :coArea')
                ->setParameter('coArea', $params['coArea']);
        }

        if (isset($params['coTema']) && $params['coTema']) {
            $query->andWhere('t.coSeqTema = :coTema')
                ->setParameter('coTema', $params['coTema']);
        }
        return $query->getQuery()->getResult();
    }
		public function getCountDuplicidade(Request $request)
		{
				$situacaoPendente  = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
				$situacaoBloqueado = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
				$situacaoInscricao = 'N';

				$qrBuilder = $this->getEntityManager()->createQueryBuilder();

				$dqlDuplicidade = $this
						->getEntityManager()
						->createQueryBuilder()
						->select('MIN(ii1.coSeqInscricao)')
						->from($this->getEntityName(), 'ii1')
						->innerJoin('ii1.coUsuario', 'uu1')
						->innerJoin('ii1.coInstituicao', 'inss1')
						->innerJoin('ii1.coTema', 'tt1')
						->innerJoin('ii1.coSituacaoInscricao', 'ss1')
						->where('(TRIM(ii1.dsTitulo) = TRIM(ii.dsTitulo)) OR (SUBSTRING(TO_CHAR(ii1.dsResumo), 0, 120) = SUBSTRING(TO_CHAR(ii.dsResumo), 0, 120))')
						->andWhere($qrBuilder->expr()->neq('ss1.coSituacao', $situacaoPendente))
						->andWhere($qrBuilder->expr()->neq('ss1.coSituacao', $situacaoBloqueado))
						->andWhere($qrBuilder->expr()->eq('uu1.coSeqUsuario', 'uu.coSeqUsuario'))
						->andWhere($qrBuilder->expr()->eq('tt1.coSeqTema', 'tt.coSeqTema'))
						->andWhere($qrBuilder->expr()->neq('ii1.coSeqInscricao', 'ii.coSeqInscricao'))
						->getQuery()
						->getDQL();

				$query = $this
						->getEntityManager()
						->createQueryBuilder()
						->select('COUNT(ii.coSeqInscricao)')
						->from($this->getEntityName(), 'ii')
						->innerJoin('ii.coUsuario', 'uu')
						->innerJoin('ii.coSituacaoInscricao', 'ss')
						->innerJoin('ii.coInstituicao', 'itt')
						->innerJoin('ii.coTema', 'tt')
						->innerJoin('tt.coArea', 'aa')
						->innerJoin('aa.coModalidade', 'mm')
						->innerJoin('mm.coEvento', 'ee')
						->where($qrBuilder->expr()->neq('ii.coSituacaoInscricao', $situacaoPendente))
						->andWhere($qrBuilder->expr()->neq('ii.coSituacaoInscricao', $situacaoBloqueado))
						->andWhere("($dqlDuplicidade) <> 0");

				$params = array();
				parse_str($request->query->get('data'), $params);

				if (isset($params['coEvento']) && $params['coEvento']) {
						$query->andWhere('ee.coSeqEvento = :evento')
								->setParameter('evento', $params['coEvento']);
				}

				if (isset($params['coModalidade']) && $params['coModalidade']) {
						$query->andWhere('mm.coSeqModalidade = :coModalidade')
								->setParameter('coModalidade', $params['coModalidade']);
				}

				if (isset($params['coArea']) && $params['coArea']) {
						$query->andWhere('aa.coSeqArea = :coArea')
								->setParameter('coArea', $params['coArea']);
				}

				if (isset($params['coTema']) && $params['coTema']) {
						$query->andWhere('tt.coSeqTema = :coTema')
								->setParameter('coTema', $params['coTema']);
				}

				return $query->getQuery()->getDQL();
		}
}
