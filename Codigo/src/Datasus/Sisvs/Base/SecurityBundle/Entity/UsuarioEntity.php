<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="DBSCPA.VW_USUARIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\Base\SecurityBundle\Repository\UsuarioRepository")
 */
class UsuarioEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_USUARIO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $coSeqUsuario;
    /**
     * @var string
     *
     * @ORM\Column(name="NO_USUARIO", type="string", length=70)
     */
    private $noUsuario;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_CPF_USUARIO", type="string", length=11)
     */
    private $coCpfUsuario;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_MUNICIPIO_IBGE", type="string", length=26)
     */
    private $coMunicipioIbge;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PAIS", type="integer")
     */
    private $coPais;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_RACA_COR", type="string", length=2)
     */
    private $coRacaCor;
    /**
     * @var string
     *
     * @ORM\Column(name="CO_SEXO", type="string", length=2)
     */
    private $coSexo;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_BAIRRO", type="string", length=100)
     */
    private $dsBairro;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_CARGO", type="string", length=50)
     */
    private $dsCargo;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_EMAIL", type="string", length=100)
     */
    private $dsEmail;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_LOGRADOURO", type="string", length=100)
     */
    private $dsLogradouro;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_LOGRADOURO_COMPLEMENTO", type="string", length=100)
     */
    private $dsLogradouroComplemento;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_ORGAO_UNIDADE", type="string", length=100)
     */
    private $dsOrgaoUnidade;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_RACA_COR", type="string", length=25)
     */
    private $dsRacaCor;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_SENHA", type="string", length=100)
     */
    private $dsSenha;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CELULAR", type="string", length=10)
     */
    private $nuCelular;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CEP", type="string", length=8)
     */
    private $nuCep;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_CNS", type="string", length=15)
     */
    private $nuCns;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD_CELULAR", type="string", length=4)
     */
    private $nuDddCelular;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD_FAX", type="string", length=4)
     */
    private $nuDddFax;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDD_FONE", type="string", length=4)
     */
    private $nuDddFone;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_DDI", type="string", length=4)
     */
    private $nuDdi;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_FAX", type="string", length=15)
     */
    private $nuFax;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_FONE", type="string", length=8)
     */
    private $nuFone;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_PASSAPORTE", type="string", length=30)
     */
    private $nuPassaporte;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_RAMAL", type="string", length=4)
     */
    private $nuRamal;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_UF", type="string", length=4)
     */
    private $sgUf;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1)
     */
    private $stRegistroAtivo;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\Base\SecurityBundle\Entity\UsuarioSCPAEntity", mappedBy="coUsuario")
     */
    private $coUsuarioSCPA;
    /**
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", mappedBy="coUsuario")
     */
    private $coInscricao;

    /**
     * @return string
     */
    public function getCoCpfUsuario()
    {
        return $this->coCpfUsuario;
    }

    /**
     * @param string $coCpfUsuario
     */
    public function setCoCpfUsuario($coCpfUsuario)
    {
        $this->coCpfUsuario = $coCpfUsuario;
    }

    /**
     * @return string
     */
    public function getCoMunicipioIbge()
    {
        return $this->coMunicipioIbge;
    }

    /**
     * @param string $coMunicipioIbge
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {
        $this->coMunicipioIbge = $coMunicipioIbge;
    }

    /**
     * @return int
     */
    public function getCoPais()
    {
        return $this->coPais;
    }

    /**
     * @param int $coPais
     */
    public function setCoPais($coPais)
    {
        $this->coPais = $coPais;
    }

    /**
     * @return string
     */
    public function getCoRacaCor()
    {
        return $this->coRacaCor;
    }

    /**
     * @param string $coRacaCor
     */
    public function setCoRacaCor($coRacaCor)
    {
        $this->coRacaCor = $coRacaCor;
    }

    /**
     * @return int
     */
    public function getCoSeqUsuario()
    {
        return $this->coSeqUsuario;
    }

    /**
     * @param int $coSeqUsuario
     */
    public function setCoSeqUsuario($coSeqUsuario)
    {
        $this->coSeqUsuario = $coSeqUsuario;
    }

    /**
     * @return string
     */
    public function getCoSexo()
    {
        return $this->coSexo;
    }

    /**
     * @param string $coSexo
     */
    public function setCoSexo($coSexo)
    {
        $this->coSexo = $coSexo;
    }

    /**
     * @return string
     */
    public function getDsBairro()
    {
        return $this->dsBairro;
    }

    /**
     * @param string $dsBairro
     */
    public function setDsBairro($dsBairro)
    {
        $this->dsBairro = $dsBairro;
    }

    /**
     * @return string
     */
    public function getDsCargo()
    {
        return $this->dsCargo;
    }

    /**
     * @param string $dsCargo
     */
    public function setDsCargo($dsCargo)
    {
        $this->dsCargo = $dsCargo;
    }

    /**
     * @return string
     */
    public function getDsEmail()
    {
        return $this->dsEmail;
    }

    /**
     * @param string $dsEmail
     */
    public function setDsEmail($dsEmail)
    {
        $this->dsEmail = $dsEmail;
    }

    /**
     * @return string
     */
    public function getDsLogradouro()
    {
        return $this->dsLogradouro;
    }

    /**
     * @param string $dsLogradouro
     */
    public function setDsLogradouro($dsLogradouro)
    {
        $this->dsLogradouro = $dsLogradouro;
    }

    /**
     * @return string
     */
    public function getDsLogradouroComplemento()
    {
        return $this->dsLogradouroComplemento;
    }

    /**
     * @param string $dsLogradouroComplemento
     */
    public function setDsLogradouroComplemento($dsLogradouroComplemento)
    {
        $this->dsLogradouroComplemento = $dsLogradouroComplemento;
    }

    /**
     * @return string
     */
    public function getDsOrgaoUnidade()
    {
        return $this->dsOrgaoUnidade;
    }

    /**
     * @param string $dsOrgaoUnidade
     */
    public function setDsOrgaoUnidade($dsOrgaoUnidade)
    {
        $this->dsOrgaoUnidade = $dsOrgaoUnidade;
    }

    /**
     * @return string
     */
    public function getDsRacaCor()
    {
        return $this->dsRacaCor;
    }

    /**
     * @param string $dsRacaCor
     */
    public function setDsRacaCor($dsRacaCor)
    {
        $this->dsRacaCor = $dsRacaCor;
    }

    /**
     * @return string
     */
    public function getDsSenha()
    {
        return $this->dsSenha;
    }

    /**
     * @param string $dsSenha
     */
    public function setDsSenha($dsSenha)
    {
        $this->dsSenha = $dsSenha;
    }

    /**
     * @return string
     */
    public function getNoUsuario()
    {
        return $this->noUsuario;
    }

    /**
     * @param string $noUsuario
     */
    public function setNoUsuario($noUsuario)
    {
        $this->noUsuario = $noUsuario;
    }

    /**
     * @return string
     */
    public function getNuCelular()
    {
        return $this->nuCelular;
    }

    /**
     * @param string $nuCelular
     */
    public function setNuCelular($nuCelular)
    {
        $this->nuCelular = $nuCelular;
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
    public function getNuCns()
    {
        return $this->nuCns;
    }

    /**
     * @param string $nuCns
     */
    public function setNuCns($nuCns)
    {
        $this->nuCns = $nuCns;
    }

    /**
     * @return string
     */
    public function getNuDddCelular()
    {
        return $this->nuDddCelular;
    }

    /**
     * @param string $nuDddCelular
     */
    public function setNuDddCelular($nuDddCelular)
    {
        $this->nuDddCelular = $nuDddCelular;
    }

    /**
     * @return string
     */
    public function getNuDddFax()
    {
        return $this->nuDddFax;
    }

    /**
     * @param string $nuDddFax
     */
    public function setNuDddFax($nuDddFax)
    {
        $this->nuDddFax = $nuDddFax;
    }

    /**
     * @return string
     */
    public function getNuDddFone()
    {
        return $this->nuDddFone;
    }

    /**
     * @param string $nuDddFone
     */
    public function setNuDddFone($nuDddFone)
    {
        $this->nuDddFone = $nuDddFone;
    }

    /**
     * @return string
     */
    public function getNuDdi()
    {
        return $this->nuDdi;
    }

    /**
     * @param string $nuDdi
     */
    public function setNuDdi($nuDdi)
    {
        $this->nuDdi = $nuDdi;
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
    public function getNuFone()
    {
        return $this->nuFone;
    }

    /**
     * @param string $nuFone
     */
    public function setNuFone($nuFone)
    {
        $this->nuFone = $nuFone;
    }

    /**
     * @return string
     */
    public function getNuPassaporte()
    {
        return $this->nuPassaporte;
    }

    /**
     * @param string $nuPassaporte
     */
    public function setNuPassaporte($nuPassaporte)
    {
        $this->nuPassaporte = $nuPassaporte;
    }

    /**
     * @return string
     */
    public function getNuRamal()
    {
        return $this->nuRamal;
    }

    /**
     * @param string $nuRamal
     */
    public function setNuRamal($nuRamal)
    {
        $this->nuRamal = $nuRamal;
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
     * @return string
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * @param string $stRegistroAtivo
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
    }

    /**
     * @return mixed
     */
    public function getCoUsuarioSCPA()
    {
        return $this->coUsuarioSCPA;
    }

    /**
     * @param mixed $coUsuarioSCPA
     */
    public function setCoUsuarioSCPA($coUsuarioSCPA)
    {
        $this->coUsuarioSCPA = $coUsuarioSCPA;
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

}
