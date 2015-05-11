<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoCivil
 *
 * @ORM\Table(name="DBGERAL.TB_ESTADO_CIVIL")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\EstadoCivil")

 */
class EstadoCivil extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_ESTADO_CIVIL", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_ESTADO_CIVIL_CO_ESTADO_CIVI", allocationSize=1, initialValue=1)
     */
    private $coEstadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_ESTADO_CIVIL_CADSUS", type="string", length=2, nullable=true)
     */
    private $coEstadoCivilCadsus;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_ESTADO_CIVIL", type="string", length=25, nullable=true)
     */
    private $dsEstadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;


    /**
     * Get coEstadoCivil
     *
     * @return string 
     */
    public function getCoEstadoCivil()
    {
        return $this->coEstadoCivil;
    }

    /**
     * Set coEstadoCivilCadsus
     *
     * @param string $coEstadoCivilCadsus
     * @return EstadoCivil
     */
    public function setCoEstadoCivilCadsus($coEstadoCivilCadsus)
    {
        $this->coEstadoCivilCadsus = $coEstadoCivilCadsus;
    
        return $this;
    }

    /**
     * Get coEstadoCivilCadsus
     *
     * @return string 
     */
    public function getCoEstadoCivilCadsus()
    {
        return $this->coEstadoCivilCadsus;
    }

    /**
     * Set dsEstadoCivil
     *
     * @param string $dsEstadoCivil
     * @return EstadoCivil
     */
    public function setDsEstadoCivil($dsEstadoCivil)
    {
        $this->dsEstadoCivil = $dsEstadoCivil;
    
        return $this;
    }

    /**
     * Get dsEstadoCivil
     *
     * @return string 
     */
    public function getDsEstadoCivil()
    {
        return $this->dsEstadoCivil;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return EstadoCivil
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