<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_TEMA")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\TemaRepository")
 */
class TemaEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_TEMA", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_TEMA_COSEQTEMA", allocationSize=1, initialValue=1)
     * @ORM\OrderBy({"nuTema" = "asc"})
     */
    private $coSeqTema;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\AreaEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_AREA", referencedColumnName="CO_SEQ_AREA")
     * })
     */
    private $coArea;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TipoClassificacaoEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_TIPO_CLASSIFICACAO", referencedColumnName="CO_TIPO_CLASSIFICACAO")
     * })
     */
    private $coTipoClassificacao;
    /**
     * @var string
     * @Assert\Length(
     *  max = 300,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @Assert\NotBlank(message="administrativo.validations.tema.notBlankTema")
     * @ORM\Column(name="NO_TEMA", type="text", nullable=true, length=300)
     */
    private $noTema;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_TEMA", type="text", nullable=true, length=500)
     */
    private $dsTema;
    /**
     * @var string
     * @ORM\Column(name="NU_TEMA", type="string", nullable=true, length=500)
     */
    private $nuTema;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_ATIVO", type="string", length=1)
     */
    private $stAtivo;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", mappedBy="coTema")
     */
    private $coInscricao;

    public function getCoSeqTema()
    {
        return $this->coSeqTema;
    }

    public function setCoSeqTema($coSeqTema)
    {
        $this->coSeqTema = $coSeqTema;
    }

    public function getNoTema()
    {
        return $this->noTema;
    }

    public function setNoTema($noTema)
    {
        $this->noTema = $noTema;
    }

    public function getDsTema()
    {
        return $this->dsTema;
    }

    public function setDsTema($dsTema)
    {
        $this->dsTema = $dsTema;
    }

    /**
     * @return int
     */
    public function getCoArea()
    {
        return $this->coArea;
    }

    /**
     * @param int $coArea
     */
    public function setCoArea($coArea)
    {
        $this->coArea = $coArea;
    }

    /**
     * @return int
     */
    public function getCoTipoClassificacao()
    {
        return $this->coTipoClassificacao;
    }

    /**
     * @param int $coTipoClassificacao
     */
    public function setCoTipoClassificacao($coTipoClassificacao)
    {
        $this->coTipoClassificacao = $coTipoClassificacao;
    }

    /**
     * @return string
     */
    public function getNuTema($alfa = false)
    {
        $alfabeto = array(
            "a", "b", "c", "d", "e", "f", "g",
            "h", "i", "j", "k", "l", "m", "n",
            "o", "p", "q", "r", "s", "t", "u",
            "v", "w", "x", "y", "z"
        );

        if ($alfa) {
            return $alfabeto[$this->nuTema - 1];
        }

        return $this->nuTema;
    }

    /**
     * @param string $nuTema
     */
    public function setNuTema($nuTema)
    {
        $this->nuTema = $nuTema;
    }

    /**
     * @return string
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * @param string $stAtivo
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
    }

    public function __toString()
    {
        return $this->noTema;
    }

    /**
     * @return
     */
    public function getCoInscricao()
    {
        return $this->coInscricao;
    }

    /**
     * @param $coInscricao
     */
    public function setCoInscricao($coInscricao)
    {
        $this->coInscricao = $coInscricao;
    }

}
