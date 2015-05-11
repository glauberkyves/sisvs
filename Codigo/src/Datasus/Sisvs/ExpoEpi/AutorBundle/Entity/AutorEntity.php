<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

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
class AutorEntity extends AbstractBase
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
     *
     * @Assert\NotBlank(message="administrativo.validations.apresentacao.notBlank")
     * @ORM\Column(name="NO_APRESENTACAO", type="text", nullable=true)
     */
    private $noApresentacao;
    /**
     * @var string
     * @ORM\Column(name="DS_APRESENTACAO", type="text", nullable=true)
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

    public function __construct()
    {
        $this->modalidades = new ArrayCollection();
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
}
