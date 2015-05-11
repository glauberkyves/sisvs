<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * InscricaoEntity
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_INSCRICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\InscricaoRepository")
 */
class InscricaoEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_INSCRICAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_INSCRICAO_COSEQINSCRICAO", allocationSize=1, initialValue=1)
     */
    private $coSeqInscricao;
    /**
     * @var string
     * @ORM\Column(name="CO_INSCRICAO", type="string",length=9)
     */
    private $nuInscricao;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TemaEntity")
     * @ORM\JoinColumn(name="CO_TEMA", referencedColumnName="CO_SEQ_TEMA")
     */
    private $coTema;
    /**
     * @var string
     * @Assert\NotBlank(message="autor.validations.inscricao.stAutoria.notBlank")
     * @ORM\Column(name="ST_CO_AUTORIA", type="string", length=1)
     */
    private $stAutoria;
    /**
     * @var string
     * @ORM\Column(name="NO_ORIENTADOR", type="string")
     */
    private $noOrientador;
    /**
     * @var string
     * @ORM\Column(name="NO_CO_ORIENTADOR", type="string")
     */
    private $noCoOrientador;
    /**
     * @var string
     * @Assert\NotBlank(message="autor.validations.inscricao.dsTitulo.notBlank")
     * @ORM\Column(name="DS_TITULO", type="string")
     */
    private $dsTitulo;
    /**
     * @Assert\NotBlank(message="autor.validations.inscricao.dsResumo.notBlank")
     * @ORM\Column(name="DS_RESUMO", type="string")
     */
    private $dsResumo;
    /**
     * @Assert\NotBlank(message="autor.validations.inscricao.stVeracidade.notBlank")
     * @ORM\Column(name="ST_VERACIDADE", type="boolean", length=1)
     */
    private $stVeracidade;
    /**
     * @var string
     * @ORM\Column(name="DT_VERACIDADE", type="datetime")
     */
    private $dtVeracidade;
    /**
     * @var interger
     *
     * @Assert\Valid
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InstituicaoEntity", inversedBy="coInscricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_INSTITUICAO", referencedColumnName="CO_SEQ_INSTITUICAO")
     * })
     */
    private $coInstituicao;
    /**
     * @var interger
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\SituacaoInscricaoEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_SITUACAO_INSCRICAO", referencedColumnName="CO_SEQ_SITUACAO_INSCRICAO")
     * })
     */
    private $coSituacaoInscricao;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\HistoricoInscricaoEntity", mappedBy="coInscricao")
     */
    private $coHistorico;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\AnexoEntity", mappedBy="coInscricao")
     */
    private $coAnexo;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\CoAutorEntity", mappedBy="coInscricao")
     */
    private $coAutor;

		/**
     * @var integer
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoApresentacaoEntity", mappedBy="coInscricao")
     * @ORM\OrderBy({"nuOrdem" = "ASC"})
     */
    private $coInscricaoApresentacao;
    /**
     * @var interger
     *
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\Base\SecurityBundle\Entity\UsuarioEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_USUARIO", referencedColumnName="CO_SEQ_USUARIO")
     * })
     */
    private $coUsuario;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="DS_EMAIL_INSTITUCIONAL", type="string", length=100)
		 */
		private $dsEmailSecundario;

		/**
		 * @var float
		 *
		 * @ORM\Column(name="ST_ATIVO", type="string")
		 */
		private $stAtivo;

    public function __construct()
    {
        $this->coHistorico             = new ArrayCollection();
        $this->coAnexo                 = new ArrayCollection();
        $this->coInscricaoApresentacao = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getCoAnexo()
    {
        return $this->coAnexo;
    }

    /**
     * @param int $coAnexo
     */
    public function setCoAnexo($coAnexo)
    {
        $this->coAnexo = $coAnexo;
    }

    /**
     * @return int
     */
    public function getCoHistorico()
    {
        return $this->coHistorico;
    }

    /**
     * @param int $coHistorico
     */
    public function setCoHistorico($coHistorico)
    {
        $this->coHistorico = $coHistorico;
    }

    public function getCoInstituicao()
    {
        return $this->coInstituicao;
    }

    public function setCoInstituicao($coInstituicao)
    {
        $this->coInstituicao = $coInstituicao;
    }

    /**
     * @return int
     */
    public function getCoSeqInscricao()
    {
        return $this->coSeqInscricao;
    }

    /**
     * @param int $coSeqInscricao
     */
    public function setCoSeqInscricao($coSeqInscricao)
    {
        $this->coSeqInscricao = $coSeqInscricao;
    }

    public function getCoTema()
    {
        return $this->coTema;
    }

    /**
     * @param $coTema
     */
    public function setCoTema($coTema)
    {
        $this->coTema = $coTema;
    }

    /**
     * @return string
     */
    public function getDsResumo()
    {
        return $this->dsResumo;
    }

    /**
     * @param string $dsResumo
     */
    public function setDsResumo($dsResumo)
    {
        $this->dsResumo = $dsResumo;
    }

    /**
     * @return string
     */
    public function getDsTitulo()
    {
        return $this->dsTitulo;
    }

    /**
     * @param string $dsTitulo
     */
    public function setDsTitulo($dsTitulo)
    {
        $this->dsTitulo = $dsTitulo;
    }

    /**
     * @return string
     */
    public function getDtVeracidade()
    {
        return $this->dtVeracidade;
    }

    /**
     * @param string $dtVeracidade
     */
    public function setDtVeracidade($dtVeracidade)
    {
        $this->dtVeracidade = $dtVeracidade;
    }

    /**
     * @return string
     */
    public function getNoCoOrientador()
    {
        return $this->noCoOrientador;
    }

    /**
     * @param string $noCoOrientador
     */
    public function setNoCoOrientador($noCoOrientador)
    {
        $this->noCoOrientador = $noCoOrientador;
    }

    /**
     * @return string
     */
    public function getNoOrientador()
    {
        return $this->noOrientador;
    }

    /**
     * @param string $noOrientador
     */
    public function setNoOrientador($noOrientador)
    {
        $this->noOrientador = $noOrientador;
    }

    /**
     * @return string
     */
    public function getNuInscricao()
    {
        return $this->nuInscricao;
    }

    /**
     * @param string $nuInscricao
     */
    public function setNuInscricao($nuInscricao)
    {
        $this->nuInscricao = $nuInscricao;
    }

    /**
     * @return string
     */
    public function getStAutoria()
    {
        return $this->stAutoria;
    }

    /**
     * @param string $stAutoria
     */
    public function setStAutoria($stAutoria)
    {
        $this->stAutoria = $stAutoria;
    }

    /**
     * @return string
     */
    public function getStVeracidade()
    {
        return $this->stVeracidade;
    }

    /**
     * @param string $stVeracidade
     */
    public function setStVeracidade($stVeracidade)
    {
        $this->stVeracidade = $stVeracidade;
    }

    public function getCoSituacaoInscricao()
    {
        return $this->coSituacaoInscricao;
    }

    public function setCoSituacaoInscricao($coSituacaoInscricao)
    {
        $this->coSituacaoInscricao = $coSituacaoInscricao;
    }

    /**
     * @return mixed
     */
    public function getCoAutor()
    {
        return $this->coAutor;
    }

    /**
     * @param mixed $coAutor
     */
    public function setCoAutor($coAutor)
    {
        $this->coAutor = $coAutor;
    }

    /**
     * @return ArrayCollection
     */
    public function getCoInscricaoApresentacao()
    {
        return $this->coInscricaoApresentacao;
    }

    /**
     * @param int $coInscricaoApresentacao
     */
    public function setCoInscricaoApresentacao($coInscricaoApresentacao = null)
    {
        $this->coInscricaoApresentacao = $coInscricaoApresentacao;
    }

    public function getCoUsuario()
    {
        return $this->coUsuario;
    }

    public function setCoUsuario($coUsuario)
    {
        $this->coUsuario = $coUsuario;
    }

		/**
		 * @return string
		 */
		public function getDsEmailSecundario()
		{
				return $this->dsEmailSecundario;
		}

		/**
		 * @param string $dsEmailSecundario
		 */
		public function setDsEmailSecundario($dsEmailSecundario)
		{
				$this->dsEmailSecundario = $dsEmailSecundario;
		}

    public function __toString()
    {
        return $this->nuInscricao;
    }

		/**
		 * @return float
		 */
		public function getStAtivo()
		{
				return $this->stAtivo;
		}

		/**
		 * @param float $stAtivo
		 */
		public function setStAtivo($stAtivo)
		{
				$this->stAtivo = $stAtivo;
		}

}
