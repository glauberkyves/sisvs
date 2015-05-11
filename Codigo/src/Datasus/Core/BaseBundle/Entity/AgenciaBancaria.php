<?php

namespace Datasus\Sgp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgenciaBancaria
 *
 * @ORM\Table(name="DBGERAL.TB_AGENCIA_BANCARIA")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\AgenciaBancaria")

 */
class AgenciaBancaria extends \Datasus\Sgp\CoreBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_AGENCIA_BANCARIA", type="string", length=6, nullable=false)
     * @ORM\Id
     */
    private $coAgenciaBancaria;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_BANCO", type="string", length=3, nullable=false)
     */
    private $coBanco;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_AGENCIA", type="string", length=50, nullable=false)
     */
    private $noAgencia;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_ENDERECO", type="string", length=100, nullable=true)
     */
    private $dsEndereco;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_BAIRRO", type="string", length=50, nullable=true)
     */
    private $noBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_CEP", type="string", length=8, nullable=true)
     */
    private $nuCep;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD", type="string", length=4, nullable=true)
     */
    private $nuDdd;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_TELEFONE", type="string", length=18, nullable=true)
     */
    private $nuTelefone;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=true)
     */
    private $stRegistroAtivo;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_IBGE", type="string", length=6, nullable=true)
     */
    private $coMunicipioIbge;

    /**
     * @var string
     *
     * @ORM\Column(name="TP_AGENCIA", type="string", length=30, nullable=true)
     */
    private $tpAgencia;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_PERFIL_AGENCIA", type="string", length=40, nullable=true)
     */
    private $dsPerfilAgencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_CRIACAO", type="datetime", nullable=true)
     */
    private $dtCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_ATUALIZACAO", type="datetime", nullable=true)
     */
    private $dtAtualizacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_RECEBIMENTO_DOC", type="datetime", nullable=true)
     */
    private $dtRecebimentoDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_EMAIL_AGENCIA_BANCARIA", type="string", length=60, nullable=true)
     */
    private $dsEmailAgenciaBancaria;

	/**
	 * Get coAgenciaBancaria
	 *
	 * @return integer
	 */
	public function getCoAgenciaBancaria() {
		return $this->coAgenciaBancaria;
	}

	/**
	 * Set $coAgenciaBancaria
	 *
	 * @param  $coAgenciaBancaria
	 * @return AgenciaBancaria
	 */
	public function setCoAgenciaBancaria( $coAgenciaBancaria) {
		$this->coAgenciaBancaria = $coAgenciaBancaria;
		return $this;
	}

	/**
	 * Get coBanco
	 *
	 * @return string
	 */
	public function getCoBanco() {
		return $this->coBanco;
	}

	/**
	 * Set $coBanco
	 *
	 * @param string $coBanco
	 * @return AgenciaBancaria
	 */
	public function setCoBanco(string $coBanco) {
		$this->coBanco = $coBanco;
		return $this;
	}

	/**
	 * Get noAgencia
	 *
	 * @return string
	 */
	public function getNoAgencia() {
		return $this->noAgencia;
	}

	/**
	 * Set $noAgencia
	 *
	 * @param string $noAgencia
	 * @return AgenciaBancaria
	 */
	public function setNoAgencia(string $noAgencia) {
		$this->noAgencia = $noAgencia;
		return $this;
	}

	/**
	 * Get dsEndereco
	 *
	 * @return string
	 */
	public function getDsEndereco() {
		return $this->dsEndereco;
	}

	/**
	 * Set $dsEndereco
	 *
	 * @param string $dsEndereco
	 * @return AgenciaBancaria
	 */
	public function setDsEndereco(string $dsEndereco) {
		$this->dsEndereco = $dsEndereco;
		return $this;
	}

	/**
	 * Get noBairro
	 *
	 * @return string
	 */
	public function getNoBairro() {
		return $this->noBairro;
	}

	/**
	 * Set $noBairro
	 *
	 * @param string $noBairro
	 * @return AgenciaBancaria
	 */
	public function setNoBairro(string $noBairro) {
		$this->noBairro = $noBairro;
		return $this;
	}

	/**
	 * Get nuCep
	 *
	 * @return string
	 */
	public function getNuCep() {
		return $this->nuCep;
	}

	/**
	 * Set $nuCep
	 *
	 * @param string $nuCep
	 * @return AgenciaBancaria
	 */
	public function setNuCep(string $nuCep) {
		$this->nuCep = $nuCep;
		return $this;
	}

	/**
	 * Get nuDdd
	 *
	 * @return string
	 */
	public function getNuDdd() {
		return $this->nuDdd;
	}

	/**
	 * Set $nuDdd
	 *
	 * @param string $nuDdd
	 * @return AgenciaBancaria
	 */
	public function setNuDdd(string $nuDdd) {
		$this->nuDdd = $nuDdd;
		return $this;
	}

	/**
	 * Get nuTelefone
	 *
	 * @return string
	 */
	public function getNuTelefone() {
		return $this->nuTelefone;
	}

	/**
	 * Set $nuTelefone
	 *
	 * @param string $nuTelefone
	 * @return AgenciaBancaria
	 */
	public function setNuTelefone(string $nuTelefone) {
		$this->nuTelefone = $nuTelefone;
		return $this;
	}

	/**
	 * Get stRegistroAtivo
	 *
	 * @return string
	 */
	public function getStRegistroAtivo() {
		return $this->stRegistroAtivo;
	}

	/**
	 * Set $stRegistroAtivo
	 *
	 * @param string $stRegistroAtivo
	 * @return AgenciaBancaria
	 */
	public function setStRegistroAtivo(string $stRegistroAtivo) {
		$this->stRegistroAtivo = $stRegistroAtivo;
		return $this;
	}

	/**
	 * Get coMunicipioIbge
	 *
	 * @return string
	 */
	public function getCoMunicipioIbge() {
		return $this->coMunicipioIbge;
	}

	/**
	 * Set $coMunicipioIbge
	 *
	 * @param string $coMunicipioIbge
	 * @return AgenciaBancaria
	 */
	public function setCoMunicipioIbge(string $coMunicipioIbge) {
		$this->coMunicipioIbge = $coMunicipioIbge;
		return $this;
	}

	/**
	 * Get tpAgencia
	 *
	 * @return string
	 */
	public function getTpAgencia() {
		return $this->tpAgencia;
	}

	/**
	 * Set $tpAgencia
	 *
	 * @param string $tpAgencia
	 * @return AgenciaBancaria
	 */
	public function setTpAgencia(string $tpAgencia) {
		$this->tpAgencia = $tpAgencia;
		return $this;
	}

	/**
	 * Get dsPerfilAgencia
	 *
	 * @return string
	 */
	public function getDsPerfilAgencia() {
		return $this->dsPerfilAgencia;
	}

	/**
	 * Set $dsPerfilAgencia
	 *
	 * @param string $dsPerfilAgencia
	 * @return AgenciaBancaria
	 */
	public function setDsPerfilAgencia(string $dsPerfilAgencia) {
		$this->dsPerfilAgencia = $dsPerfilAgencia;
		return $this;
	}

	/**
	 * Get dtCriacao
	 *
	 * @return DateTime
	 */
	public function getDtCriacao() {
		return $this->dtCriacao;
	}

	/**
	 * Set $dtCriacao
	 *
	 * @param \DateTime $dtCriacao
	 * @return AgenciaBancaria
	 */
	public function setDtCriacao(\DateTime $dtCriacao) {
		$this->dtCriacao = $dtCriacao;
		return $this;
	}

	/**
	 * Get dtAtualizacao
	 *
	 * @return DateTime
	 */
	public function getDtAtualizacao() {
		return $this->dtAtualizacao;
	}

	/**
	 * Set $dtAtualizacao
	 *
	 * @param \DateTime $dtAtualizacao
	 * @return AgenciaBancaria
	 */
	public function setDtAtualizacao(\DateTime $dtAtualizacao) {
		$this->dtAtualizacao = $dtAtualizacao;
		return $this;
	}

	/**
	 * Get dtRecebimentoDoc
	 *
	 * @return DateTime
	 */
	public function getDtRecebimentoDoc() {
		return $this->dtRecebimentoDoc;
	}

	/**
	 * Set $dtRecebimentoDoc
	 *
	 * @param \DateTime $dtRecebimentoDoc
	 * @return AgenciaBancaria
	 */
	public function setDtRecebimentoDoc(\DateTime $dtRecebimentoDoc) {
		$this->dtRecebimentoDoc = $dtRecebimentoDoc;
		return $this;
	}

	/**
	 * Get dsEmailAgenciaBancaria
	 *
	 * @return string
	 */
	public function getDsEmailAgenciaBancaria() {
		return $this->dsEmailAgenciaBancaria;
	}

	/**
	 * Set $dsEmailAgenciaBancaria
	 *
	 * @param string $dsEmailAgenciaBancaria
	 * @return AgenciaBancaria
	 */
	public function setDsEmailAgenciaBancaria(string $dsEmailAgenciaBancaria) {
		$this->dsEmailAgenciaBancaria = $dsEmailAgenciaBancaria;
		return $this;
	}

}