<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escolaridade
 *
 * @ORM\Table(name="DBGERAL.TB_ESCOLARIDADE")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Escolaridade")

 */
class Escolaridade extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_ESCOLARIDADE", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_ESCOLARIDADE_CO_ESCOLARIDAD", allocationSize=1, initialValue=1)
     */
    private $coEscolaridade;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_CADSUS", type="string", length=2, nullable=true)
     */
    private $coCadsus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CO_ESCOLARIDADE_INEP", type="boolean", nullable=true)
     */
    private $coEscolaridadeInep;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_ESCOLARIDADE", type="string", length=50, nullable=true)
     */
    private $dsEscolaridade;

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
     * Get coEscolaridade
     *
     * @return string 
     */
    public function getCoEscolaridade()
    {
        return $this->coEscolaridade;
    }

    /**
     * Set coCadsus
     *
     * @param string $coCadsus
     * @return Escolaridade
     */
    public function setCoCadsus($coCadsus)
    {
        $this->coCadsus = $coCadsus;
    
        return $this;
    }

    /**
     * Get coCadsus
     *
     * @return string 
     */
    public function getCoCadsus()
    {
        return $this->coCadsus;
    }

    /**
     * Set coEscolaridadeInep
     *
     * @param boolean $coEscolaridadeInep
     * @return Escolaridade
     */
    public function setCoEscolaridadeInep($coEscolaridadeInep)
    {
        $this->coEscolaridadeInep = $coEscolaridadeInep;
    
        return $this;
    }

    /**
     * Get coEscolaridadeInep
     *
     * @return boolean 
     */
    public function getCoEscolaridadeInep()
    {
        return $this->coEscolaridadeInep;
    }

    /**
     * Set dsEscolaridade
     *
     * @param string $dsEscolaridade
     * @return Escolaridade
     */
    public function setDsEscolaridade($dsEscolaridade)
    {
        $this->dsEscolaridade = $dsEscolaridade;
    
        return $this;
    }

    /**
     * Get dsEscolaridade
     *
     * @return string 
     */
    public function getDsEscolaridade()
    {
        return $this->dsEscolaridade;
    }

    /**
     * Set stCadsus
     *
     * @param string $stCadsus
     * @return Escolaridade
     */
    public function setStCadsus($stCadsus)
    {
        $this->stCadsus = $stCadsus;
    
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
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return Escolaridade
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