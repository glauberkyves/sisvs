<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Apresentacao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_CO_AUTOR")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\CoAutorRepository")
 */
class CoAutorEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_CO_AUTOR", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_COAUTOR_COSEQCOAUTOR", allocationSize=1, initialValue=1)
     */
    private $coSeqCoAutor;
    /**
     * @var string
     * @Assert\NotBlank(message="coAutor.validations.co_autor.noBlankNoAutor")
     * @ORM\Column(name="NO_AUTOR", type="text", nullable=true)
     */
    private $noAutor;
    /**
     * @Assert\NotBlank(message="coAutor.validations.co_autor.noBlankNoInstituicao")
     * @var string
     * @ORM\Column(name="NO_INSTITUICAO", type="text", nullable=true)
     */
    private $noInstituicao;
    /**
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", inversedBy="coInscricao")
     * @ORM\JoinColumn(name="CO_INSCRICAO", referencedColumnName="CO_SEQ_INSCRICAO")
     **/
    private $coInscricao;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;

    public function __construct()
    {
        $this->coInscricao = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCoInscricao()
    {
        return $this->coInscricao;
    }

    /**
     * @param mixed $coInscricao
     */
    public function setCoInscricao($coInscricao)
    {
        $this->coInscricao = $coInscricao;
    }

    /**
     * @return int
     */
    public function getCoSeqCoAutor()
    {
        return $this->coSeqCoAutor;
    }

    /**
     * @param int $coSeqCoAutor
     */
    public function setCoSeqCoAutor($coSeqCoAutor)
    {
        $this->coSeqCoAutor = $coSeqCoAutor;
    }

    /**
     * @return string
     */
    public function getNoAutor()
    {
        return $this->noAutor;
    }

    /**
     * @param string $noAutor
     */
    public function setNoAutor($noAutor)
    {
        $this->noAutor = $noAutor;
    }

    /**
     * @return string
     */
    public function getNoInstituicao()
    {
        return $this->noInstituicao;
    }

    /**
     * @param string $noInstituicao
     */
    public function setNoInstituicao($noInstituicao)
    {
        $this->noInstituicao = $noInstituicao;
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

    public function __toString()
    {
        return $this->noAutor;
    }


}
