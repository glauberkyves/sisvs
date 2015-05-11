<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Modalidade Critério
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.RL_MODALIDADE_CRITERIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\ModalidadeCriterioRepository")
 */
class ModalidadeCriterioEntity extends AbstractBase
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity", inversedBy="coModalidadeCriterio")
     * @ORM\JoinColumn(name="CO_MODALIDADE", referencedColumnName="CO_SEQ_MODALIDADE")
     */
    private $coModalidade;
    /**
     * @var integer
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\CriterioEntity")
     * @ORM\JoinColumn(name="CO_CRITERIO", referencedColumnName="CO_SEQ_CRITERIO")
     */
    private $coCriterio;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_PERMITE_BLOQUEIO", type="string", length=1)
     */
    private $stPermiteBloqueio;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_POSSUI_CATEGORIA", type="string", length=1)
     */
    private $stPossuiCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_NAO_INFORMADO", type="string", length=1)
     */
    private $stNaoInformado;

    /**
     * @param int $coCriterio
     */
    public function setCoCriterio($coCriterio)
    {
        $this->coCriterio = $coCriterio;
    }

    /**
     * @return int
     */
    public function getCoCriterio()
    {
        return $this->coCriterio;
    }

    /**
     * @param int $coModalidade
     */
    public function setCoModalidade($coModalidade)
    {
        $this->coModalidade = $coModalidade;
    }

    /**
     * @return int
     */
    public function getCoModalidade()
    {
        return $this->coModalidade;
    }

    /**
     * @param string $stNaoInformado
     */
    public function setStNaoInformado($stNaoInformado)
    {
        $this->stNaoInformado = $stNaoInformado;
    }

    /**
     * @return string
     */
    public function getStNaoInformado()
    {
        return $this->stNaoInformado;
    }

    /**
     * @param string $stPermiteBloqueio
     */
    public function setStPermiteBloqueio($stPermiteBloqueio)
    {
        $this->stPermiteBloqueio = $stPermiteBloqueio;
    }

    /**
     * @return string
     */
    public function getStPermiteBloqueio()
    {
        return $this->stPermiteBloqueio;
    }

    /**
     * @param string $stPossuiCategoria
     */
    public function setStPossuiCategoria($stPossuiCategoria)
    {
        $this->stPossuiCategoria = $stPossuiCategoria;
    }

    /**
     * @return string
     */
    public function getStPossuiCategoria()
    {
        return $this->stPossuiCategoria;
    }

}
