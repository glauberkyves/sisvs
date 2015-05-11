<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegiaoSaude
 *
 * @ORM\Table(name="DBGERAL.TB_REGIAO_SAUDE")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\RegiaoSaude")

 */
class RegiaoSaude extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_REGIAO_SAUDE", type="integer", nullable=false)
     * @ORM\Id
     */
    private $coSeqRegiaoSaude;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_REGIAO_SAUDE", type="string", length=100, nullable=false)
     */
    private $noRegiaoSaude;
	
	/**
	* @var string
	*
	*@orm\column(name="SG_UF", type="string", length=2, nullable=false)
	*/
	private $sgUf;

	/**
	* @var \DateTime
	*
	*@orm\column(name="DT_INCLUSAO", type="datetime",  nullable=true)
	*/
	private $dtInclusao;
	
	/**
	* @var \DateTime
	*
	*@orm\column(name="DT_ALTERAÇÃO", type="datatime", nullable=true)
	*/
	private $dtAlteracao;
	
	/**
	* @var string
	*
	*@orm\column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=false)
	*/
	private $stRegistroAtivo;
	
	/**
     * Set coSeqRegiaoSaude
     *
     * @param integer  $coSeqRegiaoSaude
     * @return RegiaoSaude
     */
    public function setCoSeqRegiaoSaude($coSeqRegiaoSaude)
    {
        $this->coSeqRegiaoSaude = $coSeqRegiaoSaude;
    
        return $this;
    }

    /**
     * Get coSeqRegiaoSaude
     *
     * @return integer
     */
    public function getCoSeqRegiaoSaude()
    {
        return $this->coSeqRegiaoSaude;
    }
	
	/**
     * Set noRegiaoSaude
     *
     * @param string $noRegiaoSaude
     * @return RegiaoSaude
     */
    public function setNoRegiaoSaude($noRegiaoSaude)
    {
        $this->noRegiaoSaude = $noRegiaoSaude;
    
        return $this;
    }

    /**
     * Get noRegiaoSaude
     *
     * @return string 
     */
    public function getNoRegiaoSaude()
    {
        return $this->noRegiaoSaude;
    }
	
	/**
     * Set sgUf
     *
     * @param string  $sgUf
     * @return RegiaoSaude
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
        return $this->$sgUf;
    }
	
	/**
     * Set dtInclusao
     *
     * @param \DateTime  $dtInclusao
     * @return RegiaoSaude
     */
    public function setDtInclusao($dtInclusao)
    {
        $this->dtInclusao = $dtInclusao;
    
        return $this;
    }

    /**
     * Get dtInclusao
     *
     * @return \DateTime
     */
    public function getDtInclusao()
    {
        return $this->dtInclusao;
    }
	
	/**
     * Set dtAlteracao
     *
     * @param \DateTime  $dtAlteracao
     * @return RegiaoSaude
     */
    public function setDtAlteracao($dtAlteracao)
    {
        $this->dtAlteracao = $dtAlteracao;
    
        return $this;
    }

    /**
     * Get dtAlteracao
     *
     * @return \DateTime
     */
    public function getDtAlteracao()
    {
        return $this->dtAlteracao;
    }
	
	/**
     * Set stRegistroAtivo
     *
     * @param string  $stRegistroAtivo
     * @return RegiaoSaude
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->dtAlteracao = $stRegistroAtivo;
    
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
