<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RacaCor
 *
 * @ORM\Table(name="DBGERAL.TB_RACA_COR")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\RacaCor")

 */
class RacaCor extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_RACA_COR", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_RACA_COR_CO_RACA_COR_seq", allocationSize=1, initialValue=1)
     */
    private $coRacaCor;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_RACA", type="string", length=1, nullable=true)
     */
    private $coRaca;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_RACA_COR_PORTARIA", type="string", length=2, nullable=true)
     */
    private $coRacaCorPortaria;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_RACA_COR", type="string", length=25, nullable=true)
     */
    private $dsRacaCor;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_CADSUS", type="string", length=1, nullable=true)
     */
    private $stCadsus;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_CNES", type="string", length=1, nullable=true)
     */
    private $stCnes;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;


    /**
     * Get coRacaCor
     *
     * @return string 
     */
    public function getCoRacaCor()
    {
        return $this->coRacaCor;
    }

    /**
     * Set coRaca
     *
     * @param string $coRaca
     * @return RacaCor
     */
    public function setCoRaca($coRaca)
    {
        $this->coRaca = $coRaca;
    
        return $this;
    }

    /**
     * Get coRaca
     *
     * @return string 
     */
    public function getCoRaca()
    {
        return $this->coRaca;
    }

    /**
     * Set coRacaCorPortaria
     *
     * @param string $coRacaCorPortaria
     * @return RacaCor
     */
    public function setCoRacaCorPortaria($coRacaCorPortaria)
    {
        $this->coRacaCorPortaria = $coRacaCorPortaria;
    
        return $this;
    }

    /**
     * Get coRacaCorPortaria
     *
     * @return string 
     */
    public function getCoRacaCorPortaria()
    {
        return $this->coRacaCorPortaria;
    }

    /**
     * Set dsRacaCor
     *
     * @param string $dsRacaCor
     * @return RacaCor
     */
    public function setDsRacaCor($dsRacaCor)
    {
        $this->dsRacaCor = $dsRacaCor;
    
        return $this;
    }

    /**
     * Get dsRacaCor
     *
     * @return string 
     */
    public function getDsRacaCor()
    {
        return $this->dsRacaCor;
    }

    /**
     * Set stCadsus
     *
     * @param string $stCadsus
     * @return RacaCor
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
     * Set stCnes
     *
     * @param string $stCnes
     * @return RacaCor
     */
    public function setStCnes($stCnes)
    {
        $this->stCnes = $stCnes;
    
        return $this;
    }

    /**
     * Get stCnes
     *
     * @return string 
     */
    public function getStCnes()
    {
        return $this->stCnes;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return RacaCor
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