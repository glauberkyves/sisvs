<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Inscrição Apresentação
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.RL_INSCRICAO_APRESENTACAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\InscricaoApresentacaoRepository")
 */
class InscricaoApresentacaoEntity extends AbstractBase
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", inversedBy="coInscricaoApresentacao")
     * @ORM\JoinColumn(name="CO_INSCRICAO", referencedColumnName="CO_SEQ_INSCRICAO")
     * @ORM\OrderBy({"nuOrdem" = "ASC"})
     */

    private $coInscricao;
    /**
     * @var integer
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ApresentacaoEntity")
     * @ORM\JoinColumn(name="CO_APRESENTACAO", referencedColumnName="CO_SEQ_APRESENTACAO")
     * @ORM\OrderBy({"nuOrdem" = "ASC"})
     */
    private $coApresentacao;
    /**
     * @var string
     * @ORM\Column(name="DS_APRESENTACAO", type="text", nullable=true)
     */
    private $dsApresentacao;

		/**
		 * @var string
		 * @ORM\Column(name="NU_ORDEM", type="string", nullable=true, length=500)
		 */
		private $nuOrdem;

		/**
		 * @var float
		 *
		 * @ORM\Column(name="ST_ATIVO", type="string")
		 */
		private $stAtivo;

    /**
     * @return int
     */
    public function getCoApresentacao()
    {
        return $this->coApresentacao;
    }

    /**
     * @param int $coApresentacao
     */
    public function setCoApresentacao($coApresentacao)
    {
        $this->coApresentacao = $coApresentacao;
    }

    /**
     * @return int
     */
    public function getCoInscricao()
    {
        return $this->coInscricao;
    }

    /**
     * @param int $coInscricao
     */
    public function setCoInscricao($coInscricao)
    {
        $this->coInscricao = $coInscricao;
    }

    /**
     * @return string
     */
    public function getDsApresentacao()
    {
        return $this->dsApresentacao;
    }

    /**
     * @param string $dsApresentacao
     */
    public function setDsApresentacao($dsApresentacao)
    {
        $this->dsApresentacao = $dsApresentacao;
    }

		/**
		 * @return string
		 */
		public function getNuOrdem()
		{
				return $this->nuOrdem;
		}

		/**
		 * @param string $nuOrdem
		 */
		public function setNuOrdem($nuOrdem)
		{
				$this->nuOrdem = $nuOrdem;
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
