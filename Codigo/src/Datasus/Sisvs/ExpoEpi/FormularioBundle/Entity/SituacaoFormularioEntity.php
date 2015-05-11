<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SituacaoFormulario
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_SITUACAO_FORMULARIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\FormularioBundle\Repository\SituacaoFormularioRepository")
 */
class SituacaoFormularioEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SITUACAO_FORMULARIO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_CRITERIO_COSEQCRITERIO", allocationSize=1, initialValue=1)
     */
    private $coSituacaoFormulario;
    /**
     * @var string
     * @ORM\Column(name="DS_SITUACAO_FORMULARIO", type="text", nullable=true)
     */
    private $dsSituacaoFormulario;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity", mappedBy="coSituacaoFormulario")
     */
    private $coFormularioInscricao;

		/**
		 * @var string
		 * @ORM\Column(name="ST_ATIVO", type="text", nullable=true)
		 */
		private $stAtivo;

    /**
     * @param int $coSituacaoFormulario
     */
    public function setCoSituacaoFormulario($coSituacaoFormulario)
    {
        $this->coSituacaoFormulario = $coSituacaoFormulario;
    }

    /**
     * @return int
     */
    public function getCoSituacaoFormulario()
    {
        return $this->coSituacaoFormulario;
    }

    /**
     * @param string $dsSituacaoFormulario
     */
    public function setDsSituacaoFormulario($dsSituacaoFormulario)
    {
        $this->dsSituacaoFormulario = $dsSituacaoFormulario;
    }

    /**
     * @return string
     */
    public function getDsSituacaoFormulario()
    {
        return $this->dsSituacaoFormulario;
    }

    /**
     * @param int $coFormularioInscricao
     */
    public function setCoFormularioInscricao($coFormularioInscricao)
    {
        $this->coFormularioInscricao = $coFormularioInscricao;
    }

    /**
     * @return int
     */
    public function getCoFormularioInscricao()
    {
        return $this->coFormularioInscricao;
    }

		/**
		 * @return string
		 */
		public function getStAtivo()
		{
				return $this->stAtivo;
		}

		/**
		 * @param string $stAtivo
		 */
		public function setStAtivo($stAtivo)
		{
				$this->stAtivo = $stAtivo;
		}

}
