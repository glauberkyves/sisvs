<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CidadeInternacional
 *
 * @ORM\Table(name="DBGERAL.TB_CIDADE_INTERNACIONAL")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\CidadeInternacional")

 */
class CidadeInternacional extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_CIDADE", type="integer", nullable=false)
     * @ORM\Id
     */
    private $coSeqCidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PAIS", type="integer", nullable=false)
     */
    private $coPais;
	
	/**
	* @var string
	*
	*@orm\column(name="NO_CIDADE", type="string", length=50, nullable=false)
	*/
	private $noCidade;

	/**
	* @var string
	*
	*@orm\column(name="SG_CIDADE", type="string", length=3, nullable=true)
	*/
	private $sgCidade;
	
	/**
	* @var
	*
	*@orm\column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
	*/
	private $stRegistroAtivo;
	
	/**
	* @var integer
	*
	*@orm\column(name="CO_SEQ_ANTIGO", type="integer", nullable=true)
	*/
	private $coSeqAntigo;
	
	/**
	* @var
	*
	*@orm\column(name="NU_DDI_CIDADE", type="string", length=5, nullable=true)
	*/
	private $nuDdiCidade;
	
	/**
     * Set  coSeqCidade
     *
     * @param integer  $coSeqCidade
     * @return CidadeInternacional
     */
    public function setCoSeqCidade($coSeqCidade)
    {
        $this->coSeqCidade = $coSeqCidade;
    
        return $this;
    }

    /**
     * Get coSeqCidade
     *
     * @return integer
     */
    public function getCoSeqCidade()
    {
        return $this->coSeqCidade;
    }
	
	/**
     * Set coPais
     *
     * @param integer  $coPais
     * @return CidadeInternacional
     */
    public function setCoPais($coPais)
    {
        $this->coPais = $coPais;
    
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
     * Set noCidade
     *
     * @param string  $noCidade
     * @return CidadeInternacional
     */
    public function setNoCidade($noCidade)
    {
        $this->noCidade = $noCidade;
    
        return $this;
    }

    /**
     * Get noCidade
     *
     * @return string 
     */
    public function getNoCidade()
    {
        return $this->noCidade;
    }
	
	/**
     * Set sgCidade
     *
     * @param string  $sgCidade
     * @return CidadeInternacional
     */
    public function setSgCidade($sgCidade)
    {
        $this->sgCidade = $sgCidade;
    
        return $this;
    }

    /**
     * Get sgCidade
     *
     * @return string 
     */
    public function getSgCidade()
    {
        return $this->sgCidade;
    }
	
	/**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return CidadeInternacional
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
     * Set coSeqAntigo
     *
     * @param integer $coSeqAntigo
     * @return CidadeInternacional
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
     * Set nuDdiCidade
     *
     * @param string $nuDdiCidade
     * @return CidadeInternacional
     */
    public function setNuDdiCidade($nuDdiCidade)
    {
        $this->nuDdiCidade = $nuDdiCidade;
    
        return $this;
    }

    /**
     * Get nuDdiCidade
     *
     * @return string 
     */
    public function getNuDdiCidade()
    {
        return $this->nuDdiCidade;
    }
}
