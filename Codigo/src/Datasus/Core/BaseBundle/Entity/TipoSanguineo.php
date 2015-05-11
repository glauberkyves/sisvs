<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoSanguineo
 *
 * @ORM\Table(name="DBGERAL.TB_TIPO_SANGUINEO")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\TipoSanguineo")

 */
class TipoSanguineo extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_TIPO_SANGUINEO", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBGERAL.TB_TIPO_SANGUINEO_CO_TIPO_SANG", allocationSize=1, initialValue=1)
     */
    private $coTipoSanguineo;


    /**
     * Get coTipoSanguineo
     *
     * @return string 
     */
    public function getCoTipoSanguineo()
    {
        return $this->coTipoSanguineo;
    }
}