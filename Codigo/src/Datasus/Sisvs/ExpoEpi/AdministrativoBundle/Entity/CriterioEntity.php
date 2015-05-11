<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Criterio
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_CRITERIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\CriterioRepository")
 */
class CriterioEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_CRITERIO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_CRITERIO_COSEQCRITERIO", allocationSize=1, initialValue=1)
     */
    private $coSeqCriterio;
    /**
     * @var string
     * @Assert\NotBlank(message="administrativo.validations.criterio.notBlank")
     * @ORM\Column(name="NO_CRITERIO", type="text", nullable=true, length=500)
     */
    private $noCriterio;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_CRITERIO", type="text", nullable=true, length=500)
     */
    private $dsCriterio;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeCriterioEntity", mappedBy="coCriterio")
     **/
    private $coModalidadeCriterio;

    public function __construct()
    {
        $this->coModalidadeCriterio = new ArrayCollection();
    }

    public function getCoSeqCriterio()
    {
        return $this->coSeqCriterio;
    }

    public function setCoSeqCriterio($coSeqCriterio)
    {
        $this->coSeqCriterio = $coSeqCriterio;
    }

    public function getDsCriterio()
    {
        return $this->dsCriterio;
    }

    public function setDsCriterio($dsCriterio)
    {
        $this->dsCriterio = $dsCriterio;
    }

    public function getNoCriterio()
    {
        return $this->noCriterio;
    }

    public function setNoCriterio($noCriterio)
    {
        $this->noCriterio = $noCriterio;
    }

    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
    }

    public function getCoModalidadeCriterio()
    {
        return $this->coModalidadeCriterio;
    }

    public function getArrayCoModalidade()
    {
        $return = array();
        if ($this->getCoModalidadeCriterio()->count() < 1) {
            return $return;
        }

        foreach ($this->getCoModalidadeCriterio() as $modalidadeCriterio) {
            $coModalidade          = $modalidadeCriterio->getCoModalidade()->getCoSeqModalidade();
            $return[$coModalidade] = $coModalidade;
        }

        return $return;
    }

    public function getArrayBindModalidaadeCriterioStPermiteBloqueio()
    {
        $return = array();
        if ($this->coModalidadeCriterio->count() < 1) {
            return $return;
        }

        foreach ($this->coModalidadeCriterio as $modalidadeCriterio) {
            $stPermiteBloqueio   = $modalidadeCriterio->getStPermiteBloqueio();
            $coCriterio          = NULL;

            if(!empty($stPermiteBloqueio)) {
                $coCriterio          = $this->getCoSeqCriterio();
            }

            $return[$coCriterio] = $coCriterio;
        }

        return $return;
    }

    public function getArrayBindModalidaadeCriterioStPossuiCategoria()
    {
        $return = array();
        if ($this->coModalidadeCriterio->count() < 1) {
            return $return;
        }

        foreach ($this->coModalidadeCriterio as $modalidadeCriterio) {
            $stPossuiCategoria   = $modalidadeCriterio->getStPossuiCategoria();
            $coCriterio          = NULL;

            if(!empty($stPossuiCategoria)) {
                $coCriterio          = $this->getCoSeqCriterio();
            }

            $return[$coCriterio] = $coCriterio;
        }

        return $return;
    }

    public function getArrayBindModalidaadeCriterioStNaoInformado()
    {
        $return = array();
        if ($this->coModalidadeCriterio->count() < 1) {
            return $return;
        }

        foreach ($this->coModalidadeCriterio as $modalidadeCriterio) {
            $stNaoInformado   = $modalidadeCriterio->getStNaoInformado();
            $coCriterio          = NULL;

            if(!empty($stNaoInformado)) {
                $coCriterio          = $this->getCoSeqCriterio();
            }

            $return[$coCriterio] = $coCriterio;
        }

        return $return;
    }
}
