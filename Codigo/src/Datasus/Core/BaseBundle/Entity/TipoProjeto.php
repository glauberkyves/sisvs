<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoProjeto
 *
 * @ORM\Table(name="DBPOLO.TB_TIPO_PROJETO")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\TipoProjeto")

 */
class TipoProjeto extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_TIPO_PROJETO", type="integer", nullable=false)
     * @ORM\Id
     */
    private $coTipoProjeto;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_TIPO_PROJETO", type="string", length=20, nullable=true)
     */
     private $dsTipoProjeto;
	 
	 /**
     * Set coTipoProjeto
     *
     * @param integer $coTipoProjeto
     * @return TipoProjeto
     */
    public function setCoTipoProjeto($coTipoProjeto)
    {
        $this->coTipoProjeto= $coTipoProjeto;
    
        return $this;
    }

    /**
     * Get CoTipoProjeto
     *
     * @return integer
     */
    public function getCoTipoProjeto()
    {
        return $this->coTipoProjeto;
    }
	
	/**
     * Set dsTipoProjeto
     *
     * @param string $dsTipoProjeto
     * @return TipoProjeto
     */
    public function setDsTipoProjeto($dsTipoProjeto)
    {
        $this->dsTipoProjeto= $dsTipoProjeto;
    
        return $this;
    }

    /**
     * Get dsTipoProjeto
     *
     * @return string 
     */
    public function getDsTipoProjeto()
    {
        return $this->dsTipoProjeto;
    }
}