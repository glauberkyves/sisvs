<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="DBPESSOA.TB_PESSOA")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Pessoa")

 */
class Pessoa extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CPF_CNPJ_PESSOA", type="string", length=14, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nuCpfCnpjPessoa;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_IBGE", type="string", length=6, nullable=true)
     */
    private $coMunicipioIbge;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_COMPLEMENTO", type="string", length=160, nullable=true)
     */
    private $dsComplemento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_ATUALIZACAO_RFB", type="datetime", nullable=true)
     */
    private $dtAtualizacaoRfb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_PROCESSAMENTO", type="datetime", nullable=true)
     */
    private $dtProcessamento;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_BAIRRO", type="string", length=50, nullable=true)
     */
    private $noBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_LOGRADOURO", type="string", length=100, nullable=true)
     */
    private $noLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_MUNICIPIO", type="string", length=50, nullable=true)
     */
    private $noMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PESSOA", type="string", length=150, nullable=false)
     */
    private $noPessoa;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_CEP", type="string", length=8, nullable=true)
     */
    private $nuCep;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD", type="string", length=4, nullable=true)
     */
    private $nuDdd;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDI", type="string", length=5, nullable=true)
     */
    private $nuDdi;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_LOGRADOURO", type="string", length=7, nullable=true)
     */
    private $nuLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_RAMAL", type="string", length=5, nullable=true)
     */
    private $nuRamal;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_TELEFONE", type="string", length=11, nullable=true)
     */
    private $nuTelefone;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=2, nullable=true)
     */
    private $sgUf;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=false)
     */
    private $stRegistroAtivo;


    /**
     * Set nuCpfCnpjPessoa
     *
     * @param string $nuCpfCnpjPessoa
     * @return Pessoa
     */
    public function setNuCpfCnpjPessoa($nuCpfCnpjPessoa)
    {
        $this->nuCpfCnpjPessoa= $nuCpfCnpjPessoa;
    
        return $this;
    }

    /**
     * Get nuCpfCnpjPessoa
     *
     * @return string 
     */
    public function getNuCpfCnpjPessoa()
    {
        return $this->nuCpfCnpjPessoa;
    }

    /**
     * Set coMunicipioIbge
     *
     * @param string $coMunicipioIbge
     * @return Pessoa
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {
        $this->coMunicipioIbge = $coMunicipioIbge;
    
        return $this;
    }

    /**
     * Get coMunicipioIbge
     *
     * @return string 
     */
    public function getCoMunicipioIbge()
    {
        return $this->coMunicipioIbge;
    }

    /**
     * Set dsComplemento
     *
     * @param string $dsComplemento
     * @return Pessoa
     */
    public function setDsComplemento($dsComplemento)
    {
        $this->dsComplemento = $dsComplemento;
    
        return $this;
    }

    /**
     * Get dsComplemento
     *
     * @return string 
     */
    public function getDsComplemento()
    {
        return $this->dsComplemento;
    }

    /**
     * Set dtAtualizacaoRfb
     *
     * @param \DateTime $dtAtualizacaoRfb
     * @return Pessoa
     */
    public function setDtAtualizacaoRfb($dtAtualizacaoRfb)
    {
        $this->dtAtualizacaoRfb = $dtAtualizacaoRfb;
    
        return $this;
    }

    /**
     * Get dtAtualizacaoRfb
     *
     * @return \DateTime 
     */
    public function getDtAtualizacaoRfb()
    {
        return $this->dtAtualizacaoRfb;
    }

    /**
     * Set dtProcessamento
     *
     * @param \DateTime $dtProcessamento
     * @return Pessoa
     */
    public function setDtProcessamento($dtProcessamento)
    {
        $this->dtProcessamento = $dtProcessamento;
    
        return $this;
    }

    /**
     * Get dtProcessamento
     *
     * @return \DateTime 
     */
    public function getDtProcessamento()
    {
        return $this->dtProcessamento;
    }

    /**
     * Set noBairro
     *
     * @param string $noBairro
     * @return Pessoa
     */
    public function setNoBairro($noBairro)
    {
        $this->noBairro = $noBairro;
    
        return $this;
    }

    /**
     * Get noBairro
     *
     * @return string 
     */
    public function getNoBairro()
    {
        return $this->noBairro;
    }

    /**
     * Set noLogradouro
     *
     * @param string $noLogradouro
     * @return Pessoa
     */
    public function setNoLogradouro($noLogradouro)
    {
        $this->noLogradouro = $noLogradouro;
    
        return $this;
    }

    /**
     * Get noLogradouro
     *
     * @return string 
     */
    public function getNoLogradouro()
    {
        return $this->noLogradouro;
    }

    /**
     * Set noMunicipio
     *
     * @param string $noMunicipio
     * @return Pessoa
     */
    public function setNoMunicipio($noMunicipio)
    {
        $this->noMunicipio = $noMunicipio;
    
        return $this;
    }

    /**
     * Get noMunicipio
     *
     * @return string 
     */
    public function getNoMunicipio()
    {
        return $this->noMunicipio;
    }

    /**
     * Set noPessoa
     *
     * @param string $noPessoa
     * @return Pessoa
     */
    public function setNoPessoa($noPessoa)
    {
        $this->noPessoa= $noPessoa;
    
        return $this;
    }

    /**
     * Get noPessoa
     *
     * @return string 
     */
    public function getNoPessoa()
    {
        return $this->noPessoa;
    }

    /**
     * Set nuCep
     *
     * @param string $nuCep
     * @return Pessoa
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
    
        return $this;
    }

    /**
     * Get nuCep
     *
     * @return string 
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * Set nuDdd
     *
     * @param string $nuDdd
     * @return Pessoa
     */
    public function setNuDdd($nuDdd)
    {
        $this->nuDdd = $nuDdd;
    
        return $this;
    }

    /**
     * Get nuDdd
     *
     * @return string 
     */
    public function getNuDdd()
    {
        return $this->nuDdd;
    }

    /**
     * Set nuDdi
     *
     * @param string $nuDdi
     * @return Pessoa
     */
    public function setNuDdi($nuDdi)
    {
        $this->nuDdi = $nuDdi;
    
        return $this;
    }

    /**
     * Get nuDdi
     *
     * @return string 
     */
    public function getNuDdi()
    {
        return $this->nuDdi;
    }

    /**
     * Set nuLogradouro
     *
     * @param string $nuLogradouro
     * @return Pessoa
     */
    public function setNuLogradouro($nuLogradouro)
    {
        $this->nuLogradouro = $nuLogradouro;
    
        return $this;
    }

    /**
     * Get nuLogradouro
     *
     * @return string 
     */
    public function getNuLogradouro()
    {
        return $this->nuLogradouro;
    }

    /**
     * Set nuRamal
     *
     * @param string $nuRamal
     * @return Pessoa
     */
    public function setNuRamal($nuRamal)
    {
        $this->nuRamal = $nuRamal;
    
        return $this;
    }

    /**
     * Get nuRamal
     *
     * @return string 
     */
    public function getNuRamal()
    {
        return $this->nuRamal;
    }

    /**
     * Set nuTelefone
     *
     * @param string $nuTelefone
     * @return Pessoa
     */
    public function setNuTelefone($nuTelefone)
    {
        $this->nuTelefone = $nuTelefone;
    
        return $this;
    }

    /**
     * Get nuTelefone
     *
     * @return string 
     */
    public function getNuTelefone()
    {
        return $this->nuTelefone;
    }

    /**
     * Set sgUf
     *
     * @param string $sgUf
     * @return Pessoa
     */
    public function setSgUf($sgUf)
    {
        $this->sgUf = $sgUf;
    
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
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return Pessoa
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
}