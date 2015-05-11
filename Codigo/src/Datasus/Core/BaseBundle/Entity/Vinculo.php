<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vinculo
 *
 * @ORM\Table(name="DBPOLO.TB_VINCULO")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Vinculo")

 */
class Pessoa extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
     /**
     * @var integer
     *
     * @ORM\Column(name="CO_VINCULO", type="integer", nullable=false)
     * @ORM\Id
     */
    private $coVinculo;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_VINCULO", type="string", length=40, nullable=true)
     */
     private $dsVinculo;
	 
	 /**
     * Set coVinculo
     *
     * @param integer $coVinculo
     * @return Vinculo
     */
    public function setCoVinculo($coVinculo)
    {
        $this->coVinculo = $coVinculo;
    
        return $this;
    }

    /**
     * Get coVinculo
     *
     * @return integer
     */
    public function getCoVinculo()
    {
        return $this->coVinculo;
    }
	
	/**
     * Set dsVinculo
     *
     * @param string $dsVinculo
     * @return Vinculo
     */
    public function setDsVinculo($dsVinculo)
    {
        $this->dsVinculo = $dsVinculo;
    
        return $this;
    }

    /**
     * Get dsVinculo
     *
     * @return string 
     */
    public function getDsVinculo()
    {
        return $this->dsVinculo;
    }
}