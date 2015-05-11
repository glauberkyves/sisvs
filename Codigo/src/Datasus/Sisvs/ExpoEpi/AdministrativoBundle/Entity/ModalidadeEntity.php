<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Modalidade
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_MODALIDADE")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\ModalidadeRepository")
 */
class ModalidadeEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_MODALIDADE", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_MODALIDADE_COSEQMODALIDADE", allocationSize=1, initialValue=1)
     */
    private $coSeqModalidade;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\EventoEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_EVENTO", referencedColumnName="CO_SEQ_EVENTO")
     * })
     */
    private $coEvento;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeApresentacaoEntity", mappedBy="coModalidade")
		 * @ORM\OrderBy({"nuOrdem" = "asc"})
     */
    private $coModalidadeApresentacao;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeCriterioEntity", mappedBy="coModalidade")
     */
    private $coModalidadeCriterio;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeInstituicaoEntity", mappedBy="coModalidade")
     */
    private $coModalidadeInstituicao;
    /**
     * @var integer
     *
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeCriterioEntity", mappedBy="coModalidade")
     */
    private $coCriterio;
    /**
     * @var string
     * @Assert\Length(
     *  max = 60,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @Assert\NotBlank(message="administrativo.validations.modalidade.notBlank")
     * @ORM\Column(name="NO_MODALIDADE", type="string", length=60)
     */
    private $noModalidade;
    /**
     * @var string
     * @ORM\Column(name="DS_MODALIDADE", type="string", length=500)
     */
    private $dsModalidade;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_ATIVO", type="string", length=1)
     */
    private $stAtivo;
		/**
		 * @var string
		 *
		 * @ORM\Column(name="ST_OCULTAR_MODALIDADE", type="string", length=1)
		 */
		private $stOcultaDados;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TipoModalidadeEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_TIPO_MODALIDADE", referencedColumnName="CO_SEQ_TIPO_MODALIDADE")
     * })
     */
    private $coTipoModalidade;
    /**
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity", mappedBy="coModalidade")
     */
    private $coFormularioDeInscricao;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\AreaEntity", mappedBy="coModalidade")
     * @ORM\OrderBy({"coSeqArea" = "ASC"})
     */
    private $coArea;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_POSSUI_ORIENTADOR", type="string", length=1)
     */
    private $stPossuiOrientador;
    /**
     * @var string
     * @ORM\Column(name="ST_OBRIGATORIEDADE_ANEXO", type="string", length=1)
     */
    private $stExigeAnexo;

    public function __construct()
    {
        $this->coModalidadeApresentacao = new ArrayCollection();
        $this->coModalidadeInstituicao  = new ArrayCollection();
        $this->coModalidadeCriterio     = new ArrayCollection();

        $this->coArea                  = new ArrayCollection();
    }

    /**
     * Get coSeqModalidade
     *
     * @return integer jquey
     */
    public function getCoSeqModalidade()
    {
        return $this->coSeqModalidade;
    }

    /**
     * Set coSeqModalidade
     *
     * @param integer $coSeqModalidade
     *
     * @return Modalidade
     */
    public function setCoSeqModalidade($coSeqModalidade)
    {
        $this->coSeqModalidade = $coSeqModalidade;

        return $this;
    }

    /**
     * Get coEvento
     *
     * @return integer
     */
    public function getCoEvento()
    {
        return $this->coEvento;
    }

    /**
     * Set coEvento
     *
     * @param integer $coEvento
     *
     * @return Modalidade
     */
    public function setCoEvento($coEvento)
    {
        $this->coEvento = $coEvento;

        return $this;
    }

    /**
     * Get noModalidade
     *
     * @return string
     */
    public function getNoModalidade()
    {
        return $this->noModalidade;
    }

    /**
     * Set noModalidade
     *
     * @param string $noModalidade
     *
     * @return Modalidade
     */
    public function setNoModalidade($noModalidade)
    {
        $this->noModalidade = $noModalidade;

        return $this;
    }

    /**
     * Get dsModalidade
     *
     * @return string
     */
    public function getDsModalidade()
    {
        return $this->dsModalidade;
    }

    /**
     * Set dsModalidade
     *
     * @param string $dsModalidade
     *
     * @return Modalidade
     */
    public function setDsModalidade($dsModalidade)
    {
        $this->dsModalidade = $dsModalidade;

        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return string
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * Set stAtivo
     *
     * @param string $stAtivo
     *
     * @return Modalidade
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;

        return $this;
    }

    /**
     * @return int
     */
    public function getCoCriterio()
    {
        return $this->coCriterio;
    }

    /**
     * @param int $coCriterio
     */
    public function setCoCriterio($coCriterio)
    {
        $this->coCriterio = $coCriterio;
    }

    public function __toString()
    {
        return $this->noModalidade;
    }

    /**
     * @return int
     */
    public function getCoModalidadeApresentacao()
    {
        return $this->coModalidadeApresentacao;
    }

    /**
     * @param int $coModalidadeApresentacao
     */
    public function setCoModalidadeApresentacao($coModalidadeApresentacao)
    {
        $this->coModalidadeApresentacao = $coModalidadeApresentacao;
    }

    /**
     * @return int
     */
    public function getCoModalidadeInstituicao()
    {
        return $this->coModalidadeInstituicao;
    }

    /**
     * @param int $coModalidadeInstituicao
     */
    public function setCoModalidadeInstituicao($coModalidadeInstituicao)
    {
        $this->coModalidadeInstituicao = $coModalidadeInstituicao;
    }

    /**
     * @return int
     */
    public function getCoModalidadeCriterio()
    {
        return $this->coModalidadeCriterio;
    }

    /**
     * @param int $coModalidadeCriterio
     */
    public function setCoModalidadeCriterio($coModalidadeCriterio)
    {
        $this->coModalidadeCriterio = $coModalidadeCriterio;
    }

    /**
     * @return mixed
     */
    public function getCoTipoModalidade()
    {
        return $this->coTipoModalidade;
    }

    /**
     * @param mixed $coTipoModalidade
     */
    public function setCoTipoModalidade($coTipoModalidade)
    {
        $this->coTipoModalidade = $coTipoModalidade;
    }

    /**
     * @return mixed
     */
    public function getStPossuiOrientador()
    {
        return $this->stPossuiOrientador;
    }

    /**
     * @param mixed $stPossuiOrientador
     */
    public function setStPossuiOrientador($stPossuiOrientador)
    {
        $this->stPossuiOrientador = $stPossuiOrientador;
    }

    /**
     * @return mixed
     */
    public function getCoFormularioDeInscricao()
    {
        return $this->coFormularioDeInscricao;
    }

    /**
     * @param mixed $coFormularioDeInscricao
     */
    public function setCoFormularioDeInscricao($coFormularioDeInscricao)
    {
        $this->coFormularioDeInscricao = $coFormularioDeInscricao;
    }



    /**
     * @return mixed
     */

    public function getCoArea()
    {
        return $this->coArea;
    }

    /**
     * @param mixed $coAreaModalidade
     */

    public function setCoArea($coArea)
    {
        $this->coArea = $coArea;
    }

    /**
     * @param string $stExigeAnexo
     */
    public function setStExigeAnexo($stExigeAnexo)
    {
        $this->stExigeAnexo = $stExigeAnexo;
    }

    /**
     * @return string
     */
    public function getStExigeAnexo()
    {
        return $this->stExigeAnexo;
    }
		/**
		 * @return string
		 */
		public function getStOcultaDados()
		{
				return $this->stOcultaDados;
		}

		/**
		 * @param string $stOcultaDados
		 */
		public function setStOcultaDados($stOcultaDados)
		{
				$this->stOcultaDados = $stOcultaDados;
		}
}