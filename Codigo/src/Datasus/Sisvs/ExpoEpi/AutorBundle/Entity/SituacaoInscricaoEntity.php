<?php

		namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

		use Datasus\Core\BaseBundle\Entity\AbstractBase;
		use Doctrine\ORM\Mapping as ORM;
		use Symfony\Component\Validator\Constraints as Assert;

		/**
		 * Area
		 *
		 * @ORM\Table(name="DBSISVS_TEMP_H.TB_SITUACAO_INSCRICAO")
		 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\SituacaoInscricaoRepository")
		 */
		class SituacaoInscricaoEntity extends AbstractBase
		{
				/**
				 * @var integer
				 *
				 * @ORM\Id
				 * @ORM\Column(name="CO_SEQ_SITUACAO_INSCRICAO", type="integer", nullable=true)
				 */
				private $coSituacao;
				/**
				 * @var string
				 * @ORM\Column(name="DS_SITUACAO_INSCRICAO", type="text", nullable=true)
				 */
				private $dsSituacao;

				/**
				 * @var string
				 * @ORM\Column(name="DS_SITUACAO_AUTOR", type="text", nullable=true)
				 */
				private $dsSituacaoAutor;

				/**
				 * @var string
				 *
				 * @ORM\Column(name="ST_ATIVO", type="string", length=1)
				 */
				private $stInscricao;

				/**
				 * @var integer
				 *
				 * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\HistoricoInscricaoEntity", mappedBy="coSituacaoInscricao")
				 */
				private $coHistorico;
				/**
				 * @var integer
				 *
				 * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", mappedBy="coSituacaoInscricao")
				 */
				private $coInscricao;

				public function __construct ()
				{
						$this->coHistorico = new ArrayCollection();
						$this->coInscricao = new ArrayCollection();
				}

				/**
				 * @return string
				 */
				public function getDsSituacao ()
				{
						return $this->dsSituacao;
				}

				/**
				 * @param string $StatusInscricao
				 */
				public function setDsSituacao ($StatusInscricao)
				{
						$this->dsSituacao = $StatusInscricao;
				}

				/**
				 * @return int
				 */
				public function getCoHistorico ()
				{
						return $this->coHistorico;
				}

				/**
				 * @param int $coHistorico
				 */
				public function setCoHistorico ($coHistorico)
				{
						$this->coHistorico = $coHistorico;
				}

				/**
				 * @return int
				 */
				public function getCoInscricao ()
				{
						return $this->coInscricao;
				}

				/**
				 * @param int $coInscricao
				 */
				public function setCoInscricao ($coInscricao)
				{
						$this->coInscricao = $coInscricao;
				}

				/**
				 * @return int
				 */
				public function getCoSituacao()
				{
						return $this->coSituacao;
				}

				/**
				 * @param int $coSituacao
				 */
				public function setCoSituacao($coSituacao)
				{
						$this->coSituacao = $coSituacao;
				}

				/**
				 * @param string $dsSituacaoAutor
				 */
				public function setDsSituacaoAutor ($dsSituacaoAutor)
				{
						$this->dsSituacaoAutor = $dsSituacaoAutor;
				}

				/**
				 * @return string
				 */
				public function getDsSituacaoAutor ()
				{
						return $this->dsSituacaoAutor;
				}

				/**
				 * @param string $stInscricao
				 */
				public function setStInscricao ($stInscricao)
				{
						$this->stInscricao = $stInscricao;
				}

				/**
				 * @return string
				 */
				public function getStInscricao ()
				{
						return $this->stInscricao;
				}

		}
