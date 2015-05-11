<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoRg
 *
 * @ORM\Table(name="DBPOLO.TB_TIPO_RG")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\TipoRg")

 */
class TipoRg extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_TIPO_RG", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBPOLO.TB_TIPO_RG_CO_TIPO_RG_seq", allocationSize=1, initialValue=1)
     */
    private $coTipoRg;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_TIPO_RG", type="string", length=50, nullable=true)
     */
    private $dsTipoRg;


    /**
     * Get coTipoRg
     *
     * @return integer 
     */
    public function getCoTipoRg()
    {
        return $this->coTipoRg;
    }

    /**
     * Set dsTipoRg
     *
     * @param string $dsTipoRg
     * @return TipoRg
     */
    public function setDsTipoRg($dsTipoRg)
    {
        $this->dsTipoRg = $dsTipoRg;
    
        return $this;
    }

    /**
     * Get dsTipoRg
     *
     * @return string 
     */
    public function getDsTipoRg()
    {
        return $this->dsTipoRg;
    }
}