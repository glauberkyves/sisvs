<?php

namespace Datasus\Sgp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="DBGERAL.TB_CARGO")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Cargo")

 */
class Cargo extends \Datasus\Sgp\CoreBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_CARGO", type="integer", nullable=false)
     * @ORM\Id
     */
    private $coSeqCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_CARGO", type="string", length=50, nullable=true)
     */
    private $dsCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_TRATAMENTO", type="string", length=30, nullable=true)
     */
    private $dsTratamento;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_TRATAMENTO_FEM", type="string", length=30, nullable=true)
     */
    private $dsTratamentoFem;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_CARGO_FEM", type="string", length=50, nullable=true)
     */
    private $dsCargoFem;

	/**
	 * Get coSeqCargo
	 *
	 * @return integer
	 */
	public function getCoSeqCargo() {
		return $this->coSeqCargo;
	}

	/**
	 * Set $coSeqCargo
	 *
	 * @param  $coSeqCargo
	 * @return Cargo
	 */
	public function setCoSeqCargo( $coSeqCargo) {
		$this->coSeqCargo = $coSeqCargo;
		return $this;
	}

	/**
	 * Get dsCargo
	 *
	 * @return string
	 */
	public function getDsCargo() {
		return $this->dsCargo;
	}

	/**
	 * Set $dsCargo
	 *
	 * @param string $dsCargo
	 * @return Cargo
	 */
	public function setDsCargo(string $dsCargo) {
		$this->dsCargo = $dsCargo;
		return $this;
	}

	/**
	 * Get dsTratamento
	 *
	 * @return string
	 */
	public function getDsTratamento() {
		return $this->dsTratamento;
	}

	/**
	 * Set $dsTratamento
	 *
	 * @param string $dsTratamento
	 * @return Cargo
	 */
	public function setDsTratamento(string $dsTratamento) {
		$this->dsTratamento = $dsTratamento;
		return $this;
	}

	/**
	 * Get dsTratamentoFem
	 *
	 * @return string
	 */
	public function getDsTratamentoFem() {
		return $this->dsTratamentoFem;
	}

	/**
	 * Set $dsTratamentoFem
	 *
	 * @param string $dsTratamentoFem
	 * @return Cargo
	 */
	public function setDsTratamentoFem(string $dsTratamentoFem) {
		$this->dsTratamentoFem = $dsTratamentoFem;
		return $this;
	}

	/**
	 * Get dsCargoFem
	 *
	 * @return string
	 */
	public function getDsCargoFem() {
		return $this->dsCargoFem;
	}

	/**
	 * Set $dsCargoFem
	 *
	 * @param string $dsCargoFem
	 * @return Cargo
	 */
	public function setDsCargoFem(string $dsCargoFem) {
		$this->dsCargoFem = $dsCargoFem;
		return $this;
	}



}