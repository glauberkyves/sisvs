<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Area
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_HISTORICO_INSCRICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\HistoricoInscricaoRepository")
 */
class HistoricoInscricaoEntity extends AbstractBase
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_HISTORICO_INSCRICAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_HISTINSCR_COSEQHISTINSCR", allocationSize=1, initialValue=1)
     */
    private $coHistoricoInscricao;
    /**
     * @var interger
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", inversedBy="coHistorico")
     * @ORM\JoinColumn(name="CO_INSCRICAO", referencedColumnName="CO_SEQ_INSCRICAO")
     */
    private $coInscricao;
    /**
     * @var interger
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\SituacaoInscricaoEntity", inversedBy="coStatus")
     * @ORM\JoinColumn(name="CO_SITUACAO_INSCRICAO", referencedColumnName="CO_SEQ_SITUACAO_INSCRICAO")
     */
    private $coSituacaoInscricao;
    /**
     * @var datetime
     * @ORM\Column(name="DT_SITUACAO", type="datetime")
     * */

    private $dtSituacao;

    /**
     * @return int
     */
    public function getCoHistoricoInscricao()
    {
        return $this->coHistoricoInscricao;
    }

    /**
     * @param int $coHistoricoInscricao
     */
    public function setCoHistoricoInscricao($coHistoricoInscricao)
    {
        $this->coHistoricoInscricao = $coHistoricoInscricao;
    }

    /**
     * @return \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger
     */
    public function getCoInscricao()
    {
        return $this->coInscricao;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger $coInscricao
     */
    public function setCoInscricao($coInscricao)
    {
        $this->coInscricao = $coInscricao;
    }

    /**
     * @return \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger
     */
    public function getCoSituacaoInscricao()
    {
        return $this->coSituacaoInscricao;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger $coSituacaoInscricao
     */
    public function setCoSituacaoInscricao($coSituacaoInscricao)
    {
        $this->coSituacaoInscricao = $coSituacaoInscricao;
    }

    /**
     * @return \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\datetime
     */
    public function getDtSituacao()
    {
        return $this->dtSituacao;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\datetime $dtStatus
     */
    public function setDtSituacao($dtStatus)
    {
        $this->dtSituacao = $dtStatus;
    }


}
