<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * CepEntity
 *
 * @ORM\Table(name="DBGERAL.TB_CEP")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\CepRepository")
 */
class CepEntity extends AbstractBase
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_CEP", type="integer", length=8, nullable=false)
     */
    private $coCep;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CEP", type="string", length=8, nullable=true)
     */
    private $nuCep;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=6, nullable=true)
     */
    private $sgUf;
    /**
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\MunicipioEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_MUNICIPIO_IBGE", referencedColumnName="CO_MUNICIPIO_IBGE")
     * })
     */

    private $coMunicipio;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_LOCALIDADE", type="string", length=72, nullable=true)
     */
    private $noLocalidade;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_LOGRADOURO", type="string", length=250, nullable=true)
     */
    private $noLogradouro;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_COMPLEMENTO", type="string", length=36, nullable=true)
     */
    private $dsComplemento;

    /**
     * @return int
     */
    public function getCoCep()
    {
        return $this->coCep;
    }

    /**
     * @param int $coCep
     */
    public function setCoCep($coCep)
    {
        $this->coCep = $coCep;
    }

    /**
     * @param int $coMunicipioIbge
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {
        $this->coMunicipioIbge = $coMunicipioIbge;
    }

    /**
     * @return int
     */
    public function getCoMunicipioIbge()
    {
        return $this->coMunicipioIbge;
    }

    /**
     * @return string
     */
    public function getDsComplemento()
    {
        return $this->dsComplemento;
    }

    /**
     * @param string $dsComplemento
     */
    public function setDsComplemento($dsComplemento)
    {
        $this->dsComplemento = $dsComplemento;
    }

    /**
     * @return string
     */
    public function getNoLocalidade()
    {
        return $this->noLocalidade;
    }

    /**
     * @param string $noLocalidade
     */
    public function setNoLocalidade($noLocalidade)
    {
        $this->noLocalidade = $noLocalidade;
    }

    /**
     * @return string
     */
    public function getNoLogradouro()
    {
        return $this->noLogradouro;
    }

    /**
     * @param string $noLogradouro
     */
    public function setNoLogradouro($noLogradouro)
    {
        $this->noLogradouro = $noLogradouro;
    }

    /**
     * @return string
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * @param string $nuCep
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
    }

    /**
     * @return string
     */
    public function getSgUf()
    {
        return $this->sgUf;
    }

    /**
     * @param string $sgUf
     */
    public function setSgUf($sgUf)
    {
        $this->sgUf = $sgUf;
    }

    /**
     * @return mixed
     */
    public function getCoMunicipio()
    {
        return $this->coMunicipio;
    }

    /**
     * @param mixed $coMunicipio
     */
    public function setCoMunicipio($coMunicipio)
    {
        $this->coMunicipio = $coMunicipio;
    }

}