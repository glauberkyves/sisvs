<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * SexoEntity
 *
 * @ORM\Table(name="DBGERAL.TB_SEXO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\SexoRepository")
 */
class SexoEntity extends AbstractBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_SEXO", type="string", length=1, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $coSexo;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_SEXO", type="string", length=10, nullable=true)
     */
    private $dsSexo;
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
     * @return string
     */
    public function getCoSexo()
    {
        return $this->coSexo;
    }

    /**
     * @param string $coSexo
     */
    public function setCoSexo($coSexo)
    {
        $this->coSexo = $coSexo;
    }

    /**
     * @return string
     */
    public function getDsSexo()
    {
        return $this->dsSexo;
    }

    /**
     * @param string $dsSexo
     */
    public function setDsSexo($dsSexo)
    {
        $this->dsSexo = $dsSexo;
    }

    /**
     * @return string
     */
    public function getStCadsus()
    {
        return $this->stCadsus;
    }

    /**
     * @param string $stCadsus
     */
    public function setStCadsus($stCadsus)
    {
        $this->stCadsus = $stCadsus;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * @param string $stRegistroAtivo
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
    }

    /**
     * @return mixed
     */
    public function getCoUsuario()
    {
        return $this->coUsuario;
    }

    /**
     * @param mixed $coUsuario
     */
    public function setCoUsuario($coUsuario)
    {
        $this->coUsuario = $coUsuario;
    }


}