<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_INSTITUICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\InstituicaoRepository")
 */
class InstituicaoEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_INSTITUICAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_INSTITUIC_COSEQINSTITUICAO", allocationSize=1, initialValue=1)
     */
    private $coSeqInstituicao;
    /**
     * @var string
     * @Assert\NotBlank(message="autor.validations.instituicao.noInstituicao.notBlank")
     * @ORM\Column(name="NO_INSTITUICAO", type="text", nullable=true)
     */
    private $noInstituicao;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", mappedBy="coInstituicao")
     */
    private $coInscricao;
    /**
     * @var interger
     *
     * @Assert\Valid
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\InstituicaoEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_TIPO_INSTITUICAO", referencedColumnName="CO_SEQ_TIPO_INSTITUICAO")
     * })
     */
    private $coTipoInstituicao;
    /**
     * @var interger
     *
     * @Assert\Valid
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\MunicipioEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_MUNICIPIO_IBGE", referencedColumnName="CO_MUNICIPIO_IBGE")
     * })
     */
    private $coMunicipioIbge;
    /**
     *
     */
    private $coUfIbge;
    /*
     *
     */
    private $noRegiao;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_COMPLEMENTO", type="string", length=15)
     */
    private $dsComplemento;
    /**
     * @var string
     *
     * @Assert\NotBlank(message="autor.validations.instituicao.dsEndereco.notBlank")
     * @ORM\Column(name="DS_ENDERECO", type="string", length=100)
     */
    private $dsEndereco;
    /**
     * @var string
     *
     * @Assert\NotBlank(message="autor.validations.instituicao.noBairro.notBlank")
     * @ORM\Column(name="NO_BAIRRO", type="string", length=30)
     */
    private $noBairro;
    /**
     * @var string
     *
     * @Assert\NotBlank(message="autor.validations.instituicao.nuCep.notBlank")
     * @ORM\Column(name="NU_CEP", type="string", length=6)
     */
    private $nuCep;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_FAX", type="string", length=15)
     */
    private $nuFax;
    /**
     * @var string
     *
     * @Assert\NotBlank(message="autor.validations.instituicao.nuTelefone.notBlank")
     * @ORM\Column(name="NU_TELEFONE", type="string", length=15)
     */
    private $nuTelefone;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=2)
     */
    private $sgUf;

    public function __construct()
    {
        $this->modalidades = new ArrayCollection();
    }

    public function getCoSeqInstituicao()
    {
        return $this->coSeqInstituicao;
    }

    public function setCoSeqInstituicao($coSeqInstituicao)
    {
        $this->coSeqInstituicao = $coSeqInstituicao;
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

    /**
     * @return \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger
     */
    public function getCoTipoInstituicao()
    {
        return $this->coTipoInstituicao;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger $coTipoInstituicao
     */
    public function setCoTipoInstituicao($coTipoInstituicao)
    {
        $this->coTipoInstituicao = $coTipoInstituicao;
    }

    /**
     * @return \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger
     */
    public function getCoMunicipioIbge()
    {
        return $this->coMunicipioIbge;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\interger $coMunicipioIbge
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {
        $this->coMunicipioIbge = $coMunicipioIbge;
    }

    public function __toString()
    {
        return $this->noInstituicao;
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
     * @return string
     */
    public function getDsComplemento()
    {
        return $this->dsComplemento;
    }

    /**
     * @param string $dsComplemento
     */
    public function setDsComplemento($dsComplemento)
    {
        $this->dsComplemento = $dsComplemento;
    }

    /**
     * @return string
     */
    public function getDsEndereco()
    {
        return $this->dsEndereco;
    }

    /**
     * @param string $dsEndereco
     */
    public function setDsEndereco($dsEndereco)
    {
        $this->dsEndereco = $dsEndereco;
    }

    /**
     * @return string
     */
    public function getNoBairro()
    {
        return $this->noBairro;
    }

    /**
     * @param string $noBairro
     */
    public function setNoBairro($noBairro)
    {
        $this->noBairro = $noBairro;
    }

    /**
     * @return string
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * @param string $nuCep
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
    }

    /**
     * @return string
     */
    public function getNuFax()
    {
        return $this->nuFax;
    }

    /**
     * @param string $nuFax
     */
    public function setNuFax($nuFax)
    {
        $this->nuFax = $nuFax;
    }

    /**
     * @return string
     */
    public function getNuTelefone()
    {
        return $this->nuTelefone;
    }

    /**
     * @param string $nuTelefone
     */
    public function setNuTelefone($nuTelefone)
    {
        $this->nuTelefone = $nuTelefone;
    }

    /**
     * @return string
     */
    public function getSgUf()
    {
        return $this->sgUf;
    }

    /**
     * @param string $sgUf
     */
    public function setSgUf($sgUf)
    {
        $this->sgUf = $sgUf;
    }

    /**
     * @return mixed
     */
    public function getCoUfIbge()
    {
        return $this->coUfIbge;
    }

    /**
     * @param mixed $coUfIbge
     */
    public function setCoUfIbge($coUfIbge)
    {
        $this->coUfIbge = $coUfIbge;
    }

    /**
     * @return mixed
     */
    public function getNoRegiao()
    {
        return $this->noRegiao;
    }

    /**
     * @param mixed $noRegiao
     */
    public function setNoRegiao($noRegiao)
    {
        $this->noRegiao = $noRegiao;
    }

}
