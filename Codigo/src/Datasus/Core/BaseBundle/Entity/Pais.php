<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="DBGERAL.TB_PAIS")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Pais")

 */
class Pais extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_PAIS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_PAIS_CO_SEQ_PAIS_seq", allocationSize=1, initialValue=1)
     */
    private $coSeqPais;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_CIDADE_CAPITAL", type="integer", nullable=true)
     */
    private $coCidadeCapital;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CO_CONTINENTE", type="boolean", nullable=true)
     */
    private $coContinente;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_GRUPO_PAIS", type="integer", nullable=true)
     */
    private $coGrupoPais;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_NACIONALIDADE", type="integer", nullable=true)
     */
    private $coNacionalidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PAIS_BANCOCENTRAL", type="integer", nullable=true)
     */
    private $coPaisBancocentral;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_CADSUS", type="string", length=3, nullable=true)
     */
    private $coPaisCadsus;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_CEF", type="string", length=3, nullable=true)
     */
    private $coPaisCef;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_ONU", type="string", length=3, nullable=true)
     */
    private $coPaisOnu;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_SIAFI", type="string", length=3, nullable=true)
     */
    private $coPaisSiafi;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_SIAPE", type="string", length=3, nullable=true)
     */
    private $coPaisSiape;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PAIS_SVS", type="integer", nullable=true)
     */
    private $coPaisSvs;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_ANTIGO", type="integer", nullable=true)
     */
    private $coSeqAntigo;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_MOEDA", type="string", length=50, nullable=true)
     */
    private $dsMoeda;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_NACIONALIDADE", type="string", length=50, nullable=true)
     */
    private $dsNacionalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS", type="string", length=70, nullable=false)
     */
    private $noPais;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_ESPANHOL_ONU", type="string", length=70, nullable=true)
     */
    private $noPaisEspanholOnu;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_FRANCES", type="string", length=70, nullable=true)
     */
    private $noPaisFrances;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_FRANCES_ONU", type="string", length=70, nullable=true)
     */
    private $noPaisFrancesOnu;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_INGLES", type="string", length=70, nullable=true)
     */
    private $noPaisIngles;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_INGLES_ONU", type="string", length=70, nullable=true)
     */
    private $noPaisInglesOnu;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDI_PAIS", type="string", length=3, nullable=true)
     */
    private $nuDdiPais;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_INTERNET", type="string", length=3, nullable=true)
     */
    private $sgInternet;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_MOEDA", type="string", length=10, nullable=true)
     */
    private $sgMoeda;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_PAIS", type="string", length=3, nullable=true)
     */
    private $sgPais;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_PAIS_ISO3166", type="string", length=2, nullable=true)
     */
    private $sgPaisIso3166;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_AMERICA_LATINA", type="string", length=1, nullable=true)
     */
    private $stAmericaLatina;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_MERCOSUL", type="string", length=1, nullable=true)
     */
    private $stMercosul;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_UNIAO_EUROPEIA", type="string", length=1, nullable=true)
     */
    private $stUniaoEuropeia;


    /**
     * Get coSeqPais
     *
     * @return integer 
     */
    public function getCoSeqPais()
    {
        return $this->coSeqPais;
    }

    /**
     * Set coCidadeCapital
     *
     * @param integer $coCidadeCapital
     * @return Pais
     */
    public function setCoCidadeCapital($coCidadeCapital)
    {
        $this->coCidadeCapital = $coCidadeCapital;
    
        return $this;
    }

    /**
     * Get coCidadeCapital
     *
     * @return integer 
     */
    public function getCoCidadeCapital()
    {
        return $this->coCidadeCapital;
    }

    /**
     * Set coContinente
     *
     * @param boolean $coContinente
     * @return Pais
     */
    public function setCoContinente($coContinente)
    {
        $this->coContinente = $coContinente;
    
        return $this;
    }

    /**
     * Get coContinente
     *
     * @return boolean 
     */
    public function getCoContinente()
    {
        return $this->coContinente;
    }

    /**
     * Set coGrupoPais
     *
     * @param integer $coGrupoPais
     * @return Pais
     */
    public function setCoGrupoPais($coGrupoPais)
    {
        $this->coGrupoPais = $coGrupoPais;
    
        return $this;
    }

    /**
     * Get coGrupoPais
     *
     * @return integer 
     */
    public function getCoGrupoPais()
    {
        return $this->coGrupoPais;
    }

    /**
     * Set coNacionalidade
     *
     * @param integer $coNacionalidade
     * @return Pais
     */
    public function setCoNacionalidade($coNacionalidade)
    {
        $this->coNacionalidade = $coNacionalidade;
    
        return $this;
    }

    /**
     * Get coNacionalidade
     *
     * @return integer 
     */
    public function getCoNacionalidade()
    {
        return $this->coNacionalidade;
    }

    /**
     * Set coPaisBancocentral
     *
     * @param integer $coPaisBancocentral
     * @return Pais
     */
    public function setCoPaisBancocentral($coPaisBancocentral)
    {
        $this->coPaisBancocentral = $coPaisBancocentral;
    
        return $this;
    }

    /**
     * Get coPaisBancocentral
     *
     * @return integer 
     */
    public function getCoPaisBancocentral()
    {
        return $this->coPaisBancocentral;
    }

    /**
     * Set coPaisCadsus
     *
     * @param string $coPaisCadsus
     * @return Pais
     */
    public function setCoPaisCadsus($coPaisCadsus)
    {
        $this->coPaisCadsus = $coPaisCadsus;
    
        return $this;
    }

    /**
     * Get coPaisCadsus
     *
     * @return string 
     */
    public function getCoPaisCadsus()
    {
        return $this->coPaisCadsus;
    }

    /**
     * Set coPaisCef
     *
     * @param string $coPaisCef
     * @return Pais
     */
    public function setCoPaisCef($coPaisCef)
    {
        $this->coPaisCef = $coPaisCef;
    
        return $this;
    }

    /**
     * Get coPaisCef
     *
     * @return string 
     */
    public function getCoPaisCef()
    {
        return $this->coPaisCef;
    }

    /**
     * Set coPaisOnu
     *
     * @param string $coPaisOnu
     * @return Pais
     */
    public function setCoPaisOnu($coPaisOnu)
    {
        $this->coPaisOnu = $coPaisOnu;
    
        return $this;
    }

    /**
     * Get coPaisOnu
     *
     * @return string 
     */
    public function getCoPaisOnu()
    {
        return $this->coPaisOnu;
    }

    /**
     * Set coPaisSiafi
     *
     * @param string $coPaisSiafi
     * @return Pais
     */
    public function setCoPaisSiafi($coPaisSiafi)
    {
        $this->coPaisSiafi = $coPaisSiafi;
    
        return $this;
    }

    /**
     * Get coPaisSiafi
     *
     * @return string 
     */
    public function getCoPaisSiafi()
    {
        return $this->coPaisSiafi;
    }

    /**
     * Set coPaisSiape
     *
     * @param string $coPaisSiape
     * @return Pais
     */
    public function setCoPaisSiape($coPaisSiape)
    {
        $this->coPaisSiape = $coPaisSiape;
    
        return $this;
    }

    /**
     * Get coPaisSiape
     *
     * @return string 
     */
    public function getCoPaisSiape()
    {
        return $this->coPaisSiape;
    }

    /**
     * Set coPaisSvs
     *
     * @param integer $coPaisSvs
     * @return Pais
     */
    public function setCoPaisSvs($coPaisSvs)
    {
        $this->coPaisSvs = $coPaisSvs;
    
        return $this;
    }

    /**
     * Get coPaisSvs
     *
     * @return integer 
     */
    public function getCoPaisSvs()
    {
        return $this->coPaisSvs;
    }

    /**
     * Set coSeqAntigo
     *
     * @param integer $coSeqAntigo
     * @return Pais
     */
    public function setCoSeqAntigo($coSeqAntigo)
    {
        $this->coSeqAntigo = $coSeqAntigo;
    
        return $this;
    }

    /**
     * Get coSeqAntigo
     *
     * @return integer 
     */
    public function getCoSeqAntigo()
    {
        return $this->coSeqAntigo;
    }

    /**
     * Set dsMoeda
     *
     * @param string $dsMoeda
     * @return Pais
     */
    public function setDsMoeda($dsMoeda)
    {
        $this->dsMoeda = $dsMoeda;
    
        return $this;
    }

    /**
     * Get dsMoeda
     *
     * @return string 
     */
    public function getDsMoeda()
    {
        return $this->dsMoeda;
    }

    /**
     * Set dsNacionalidade
     *
     * @param string $dsNacionalidade
     * @return Pais
     */
    public function setDsNacionalidade($dsNacionalidade)
    {
        $this->dsNacionalidade = $dsNacionalidade;
    
        return $this;
    }

    /**
     * Get dsNacionalidade
     *
     * @return string 
     */
    public function getDsNacionalidade()
    {
        return $this->dsNacionalidade;
    }

    /**
     * Set noPais
     *
     * @param string $noPais
     * @return Pais
     */
    public function setNoPais($noPais)
    {
        $this->noPais = $noPais;
    
        return $this;
    }

    /**
     * Get noPais
     *
     * @return string 
     */
    public function getNoPais()
    {
        return $this->noPais;
    }

    /**
     * Set noPaisEspanholOnu
     *
     * @param string $noPaisEspanholOnu
     * @return Pais
     */
    public function setNoPaisEspanholOnu($noPaisEspanholOnu)
    {
        $this->noPaisEspanholOnu = $noPaisEspanholOnu;
    
        return $this;
    }

    /**
     * Get noPaisEspanholOnu
     *
     * @return string 
     */
    public function getNoPaisEspanholOnu()
    {
        return $this->noPaisEspanholOnu;
    }

    /**
     * Set noPaisFrances
     *
     * @param string $noPaisFrances
     * @return Pais
     */
    public function setNoPaisFrances($noPaisFrances)
    {
        $this->noPaisFrances = $noPaisFrances;
    
        return $this;
    }

    /**
     * Get noPaisFrances
     *
     * @return string 
     */
    public function getNoPaisFrances()
    {
        return $this->noPaisFrances;
    }

    /**
     * Set noPaisFrancesOnu
     *
     * @param string $noPaisFrancesOnu
     * @return Pais
     */
    public function setNoPaisFrancesOnu($noPaisFrancesOnu)
    {
        $this->noPaisFrancesOnu = $noPaisFrancesOnu;
    
        return $this;
    }

    /**
     * Get noPaisFrancesOnu
     *
     * @return string 
     */
    public function getNoPaisFrancesOnu()
    {
        return $this->noPaisFrancesOnu;
    }

    /**
     * Set noPaisIngles
     *
     * @param string $noPaisIngles
     * @return Pais
     */
    public function setNoPaisIngles($noPaisIngles)
    {
        $this->noPaisIngles = $noPaisIngles;
    
        return $this;
    }

    /**
     * Get noPaisIngles
     *
     * @return string 
     */
    public function getNoPaisIngles()
    {
        return $this->noPaisIngles;
    }

    /**
     * Set noPaisInglesOnu
     *
     * @param string $noPaisInglesOnu
     * @return Pais
     */
    public function setNoPaisInglesOnu($noPaisInglesOnu)
    {
        $this->noPaisInglesOnu = $noPaisInglesOnu;
    
        return $this;
    }

    /**
     * Get noPaisInglesOnu
     *
     * @return string 
     */
    public function getNoPaisInglesOnu()
    {
        return $this->noPaisInglesOnu;
    }

    /**
     * Set nuDdiPais
     *
     * @param string $nuDdiPais
     * @return Pais
     */
    public function setNuDdiPais($nuDdiPais)
    {
        $this->nuDdiPais = $nuDdiPais;
    
        return $this;
    }

    /**
     * Get nuDdiPais
     *
     * @return string 
     */
    public function getNuDdiPais()
    {
        return $this->nuDdiPais;
    }

    /**
     * Set sgInternet
     *
     * @param string $sgInternet
     * @return Pais
     */
    public function setSgInternet($sgInternet)
    {
        $this->sgInternet = $sgInternet;
    
        return $this;
    }

    /**
     * Get sgInternet
     *
     * @return string 
     */
    public function getSgInternet()
    {
        return $this->sgInternet;
    }

    /**
     * Set sgMoeda
     *
     * @param string $sgMoeda
     * @return Pais
     */
    public function setSgMoeda($sgMoeda)
    {
        $this->sgMoeda = $sgMoeda;
    
        return $this;
    }

    /**
     * Get sgMoeda
     *
     * @return string 
     */
    public function getSgMoeda()
    {
        return $this->sgMoeda;
    }

    /**
     * Set sgPais
     *
     * @param string $sgPais
     * @return Pais
     */
    public function setSgPais($sgPais)
    {
        $this->sgPais = $sgPais;
    
        return $this;
    }

    /**
     * Get sgPais
     *
     * @return string 
     */
    public function getSgPais()
    {
        return $this->sgPais;
    }

    /**
     * Set sgPaisIso3166
     *
     * @param string $sgPaisIso3166
     * @return Pais
     */
    public function setSgPaisIso3166($sgPaisIso3166)
    {
        $this->sgPaisIso3166 = $sgPaisIso3166;
    
        return $this;
    }

    /**
     * Get sgPaisIso3166
     *
     * @return string 
     */
    public function getSgPaisIso3166()
    {
        return $this->sgPaisIso3166;
    }

    /**
     * Set stAmericaLatina
     *
     * @param string $stAmericaLatina
     * @return Pais
     */
    public function setStAmericaLatina($stAmericaLatina)
    {
        $this->stAmericaLatina = $stAmericaLatina;
    
        return $this;
    }

    /**
     * Get stAmericaLatina
     *
     * @return string 
     */
    public function getStAmericaLatina()
    {
        return $this->stAmericaLatina;
    }

    /**
     * Set stMercosul
     *
     * @param string $stMercosul
     * @return Pais
     */
    public function setStMercosul($stMercosul)
    {
        $this->stMercosul = $stMercosul;
    
        return $this;
    }

    /**
     * Get stMercosul
     *
     * @return string 
     */
    public function getStMercosul()
    {
        return $this->stMercosul;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return Pais
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
    
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
     * Set stUniaoEuropeia
     *
     * @param string $stUniaoEuropeia
     * @return Pais
     */
    public function setStUniaoEuropeia($stUniaoEuropeia)
    {
        $this->stUniaoEuropeia = $stUniaoEuropeia;
    
        return $this;
    }

    /**
     * Get stUniaoEuropeia
     *
     * @return string 
     */
    public function getStUniaoEuropeia()
    {
        return $this->stUniaoEuropeia;
    }
}