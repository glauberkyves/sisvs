<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="DBGERAL.TB_MUNICIPIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\MunicipioRepository")
 */
class MunicipioEntity extends AbstractBase
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="CO_MUNICIPIO_IBGE", type="string", length=6, nullable=false)
     */
    private $coMunicipioIbge;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_MUNICIPIO", type="string", length=60, nullable=false)
     */
    private $noMunicipio;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_REGIONAL_SAUDE", type="string", length=4, nullable=true)
     */
    private $coRegionalSaude;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=2, nullable=true)
     */
    private $sgUf;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MACRORREGIONAL", type="string", length=4, nullable=true)
     */
    private $coMacrorregional;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MESORREGIAO", type="string", length=4, nullable=true)
     */
    private $coMesorregiao;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MICRORREGIAO", type="string", length=5, nullable=true)
     */
    private $coMicrorRegiao;
    /**
     * @var interger
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\UfEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_UF_IBGE", referencedColumnName="CO_UF_IBGE")
     * })
     */
    private $coUfIbge;


    /**
     * @var string
     *
     * @ORM\Column(name="SG_MUNICIPIO", type="string", length=3, nullable=true)
     */
    private $sgMunicipio;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD", type="string", length=4, nullable=true)
     */
    private $nuDdd;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CEP", type="string", length=8, nullable=true)
     */
    private $nuCep;
    /**
     * @var string
     *
     * @ORM\Column(name="DV_MUNICIPIO_IBGE", type="string", length=1, nullable=true)
     */
    private $dvMunicipioIbge;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_SIAFI", type="string", length=4, nullable=true)
     */
    private $coMunicipioSiafi;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_SIAPE", type="string", length=10, nullable=true)
     */
    private $coMunicipioSiape;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_SINPAS", type="string", length=5, nullable=true)
     */
    private $coSinpas;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_REGIAO_CORREIO", type="string", length=5, nullable=true)
     */
    private $coRegiaoCorreio;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_MUNICIPIO", type="string", length=10, nullable=true)
     */
    private $stMunicipio;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_AMAZONIA", type="string", length=1, nullable=true)
     */
    private $stAmazonia;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_FRONTEIRA", type="string", length=1, nullable=true)
     */
    private $stFronteira;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_SUCESSOR", type="string", length=6, nullable=true)
     */
    private $coSucessor;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_ANTERIOR", type="string", length=60, nullable=true)
     */
    private $noAnterior;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_COMUNIDADE_SOLIDARIA", type="string", length=1, nullable=true)
     */
    private $stComunidadeSolidaria;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_SECA", type="string", length=1, nullable=true)
     */
    private $stSeca;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_SEMI_ARIDO", type="string", length=1, nullable=true)
     */
    private $stSemiArido;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PRMI", type="string", length=1, nullable=true)
     */
    private $stPrmi;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_CALAMIDADE", type="string", length=1, nullable=true)
     */
    private $stCalamidade;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_INDIGENA", type="string", length=1, nullable=true)
     */
    private $stIndigena;
    /**
     * @var float
     *
     * @ORM\Column(name="NU_DISTANCIA_CAPITAL", type="float", nullable=true)
     */
    private $nuDistanciaCapital;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_CAPITAL", type="string", length=1, nullable=true)
     */
    private $stCapital;
    /**
     * @var float
     *
     * @ORM\Column(name="NU_AREA", type="float", length=1, nullable=true)
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
     * @ORM\Column(name="NU_ALTITUDE", type="integer", nullable=true)
     */
    private $nuAltitude;
//
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;
    /**
     * @var float
     *
     * @ORM\Column(name="NU_IDH", type="float", nullable=true)
     */
    private $nuIdh;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_CORREIO", type="string", length=6, nullable=true)
     */
    private $coMunicipioCorreio;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_INSS", type="string", length=5, nullable=true)
     */
    private $coMunicipioInss;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MICRORREGIONAL_SAUDE", type="string", length=5, nullable=true)
     */
    private $coMicrorregionalSaude;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PITS", type="string", length=1, nullable=true)
     */
    private $stPits;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_QUILOMBOLA", type="string", length=1, nullable=true)
     */
    private $stQuilombola;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_ANTIGO", type="integer", nullable=true)
     */
    private $coSeqAntigo;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_POPULAR", type="string", length=100, nullable=true)
     */
    private $noPopular;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_REGIAO_METROPOLITANA", type="string", length=4, nullable=true)
     */
    private $coRegiaoMetropolitana;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_AGLOMERADO_URBANO", type="string", length=4, nullable=true)
     */
    private $coAglomeradoUrbano;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_ANO_EXTINCAO", type="string", length=4, nullable=true)
     */
    private $nuAnoExtincao;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_ANO_INSTALACAO", type="string", length=4, nullable=true)
     */
    private $nuAnoInstalacao;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_IBGE", type="string", length=1, nullable=true)
     */
    private $stIbge;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_MUNICIPIO_SVS", type="integer", nullable=true)
     */
    private $coMunicipioSvs;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_MUNICIPIO_ACENTUADO", type="string", length=60, nullable=true)
     */
    private $noMunicipioAcentuado;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_RIDE", type="string", length=1, nullable=true)
     */
    private $stRide;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_CNES", type="string", length=6, nullable=true)
     */
    private $coMunicipioCnes;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_SUDAM", type="string", length=1, nullable=true)
     */
    private $stSudam;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_SUDENE", type="string", length=1, nullable=true)
     */
    private $stSudene;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_CADSUS", type="string", length=1, nullable=true)
     */
    private $stCadsus;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_ORIGEM", type="string", length=6, nullable=true)
     */
    private $coMunicipioOrigem;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_TERRITORIO_CIDADANIA", type="integer", nullable=true)
     */
    private $coTerritorioCidadania;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PSE", type="string", length=1, nullable=true)
     */
    private $stPse;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PAN", type="string", length=1, nullable=true)
     */
    private $stPan;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PACTO_RMINAL", type="string", length=1, nullable=true)
     */
    private $stPactoRminal;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_TABNET_RJ", type="string", length=6, nullable=true)
     */
    private $coMunicipioTabnetRj;
    /**
     * @var string
     *
     * @ORM\Column(name="TP_TIPOLOGIA_PNDR", type="string", length=20, nullable=true)
     */
    private $tpTipologiaPndr;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_GRUPO_PAC2", type="string", length=2, nullable=true)
     */
    private $coGrupoPac2;

    /**
     * @return string
     */
    public function getCoAglomeradoUrbano()
    {
        return $this->coAglomeradoUrbano;
    }

    /**
     * @param string $coAglomeradoUrbano
     */
    public function setCoAglomeradoUrbano($coAglomeradoUrbano)
    {
        $this->coAglomeradoUrbano = $coAglomeradoUrbano;
    }

    /**
     * @return string
     */
    public function getCoGrupoPac2()
    {
        return $this->coGrupoPac2;
    }

    /**
     * @param string $coGrupoPac2
     */
    public function setCoGrupoPac2($coGrupoPac2)
    {
        $this->coGrupoPac2 = $coGrupoPac2;
    }

    /**
     * @return string
     */
    public function getCoMacrorregional()
    {
        return $this->coMacrorregional;
    }

    /**
     * @param string $coMacrorregional
     */
    public function setCoMacrorregional($coMacrorregional)
    {
        $this->coMacrorregional = $coMacrorregional;
    }

    /**
     * @return string
     */
    public function getCoMesorregiao()
    {
        return $this->coMesorregiao;
    }

    /**
     * @param string $coMesorregiao
     */
    public function setCoMesorregiao($coMesorregiao)
    {
        $this->coMesorregiao = $coMesorregiao;
    }

    /**
     * @return string
     */
    public function getCoMicrorRegiao()
    {
        return $this->coMicrorRegiao;
    }

    /**
     * @param string $coMicrorRegiao
     */
    public function setCoMicrorRegiao($coMicrorRegiao)
    {
        $this->coMicrorRegiao = $coMicrorRegiao;
    }

    /**
     * @return string
     */
    public function getCoMicrorregionalSaude()
    {
        return $this->coMicrorregionalSaude;
    }

    /**
     * @param string $coMicrorregionalSaude
     */
    public function setCoMicrorregionalSaude($coMicrorregionalSaude)
    {
        $this->coMicrorregionalSaude = $coMicrorregionalSaude;
    }

    /**
     * @return string
     */
    public function getCoMunicipioCnes()
    {
        return $this->coMunicipioCnes;
    }

    /**
     * @param string $coMunicipioCnes
     */
    public function setCoMunicipioCnes($coMunicipioCnes)
    {
        $this->coMunicipioCnes = $coMunicipioCnes;
    }

    /**
     * @return string
     */
    public function getCoMunicipioCorreio()
    {
        return $this->coMunicipioCorreio;
    }

    /**
     * @param string $coMunicipioCorreio
     */
    public function setCoMunicipioCorreio($coMunicipioCorreio)
    {
        $this->coMunicipioCorreio = $coMunicipioCorreio;
    }

    /**
     * @return int
     */
    public function getCoMunicipioIbge()
    {
        return $this->coMunicipioIbge;
    }

    /**
     * @param int $coMunicipioIbge
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {
        $this->coMunicipioIbge = $coMunicipioIbge;
    }

    /**
     * @return string
     */
    public function getCoMunicipioInss()
    {
        return $this->coMunicipioInss;
    }

    /**
     * @param string $coMunicipioInss
     */
    public function setCoMunicipioInss($coMunicipioInss)
    {
        $this->coMunicipioInss = $coMunicipioInss;
    }

    /**
     * @return string
     */
    public function getCoMunicipioOrigem()
    {
        return $this->coMunicipioOrigem;
    }

    /**
     * @param string $coMunicipioOrigem
     */
    public function setCoMunicipioOrigem($coMunicipioOrigem)
    {
        $this->coMunicipioOrigem = $coMunicipioOrigem;
    }

    /**
     * @return string
     */
    public function getCoMunicipioSiafi()
    {
        return $this->coMunicipioSiafi;
    }

    /**
     * @param string $coMunicipioSiafi
     */
    public function setCoMunicipioSiafi($coMunicipioSiafi)
    {
        $this->coMunicipioSiafi = $coMunicipioSiafi;
    }

    /**
     * @return string
     */
    public function getCoMunicipioSiape()
    {
        return $this->coMunicipioSiape;
    }

    /**
     * @param string $coMunicipioSiape
     */
    public function setCoMunicipioSiape($coMunicipioSiape)
    {
        $this->coMunicipioSiape = $coMunicipioSiape;
    }

    /**
     * @return int
     */
    public function getCoMunicipioSvs()
    {
        return $this->coMunicipioSvs;
    }

    /**
     * @param int $coMunicipioSvs
     */
    public function setCoMunicipioSvs($coMunicipioSvs)
    {
        $this->coMunicipioSvs = $coMunicipioSvs;
    }

    /**
     * @return string
     */
    public function getCoMunicipioTabnetRj()
    {
        return $this->coMunicipioTabnetRj;
    }

    /**
     * @param string $coMunicipioTabnetRj
     */
    public function setCoMunicipioTabnetRj($coMunicipioTabnetRj)
    {
        $this->coMunicipioTabnetRj = $coMunicipioTabnetRj;
    }

    /**
     * @return string
     */
    public function getCoRegiaoCorreio()
    {
        return $this->coRegiaoCorreio;
    }

    /**
     * @param string $coRegiaoCorreio
     */
    public function setCoRegiaoCorreio($coRegiaoCorreio)
    {
        $this->coRegiaoCorreio = $coRegiaoCorreio;
    }

    /**
     * @return string
     */
    public function getCoRegiaoMetropolitana()
    {
        return $this->coRegiaoMetropolitana;
    }

    /**
     * @param string $coRegiaoMetropolitana
     */
    public function setCoRegiaoMetropolitana($coRegiaoMetropolitana)
    {
        $this->coRegiaoMetropolitana = $coRegiaoMetropolitana;
    }

    /**
     * @return string
     */
    public function getCoRegionalSaude()
    {
        return $this->coRegionalSaude;
    }

    /**
     * @param string $coRegionalSaude
     */
    public function setCoRegionalSaude($coRegionalSaude)
    {
        $this->coRegionalSaude = $coRegionalSaude;
    }

    /**
     * @return int
     */
    public function getCoSeqAntigo()
    {
        return $this->coSeqAntigo;
    }

    /**
     * @param int $coSeqAntigo
     */
    public function setCoSeqAntigo($coSeqAntigo)
    {
        $this->coSeqAntigo = $coSeqAntigo;
    }

    /**
     * @return string
     */
    public function getCoSinpas()
    {
        return $this->coSinpas;
    }

    /**
     * @param string $coSinpas
     */
    public function setCoSinpas($coSinpas)
    {
        $this->coSinpas = $coSinpas;
    }

    /**
     * @return string
     */
    public function getCoSucessor()
    {
        return $this->coSucessor;
    }

    /**
     * @param string $coSucessor
     */
    public function setCoSucessor($coSucessor)
    {
        $this->coSucessor = $coSucessor;
    }

    /**
     * @return int
     */
    public function getCoTerritorioCidadania()
    {
        return $this->coTerritorioCidadania;
    }

    /**
     * @param int $coTerritorioCidadania
     */
    public function setCoTerritorioCidadania($coTerritorioCidadania)
    {
        $this->coTerritorioCidadania = $coTerritorioCidadania;
    }

    /**
     * @return string
     */
    public function getCoUfIbge()
    {
        return $this->coUfIbge;
    }

    /**
     * @param string $coUfIbge
     */
    public function setCoUfIbge($coUfIbge)
    {
        $this->coUfIbge = $coUfIbge;
    }

    /**
     * @return string
     */
    public function getDvMunicipioIbge()
    {
        return $this->dvMunicipioIbge;
    }

    /**
     * @param string $dvMunicipioIbge
     */
    public function setDvMunicipioIbge($dvMunicipioIbge)
    {
        $this->dvMunicipioIbge = $dvMunicipioIbge;
    }

    /**
     * @return string
     */
    public function getNoAnterior()
    {
        return $this->noAnterior;
    }

    /**
     * @param string $noAnterior
     */
    public function setNoAnterior($noAnterior)
    {
        $this->noAnterior = $noAnterior;
    }

    /**
     * @return string
     */
    public function getNoMunicipio()
    {
        return $this->noMunicipio;
    }

    /**
     * @param string $noMunicipio
     */
    public function setNoMunicipio($noMunicipio)
    {
        $this->noMunicipio = $noMunicipio;
    }

    /**
     * @return string
     */
    public function getNoMunicipioAcentuado()
    {
        return $this->noMunicipioAcentuado;
    }

    /**
     * @param string $noMunicipioAcentuado
     */
    public function setNoMunicipioAcentuado($noMunicipioAcentuado)
    {
        $this->noMunicipioAcentuado = $noMunicipioAcentuado;
    }

    /**
     * @return string
     */
    public function getNoPopular()
    {
        return $this->noPopular;
    }

    /**
     * @param string $noPopular
     */
    public function setNoPopular($noPopular)
    {
        $this->noPopular = $noPopular;
    }

    /**
     * @return int
     */
    public function getNuAltitude()
    {
        return $this->nuAltitude;
    }

    /**
     * @param int $nuAltitude
     */
    public function setNuAltitude($nuAltitude)
    {
        $this->nuAltitude = $nuAltitude;
    }

    /**
     * @return string
     */
    public function getNuAnoExtincao()
    {
        return $this->nuAnoExtincao;
    }

    /**
     * @param string $nuAnoExtincao
     */
    public function setNuAnoExtincao($nuAnoExtincao)
    {
        $this->nuAnoExtincao = $nuAnoExtincao;
    }

    /**
     * @return string
     */
    public function getNuAnoInstalacao()
    {
        return $this->nuAnoInstalacao;
    }

    /**
     * @param string $nuAnoInstalacao
     */
    public function setNuAnoInstalacao($nuAnoInstalacao)
    {
        $this->nuAnoInstalacao = $nuAnoInstalacao;
    }

    /**
     * @return float
     */
    public function getNuArea()
    {
        return $this->nuArea;
    }

    /**
     * @param float $nuArea
     */
    public function setNuArea($nuArea)
    {
        $this->nuArea = $nuArea;
    }

    /**
     * @return string
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * @param string $nuCep
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
    }

    /**
     * @return string
     */
    public function getNuDdd()
    {
        return $this->nuDdd;
    }

    /**
     * @param string $nuDdd
     */
    public function setNuDdd($nuDdd)
    {
        $this->nuDdd = $nuDdd;
    }

    /**
     * @return float
     */
    public function getNuDistanciaCapital()
    {
        return $this->nuDistanciaCapital;
    }

    /**
     * @param float $nuDistanciaCapital
     */
    public function setNuDistanciaCapital($nuDistanciaCapital)
    {
        $this->nuDistanciaCapital = $nuDistanciaCapital;
    }

    /**
     * @return float
     */
    public function getNuIdh()
    {
        return $this->nuIdh;
    }

    /**
     * @param float $nuIdh
     */
    public function setNuIdh($nuIdh)
    {
        $this->nuIdh = $nuIdh;
    }

    /**
     * @return string
     */
    public function getNuLatitude()
    {
        return $this->nuLatitude;
    }

    /**
     * @param string $nuLatitude
     */
    public function setNuLatitude($nuLatitude)
    {
        $this->nuLatitude = $nuLatitude;
    }

    /**
     * @return string
     */
    public function getNuLongitude()
    {
        return $this->nuLongitude;
    }

    /**
     * @param string $nuLongitude
     */
    public function setNuLongitude($nuLongitude)
    {
        $this->nuLongitude = $nuLongitude;
    }

    /**
     * @return string
     */
    public function getSgMunicipio()
    {
        return $this->sgMunicipio;
    }

    /**
     * @param string $sgMunicipio
     */
    public function setSgMunicipio($sgMunicipio)
    {
        $this->sgMunicipio = $sgMunicipio;
    }

    /**
     * @return string
     */
    public function getSgUf()
    {
        return $this->sgUf;
    }

    /**
     * @param string $sgUf
     */
    public function setSgUf($sgUf)
    {
        $this->sgUf = $sgUf;
    }

    /**
     * @return string
     */
    public function getStAmazonia()
    {
        return $this->stAmazonia;
    }

    /**
     * @param string $stAmazonia
     */
    public function setStAmazonia($stAmazonia)
    {
        $this->stAmazonia = $stAmazonia;
    }

    /**
     * @return string
     */
    public function getStCadsus()
    {
        return $this->stCadsus;
    }

    /**
     * @param string $stCadsus
     */
    public function setStCadsus($stCadsus)
    {
        $this->stCadsus = $stCadsus;
    }

    /**
     * @return string
     */
    public function getStCalamidade()
    {
        return $this->stCalamidade;
    }

    /**
     * @param string $stCalamidade
     */
    public function setStCalamidade($stCalamidade)
    {
        $this->stCalamidade = $stCalamidade;
    }

    /**
     * @return string
     */
    public function getStCapital()
    {
        return $this->stCapital;
    }

    /**
     * @param string $stCapital
     */
    public function setStCapital($stCapital)
    {
        $this->stCapital = $stCapital;
    }

    /**
     * @return string
     */
    public function getStComunidadeSolidaria()
    {
        return $this->stComunidadeSolidaria;
    }

    /**
     * @param string $stComunidadeSolidaria
     */
    public function setStComunidadeSolidaria($stComunidadeSolidaria)
    {
        $this->stComunidadeSolidaria = $stComunidadeSolidaria;
    }

    /**
     * @return string
     */
    public function getStFronteira()
    {
        return $this->stFronteira;
    }

    /**
     * @param string $stFronteira
     */
    public function setStFronteira($stFronteira)
    {
        $this->stFronteira = $stFronteira;
    }

    /**
     * @return string
     */
    public function getStIbge()
    {
        return $this->stIbge;
    }

    /**
     * @param string $stIbge
     */
    public function setStIbge($stIbge)
    {
        $this->stIbge = $stIbge;
    }

    /**
     * @return string
     */
    public function getStIndigena()
    {
        return $this->stIndigena;
    }

    /**
     * @param string $stIndigena
     */
    public function setStIndigena($stIndigena)
    {
        $this->stIndigena = $stIndigena;
    }

    /**
     * @return string
     */
    public function getStMunicipio()
    {
        return $this->stMunicipio;
    }

    /**
     * @param string $stMunicipio
     */
    public function setStMunicipio($stMunicipio)
    {
        $this->stMunicipio = $stMunicipio;
    }

    /**
     * @return string
     */
    public function getStPactoRminal()
    {
        return $this->stPactoRminal;
    }

    /**
     * @param string $stPactoRminal
     */
    public function setStPactoRminal($stPactoRminal)
    {
        $this->stPactoRminal = $stPactoRminal;
    }

    /**
     * @return string
     */
    public function getStPan()
    {
        return $this->stPan;
    }

    /**
     * @param string $stPan
     */
    public function setStPan($stPan)
    {
        $this->stPan = $stPan;
    }

    /**
     * @return string
     */
    public function getStPits()
    {
        return $this->stPits;
    }

    /**
     * @param string $stPits
     */
    public function setStPits($stPits)
    {
        $this->stPits = $stPits;
    }

    /**
     * @return string
     */
    public function getStPrmi()
    {
        return $this->stPrmi;
    }

    /**
     * @param string $stPrmi
     */
    public function setStPrmi($stPrmi)
    {
        $this->stPrmi = $stPrmi;
    }

    /**
     * @return string
     */
    public function getStPse()
    {
        return $this->stPse;
    }

    /**
     * @param string $stPse
     */
    public function setStPse($stPse)
    {
        $this->stPse = $stPse;
    }

    /**
     * @return string
     */
    public function getStQuilombola()
    {
        return $this->stQuilombola;
    }

    /**
     * @param string $stQuilombola
     */
    public function setStQuilombola($stQuilombola)
    {
        $this->stQuilombola = $stQuilombola;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * @param string $stRegistroAtivo
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
    }

    /**
     * @return string
     */
    public function getStRide()
    {
        return $this->stRide;
    }

    /**
     * @param string $stRide
     */
    public function setStRide($stRide)
    {
        $this->stRide = $stRide;
    }

    /**
     * @return string
     */
    public function getStSeca()
    {
        return $this->stSeca;
    }

    /**
     * @param string $stSeca
     */
    public function setStSeca($stSeca)
    {
        $this->stSeca = $stSeca;
    }

    /**
     * @return string
     */
    public function getStSemiArido()
    {
        return $this->stSemiArido;
    }

    /**
     * @param string $stSemiArido
     */
    public function setStSemiArido($stSemiArido)
    {
        $this->stSemiArido = $stSemiArido;
    }

    /**
     * @return string
     */
    public function getStSudam()
    {
        return $this->stSudam;
    }

    /**
     * @param string $stSudam
     */
    public function setStSudam($stSudam)
    {
        $this->stSudam = $stSudam;
    }

    /**
     * @return string
     */
    public function getStSudene()
    {
        return $this->stSudene;
    }

    /**
     * @param string $stSudene
     */
    public function setStSudene($stSudene)
    {
        $this->stSudene = $stSudene;
    }

    /**
     * @return string
     */
    public function getTpTipologiaPndr()
    {
        return $this->tpTipologiaPndr;
    }

    /**
     * @param string $tpTipologiaPndr
     */
    public function setTpTipologiaPndr($tpTipologiaPndr)
    {
        $this->tpTipologiaPndr = $tpTipologiaPndr;
    }
}