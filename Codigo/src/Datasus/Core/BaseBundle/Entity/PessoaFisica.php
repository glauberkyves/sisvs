<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PessoaFisica
 *
 * @ORM\Table(name="DBPESSOA.TB_PESSOA_FISICA")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\PessoaFisica")

 */
class PessoaFisica extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_NATUREZA_OCUPACAO", type="string", length=3, nullable=true)
     */
    private $coNaturezaOcupacao;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_OCUPACAO_PRINCIPAL", type="string", length=3, nullable=true)
     */
    private $coOcupacaoPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_PAIS_EXTERIOR", type="string", length=4, nullable=true)
     */
    private $coPaisExterior;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_UNIDADE_ADMINISTRATIVA", type="string", length=7, nullable=true)
     */
    private $coUnidadeAdministrativa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_NASCIMENTO", type="datetime", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_MAE", type="string", length=70, nullable=true)
     */
    private $noMae;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_PAIS_EXTERIOR", type="string", length=60, nullable=true)
     */
    private $noPaisExterior;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_ANO_EXERCICIO_NATOCUP", type="string", length=4, nullable=true)
     */
    private $nuAnoExercicioNatocup;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_ANO_OBITO", type="string", length=4, nullable=true)
     */
    private $nuAnoObito;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_CARTAO_SUS", type="string", length=15, nullable=true)
     */
    private $nuCartaoSus;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_TITULO_ELEITOR", type="string", length=13, nullable=true)
     */
    private $nuTituloEleitor;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_SEXO", type="string", length=1, nullable=true)
     */
    private $sgSexo;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_ESTRANGEIRO", type="string", length=1, nullable=true)
     */
    private $stEstrangeiro;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_RESIDENTE_EXTERIOR", type="string", length=1, nullable=true)
     */
    private $stResidenteExterior;

    /**
     * @var boolean
     *
     * @ORM\Column(name="TP_SEXO", type="boolean", nullable=true)
     */
    private $tpSexo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="TP_SITUACAO_CPF", type="boolean", nullable=true)
     */
    private $tpSituacaoCpf;

    /**
     * @var \Datasus\Core\BaseBundle\Entity\TbFmedPessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Datasus\Core\BaseBundle\Entity\TbFmedPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="NU_CPF", referencedColumnName="CO_SEQ_PESSOA")
     * })
     */
    private $nuCpf;


    /**
     * Set coNaturezaOcupacao
     *
     * @param string $coNaturezaOcupacao
     * @return PessoaFisica
     */
    public function setCoNaturezaOcupacao($coNaturezaOcupacao)
    {
        $this->coNaturezaOcupacao = $coNaturezaOcupacao;
    
        return $this;
    }

    /**
     * Get coNaturezaOcupacao
     *
     * @return string 
     */
    public function getCoNaturezaOcupacao()
    {
        return $this->coNaturezaOcupacao;
    }

    /**
     * Set coOcupacaoPrincipal
     *
     * @param string $coOcupacaoPrincipal
     * @return PessoaFisica
     */
    public function setCoOcupacaoPrincipal($coOcupacaoPrincipal)
    {
        $this->coOcupacaoPrincipal = $coOcupacaoPrincipal;
    
        return $this;
    }

    /**
     * Get coOcupacaoPrincipal
     *
     * @return string 
     */
    public function getCoOcupacaoPrincipal()
    {
        return $this->coOcupacaoPrincipal;
    }

    /**
     * Set coPaisExterior
     *
     * @param string $coPaisExterior
     * @return PessoaFisica
     */
    public function setCoPaisExterior($coPaisExterior)
    {
        $this->coPaisExterior = $coPaisExterior;
    
        return $this;
    }

    /**
     * Get coPaisExterior
     *
     * @return string 
     */
    public function getCoPaisExterior()
    {
        return $this->coPaisExterior;
    }

    /**
     * Set coUnidadeAdministrativa
     *
     * @param string $coUnidadeAdministrativa
     * @return PessoaFisica
     */
    public function setCoUnidadeAdministrativa($coUnidadeAdministrativa)
    {
        $this->coUnidadeAdministrativa = $coUnidadeAdministrativa;
    
        return $this;
    }

    /**
     * Get coUnidadeAdministrativa
     *
     * @return string 
     */
    public function getCoUnidadeAdministrativa()
    {
        return $this->coUnidadeAdministrativa;
    }

    /**
     * Set dtNascimento
     *
     * @param \DateTime $dtNascimento
     * @return PessoaFisica
     */
    public function setDtNascimento($dtNascimento)
    {
        $this->dtNascimento = $dtNascimento;
    
        return $this;
    }

    /**
     * Get dtNascimento
     *
     * @return \DateTime 
     */
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * Set noMae
     *
     * @param string $noMae
     * @return PessoaFisica
     */
    public function setNoMae($noMae)
    {
        $this->noMae = $noMae;
    
        return $this;
    }

    /**
     * Get noMae
     *
     * @return string 
     */
    public function getNoMae()
    {
        return $this->noMae;
    }

    /**
     * Set noPaisExterior
     *
     * @param string $noPaisExterior
     * @return PessoaFisica
     */
    public function setNoPaisExterior($noPaisExterior)
    {
        $this->noPaisExterior = $noPaisExterior;
    
        return $this;
    }

    /**
     * Get noPaisExterior
     *
     * @return string 
     */
    public function getNoPaisExterior()
    {
        return $this->noPaisExterior;
    }

    /**
     * Set nuAnoExercicioNatocup
     *
     * @param string $nuAnoExercicioNatocup
     * @return PessoaFisica
     */
    public function setNuAnoExercicioNatocup($nuAnoExercicioNatocup)
    {
        $this->nuAnoExercicioNatocup = $nuAnoExercicioNatocup;
    
        return $this;
    }

    /**
     * Get nuAnoExercicioNatocup
     *
     * @return string 
     */
    public function getNuAnoExercicioNatocup()
    {
        return $this->nuAnoExercicioNatocup;
    }

    /**
     * Set nuAnoObito
     *
     * @param string $nuAnoObito
     * @return PessoaFisica
     */
    public function setNuAnoObito($nuAnoObito)
    {
        $this->nuAnoObito = $nuAnoObito;
    
        return $this;
    }

    /**
     * Get nuAnoObito
     *
     * @return string 
     */
    public function getNuAnoObito()
    {
        return $this->nuAnoObito;
    }

    /**
     * Set nuCartaoSus
     *
     * @param string $nuCartaoSus
     * @return PessoaFisica
     */
    public function setNuCartaoSus($nuCartaoSus)
    {
        $this->nuCartaoSus = $nuCartaoSus;
    
        return $this;
    }

    /**
     * Get nuCartaoSus
     *
     * @return string 
     */
    public function getNuCartaoSus()
    {
        return $this->nuCartaoSus;
    }

    /**
     * Set nuTituloEleitor
     *
     * @param string $nuTituloEleitor
     * @return PessoaFisica
     */
    public function setNuTituloEleitor($nuTituloEleitor)
    {
        $this->nuTituloEleitor = $nuTituloEleitor;
    
        return $this;
    }

    /**
     * Get nuTituloEleitor
     *
     * @return string 
     */
    public function getNuTituloEleitor()
    {
        return $this->nuTituloEleitor;
    }

    /**
     * Set sgSexo
     *
     * @param string $sgSexo
     * @return PessoaFisica
     */
    public function setSgSexo($sgSexo)
    {
        $this->sgSexo = $sgSexo;
    
        return $this;
    }

    /**
     * Get sgSexo
     *
     * @return string 
     */
    public function getSgSexo()
    {
        return $this->sgSexo;
    }

    /**
     * Set stEstrangeiro
     *
     * @param string $stEstrangeiro
     * @return PessoaFisica
     */
    public function setStEstrangeiro($stEstrangeiro)
    {
        $this->stEstrangeiro = $stEstrangeiro;
    
        return $this;
    }

    /**
     * Get stEstrangeiro
     *
     * @return string 
     */
    public function getStEstrangeiro()
    {
        return $this->stEstrangeiro;
    }

    /**
     * Set stResidenteExterior
     *
     * @param string $stResidenteExterior
     * @return PessoaFisica
     */
    public function setStResidenteExterior($stResidenteExterior)
    {
        $this->stResidenteExterior = $stResidenteExterior;
    
        return $this;
    }

    /**
     * Get stResidenteExterior
     *
     * @return string 
     */
    public function getStResidenteExterior()
    {
        return $this->stResidenteExterior;
    }

    /**
     * Set tpSexo
     *
     * @param boolean $tpSexo
     * @return PessoaFisica
     */
    public function setTpSexo($tpSexo)
    {
        $this->tpSexo = $tpSexo;
    
        return $this;
    }

    /**
     * Get tpSexo
     *
     * @return boolean 
     */
    public function getTpSexo()
    {
        return $this->tpSexo;
    }

    /**
     * Set tpSituacaoCpf
     *
     * @param boolean $tpSituacaoCpf
     * @return PessoaFisica
     */
    public function setTpSituacaoCpf($tpSituacaoCpf)
    {
        $this->tpSituacaoCpf = $tpSituacaoCpf;
    
        return $this;
    }

    /**
     * Get tpSituacaoCpf
     *
     * @return boolean 
     */
    public function getTpSituacaoCpf()
    {
        return $this->tpSituacaoCpf;
    }

    /**
     * Set nuCpf
     *
     * @param \Datasus\Core\BaseBundle\Entity\TbFmedPessoa $nuCpf
     * @return PessoaFisica
     */
    public function setNuCpf(\Datasus\Core\BaseBundle\Entity\TbFmedPessoa $nuCpf)
    {
        $this->nuCpf = $nuCpf;
    
        return $this;
    }

    /**
     * Get nuCpf
     *
     * @return \Datasus\Core\BaseBundle\Entity\TbFmedPessoa 
     */
    public function getNuCpf()
    {
        return $this->nuCpf;
    }
}