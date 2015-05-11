<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * InscricaoEntity
 *
 * @ORM\Table(name="DBGERAL.TB_UF")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\UfRepository")
 */
class UfEntity extends AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_UF_IBGE", type="string", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBGERAL.TB_UF_CO_UF_IBGE_seq", allocationSize=1, initialValue=1)
     */
    private $coUfIbge;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_UF", type="string", length=30, nullable=true)
     */
    private $noUf;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ESTADO_SVS", type="integer", nullable=true)
     */
    private $coEstadoSvs;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_ISO_3166_2", type="string", length=5, nullable=true)
     */
    private $coIso31662;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_IBGE_CAPITAL", type="string", length=6, nullable=true)
     */
    private $coMunicipioIbgeCapital;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PAIS", type="integer", nullable=true)
     */
    private $coPais;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\RegiaoEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_REGIAO", referencedColumnName="CO_REGIAO")
     * })
     */
    private $coRegiao;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_UF_INSS", type="string", length=2, nullable=true)
     */
    private $coUfInss;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_UF_LDO", type="string", length=4, nullable=true)
     */
    private $coUfLdo;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_UF_SIAFI", type="string", length=2, nullable=true)
     */
    private $coUfSiafi;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_UF_SINPAS", type="string", length=2, nullable=true)
     */
    private $coUfSinpas;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_NATURALIDADE", type="string", length=50, nullable=true)
     */
    private $dsNaturalidade;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_UF_ACENTUADO", type="string", length=30, nullable=true)
     */
    private $noUfAcentuado;
    /**
     * @var float
     *
     * @ORM\Column(name="NU_AREA", type="decimal", nullable=true)
     */
    private $nuArea;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_LATITUDE", type="string", length=10, nullable=true)
     */
    private $nuLatitude;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_LONGITUDE", type="string", length=10, nullable=true)
     */
    private $nuLongitude;
    /**
     * @var integer
     *
     * @ORM\Column(name="NU_ORDEM_REGIAO", type="integer", nullable=true)
     */
    private $nuOrdemRegiao;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=2, nullable=false)
     */
    private $sgUf;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_CADSUS", type="string", length=1, nullable=true)
     */
    private $stCadsus;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;

    /**
     * Get coUfIbge
     *
     * @return string
     */
    public function getCoUfIbge()
    {
        return $this->coUfIbge;
    }

    /**
     * Get coEstadoSvs
     *
     * @return integer
     */
    public function getCoEstadoSvs()
    {
        return $this->coEstadoSvs;
    }

    /**
     * Set coEstadoSvs
     *
     * @param integer $coEstadoSvs
     * @return Uf
     */
    public function setCoEstadoSvs($coEstadoSvs)
    {
        $this->coEstadoSvs = $coEstadoSvs;

        return $this;
    }

    /**
     * Get coIso31662
     *
     * @return string
     */
    public function getCoIso31662()
    {
        return $this->coIso31662;
    }

    /**
     * Set coIso31662
     *
     * @param string $coIso31662
     * @return Uf
     */
    public function setCoIso31662($coIso31662)
    {
        $this->coIso31662 = $coIso31662;

        return $this;
    }

    /**
     * Get coMunicipioIbgeCapital
     *
     * @return string
     */
    public function getCoMunicipioIbgeCapital()
    {
        return $this->coMunicipioIbgeCapital;
    }

    /**
     * Set coMunicipioIbgeCapital
     *
     * @param string $coMunicipioIbgeCapital
     * @return Uf
     */
    public function setCoMunicipioIbgeCapital($coMunicipioIbgeCapital)
    {
        $this->coMunicipioIbgeCapital = $coMunicipioIbgeCapital;

        return $this;
    }

    /**
     * Get coPais
     *
     * @return integer
     */
    public function getCoPais()
    {
        return $this->coPais;
    }

    /**
     * Set coPais
     *
     * @param integer $coPais
     * @return Uf
     */
    public function setCoPais($coPais)
    {
        $this->coPais = $coPais;

        return $this;
    }

    /**
     * Get coRegiao
     *
     * @return string
     */
    public function getCoRegiao()
    {
        return $this->coRegiao;
    }

    /**
     * Set coRegiao
     *
     * @param string $coRegiao
     * @return Uf
     */
    public function setCoRegiao($coRegiao)
    {
        $this->coRegiao = $coRegiao;

        return $this;
    }

    /**
     * Get coUfInss
     *
     * @return string
     */
    public function getCoUfInss()
    {
        return $this->coUfInss;
    }

    /**
     * Set coUfInss
     *
     * @param string $coUfInss
     * @return Uf
     */
    public function setCoUfInss($coUfInss)
    {
        $this->coUfInss = $coUfInss;

        return $this;
    }

    /**
     * Get coUfLdo
     *
     * @return string
     */
    public function getCoUfLdo()
    {
        return $this->coUfLdo;
    }

    /**
     * Set coUfLdo
     *
     * @param string $coUfLdo
     * @return Uf
     */
    public function setCoUfLdo($coUfLdo)
    {
        $this->coUfLdo = $coUfLdo;

        return $this;
    }

    /**
     * Get coUfSiafi
     *
     * @return string
     */
    public function getCoUfSiafi()
    {
        return $this->coUfSiafi;
    }

    /**
     * Set coUfSiafi
     *
     * @param string $coUfSiafi
     * @return Uf
     */
    public function setCoUfSiafi($coUfSiafi)
    {
        $this->coUfSiafi = $coUfSiafi;

        return $this;
    }

    /**
     * Get coUfSinpas
     *
     * @return string
     */
    public function getCoUfSinpas()
    {
        return $this->coUfSinpas;
    }

    /**
     * Set coUfSinpas
     *
     * @param string $coUfSinpas
     * @return Uf
     */
    public function setCoUfSinpas($coUfSinpas)
    {
        $this->coUfSinpas = $coUfSinpas;

        return $this;
    }

    /**
     * Get dsNaturalidade
     *
     * @return string
     */
    public function getDsNaturalidade()
    {
        return $this->dsNaturalidade;
    }

    /**
     * Set dsNaturalidade
     *
     * @param string $dsNaturalidade
     * @return Uf
     */
    public function setDsNaturalidade($dsNaturalidade)
    {
        $this->dsNaturalidade = $dsNaturalidade;

        return $this;
    }

    /**
     * Get noUf
     *
     * @return string
     */
    public function getNoUf()
    {
        return $this->noUf;
    }

    /**
     * Set noUf
     *
     * @param string $noUf
     * @return Uf
     */
    public function setNoUf($noUf)
    {
        $this->noUf = $noUf;

        return $this;
    }

    /**
     * Get noUfAcentuado
     *
     * @return string
     */
    public function getNoUfAcentuado()
    {
        return $this->noUfAcentuado;
    }

    /**
     * Set noUfAcentuado
     *
     * @param string $noUfAcentuado
     * @return Uf
     */
    public function setNoUfAcentuado($noUfAcentuado)
    {
        $this->noUfAcentuado = $noUfAcentuado;

        return $this;
    }

    /**
     * Get nuArea
     *
     * @return float
     */
    public function getNuArea()
    {
        return $this->nuArea;
    }

    /**
     * Set nuArea
     *
     * @param float $nuArea
     * @return Uf
     */
    public function setNuArea($nuArea)
    {
        $this->nuArea = $nuArea;

        return $this;
    }

    /**
     * Get nuLatitude
     *
     * @return string
     */
    public function getNuLatitude()
    {
        return $this->nuLatitude;
    }

    /**
     * Set nuLatitude
     *
     * @param string $nuLatitude
     * @return Uf
     */
    public function setNuLatitude($nuLatitude)
    {
        $this->nuLatitude = $nuLatitude;

        return $this;
    }

    /**
     * Get nuLongitude
     *
     * @return string
     */
    public function getNuLongitude()
    {
        return $this->nuLongitude;
    }

    /**
     * Set nuLongitude
     *
     * @param string $nuLongitude
     * @return Uf
     */
    public function setNuLongitude($nuLongitude)
    {
        $this->nuLongitude = $nuLongitude;

        return $this;
    }

    /**
     * Get nuOrdemRegiao
     *
     * @return integer
     */
    public function getNuOrdemRegiao()
    {
        return $this->nuOrdemRegiao;
    }

    /**
     * Set nuOrdemRegiao
     *
     * @param integer $nuOrdemRegiao
     * @return Uf
     */
    public function setNuOrdemRegiao($nuOrdemRegiao)
    {
        $this->nuOrdemRegiao = $nuOrdemRegiao;

        return $this;
    }

    /**
     * Get sgUf
     *
     * @return string
     */
    public function getSgUf()
    {
        return $this->sgUf;
    }

    /**
     * Set sgUf
     *
     * @param string $sgUf
     * @return Uf
     */
    public function setSgUf($sgUf)
    {
        $this->sgUf = $sgUf;

        return $this;
    }

    /**
     * Get stCadsus
     *
     * @return string
     */
    public function getStCadsus()
    {
        return $this->stCadsus;
    }

    /**
     * Set stCadsus
     *
     * @param string $stCadsus
     * @return Uf
     */
    public function setStCadsus($stCadsus)
    {
        $this->stCadsus = $stCadsus;

        return $this;
    }

    /**
     * Get stRegistroAtivo
     *
     * @return string
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return Uf
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;

        return $this;
    }
}