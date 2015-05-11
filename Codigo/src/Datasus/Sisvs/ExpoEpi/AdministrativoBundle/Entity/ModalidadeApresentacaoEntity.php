<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ModalidadeInstituicao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.RL_MODALIDADE_APRESENTACAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\ModalidadeApresentacaoRepository")
 */
class ModalidadeApresentacaoEntity extends AbstractBase
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity", inversedBy="coModalidadeApresentacao")
     * @ORM\JoinColumn(name="CO_MODALIDADE", referencedColumnName="CO_SEQ_MODALIDADE")
     */

    private $coModalidade;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ApresentacaoEntity")
     * @ORM\JoinColumn(name="CO_APRESENTACAO", referencedColumnName="CO_SEQ_APRESENTACAO")
     */
    private $coApresentacao;

		/**
		 * @var string
		 * @ORM\Column(name="NU_ORDEM", type="string", nullable=true, length=500)
		 */
		private $nuOrdem;

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
    public function getCoApresentacao()
    {
        return $this->coApresentacao;
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

}
