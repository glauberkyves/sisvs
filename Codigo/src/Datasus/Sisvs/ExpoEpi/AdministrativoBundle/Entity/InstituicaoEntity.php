<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_TIPO_INSTITUICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\InstituicaoRepository")
 */
class InstituicaoEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_TIPO_INSTITUICAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_TIPOINST_COSEQTIPOINST", allocationSize=1, initialValue=1)
     */
    private $coSeqInstituicao;
    /**
     * @var string
     * @Assert\Length(
     *  max = 60,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @Assert\NotBlank(message="administrativo.validations.instituicao.notBlank")
     * @ORM\Column(name="NO_TIPO_INSTITUICAO", type="text", nullable=true, length=60)
     */
    private $noInstituicao;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_TIPO_INSTITUICAO", type="text", nullable=true, length=500)
     */
    private $dsInstituicao;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeInstituicaoEntity", mappedBy="coInstituicao")
     **/
    private $coModalidadeIntituicao;

    public function __construct()
    {
        $this->modalidades = new ArrayCollection();
        $this->coInscricao = new ArrayCollection();
    }

    public function getCoSeqInstituicao()
    {
        return $this->coSeqInstituicao;
    }

    public function setCoSeqInstituicao($coSeqInstituicao)
    {
        $this->coSeqInstituicao = $coSeqInstituicao;
    }

    public function getDsInstituicao()
    {
        return $this->dsInstituicao;
    }

    public function setDsInstituicao($dsInstituicao)
    {
        $this->dsInstituicao = $dsInstituicao;
    }

    public function getNoInstituicao()
    {
        return $this->noInstituicao;
    }

    public function setNoInstituicao($noInstituicao)
    {
        $this->noInstituicao = $noInstituicao;
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
        if ($this->getCoModalidadeIntituicao()->count() < 1) {
            return $return;
        }

        foreach ($this->getCoModalidadeIntituicao() as $modalidadeInstituicao) {
            $coModalidade          = $modalidadeInstituicao->getCoModalidade()->getCoSeqModalidade();
            $return[$coModalidade] = $coModalidade;
        }

        return $return;
    }

    public function getCoModalidadeIntituicao()
    {
        return $this->coModalidadeIntituicao;
    }

    public function __toString()
    {
        return $this->noInstituicao;
    }
}
