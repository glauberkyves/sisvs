<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * RegiaoEntity
 *
 * @ORM\Table(name="DBGERAL.TB_REGIAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\RegiaoRepository")
 */
class RegiaoEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_REGIAO", type="integer", nullable=true)
     * @ORM\Id
     */
    private $coRegiao;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_REGIAO", type="string", length=100, nullable=false)
     */
    private $noRegiao;
    /**
     * @var string
     *
     * @orm\column(name="SG_REGIAO", type="string", length=2, nullable=false)
     */
    private $sgRegiao;
    /**
     * @var string
     *
     * @orm\column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=false)
     */
    private $stRegistroAtivo;

    /**
     * @var string
     *
     */
    /**
     * @var string
     * @ORM\Column(name="CO_REGIAO_SVS", type="string",length=9)
     */
    private $coRegiaoSvs;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\UfEntity", mappedBy="coRegiao")
     */
    private $coUf;

    /**
     * @return int
     */
    public function getCoRegiao()
    {
        return $this->coRegiao;
    }

    /**
     * @param int $coRegiao
     */
    public function setCoRegiao($coRegiao)
    {
        $this->coRegiao = $coRegiao;
    }

    /**
     * @return string
     */
    public function getCoRegiaoSvs()
    {
        return $this->coRegiaoSvs;
    }

    /**
     * @param string $coRegiaoSvs
     */
    public function setCoRegiaoSvs($coRegiaoSvs)
    {
        $this->coRegiaoSvs = $coRegiaoSvs;
    }

    /**
     * @return string
     */
    public function getNoRegiao()
    {
        return $this->noRegiao;
    }

    /**
     * @param string $noRegiao
     */
    public function setNoRegiao($noRegiao)
    {
        $this->noRegiao = $noRegiao;
    }

    /**
     * @return string
     */
    public function getSgRegiao()
    {
        return $this->sgRegiao;
    }

    /**
     * @param string $sgRegiao
     */
    public function setSgRegiao($sgRegiao)
    {
        $this->sgRegiao = $sgRegiao;
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
     * @return int
     */
    public function getCoUf()
    {
        return $this->coUf;
    }

    /**
     * @param int $coUf
     */
    public function setCoUf($coUf)
    {
        $this->coUf = $coUf;
    }


}
