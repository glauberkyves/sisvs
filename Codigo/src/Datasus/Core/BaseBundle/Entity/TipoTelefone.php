<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoTelefone
 *
 * @ORM\Table(name="DBGERAL.TB_TIPO_TELEFONE")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\TipoTelefone")

 */
class TipoTelefone extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_TIPO_TELEFONE", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBGERAL.TB_TIPO_TELEFONE_CO_TIPO_TELEF", allocationSize=1, initialValue=1)
     */
    private $coTipoTelefone;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_TIPO_TELEFONE", type="string", length=20, nullable=true)
     */
    private $dsTipoTelefone;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;


    /**
     * Get coTipoTelefone
     *
     * @return string 
     */
    public function getCoTipoTelefone()
    {
        return $this->coTipoTelefone;
    }

    /**
     * Set dsTipoTelefone
     *
     * @param string $dsTipoTelefone
     * @return TipoTelefone
     */
    public function setDsTipoTelefone($dsTipoTelefone)
    {
        $this->dsTipoTelefone = $dsTipoTelefone;
    
        return $this;
    }

    /**
     * Get dsTipoTelefone
     *
     * @return string 
     */
    public function getDsTipoTelefone()
    {
        return $this->dsTipoTelefone;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return TipoTelefone
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