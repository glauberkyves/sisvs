<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Apresentacao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_APRESENTACAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\ApresentacaoRepository")
 */
class ApresentacaoEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_APRESENTACAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_APRESENTACAO_COSEQAPRESENTA", allocationSize=1, initialValue=1)
     */
    private $coSeqApresentacao;
    /**
     * @var string
     * @Assert\Length(
     *  max = 100,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @Assert\NotBlank(message="administrativo.validations.apresentacao.notBlank")
     * @ORM\Column(name="NO_APRESENTACAO", type="text", nullable=true, length=100)
     */
    private $noApresentacao;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_APRESENTACAO", type="text", nullable=true, length=500)
     */
    private $dsApresentacao;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeApresentacaoEntity", mappedBy="coApresentacao")
     **/
    private $coModalidadeApresentacao;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoApresentacaoEntity", mappedBy="coApresentacao")
     **/
    private $coInscricaoApresentacao;

    public function __construct()
    {
        $this->modalidades             = new ArrayCollection();
        $this->coModalidadeApresentaca = new ArrayCollection();
        $this->coInscricaoApresentacao = new ArrayCollection();
    }

    public function getCoSeqApresentacao()
    {
        return $this->coSeqApresentacao;
    }

    public function setCoSeqApresentacao($coSeqApresentacao)
    {
        $this->coSeqApresentacao = $coSeqApresentacao;
    }

    public function getNoApresentacao()
    {
        return $this->noApresentacao;
    }

    public function setNoApresentacao($noApresentacao)
    {
        $this->noApresentacao = $noApresentacao;
    }

    public function getDsApresentacao()
    {
        return $this->dsApresentacao;
    }

    public function setDsApresentacao($dsApresentacao)
    {
        $this->dsApresentacao = $dsApresentacao;
    }

    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
    }

    public function getArrayCoModalidade()
    {
        $return = array();
        if ($this->getCoModalidadeApresentacao()->count() < 1) {
            return $return;
        }

        foreach ($this->getCoModalidadeApresentacao() as $modalidadeApresentacao) {
            $coModalidade          = $modalidadeApresentacao->getCoModalidade()->getCoSeqModalidade();
            $return[$coModalidade] = $coModalidade;
        }

        return $return;
    }

    public function getCoModalidadeApresentacao()
    {
        return $this->coModalidadeApresentacao;
    }

    /**
     * @return mixed
     */
    public function getCoInscricaoApresentacao()
    {
        return $this->coInscricaoApresentacao;
    }

    /**
     * @param mixed $coInscricaoApresentacao
     */
    public function setCoInscricaoApresentacao($coInscricaoApresentacao)
    {
        $this->coInscricaoApresentacao = $coInscricaoApresentacao;
    }

    public function __toString()
    {
        return $this->noApresentacao;
    }

}
