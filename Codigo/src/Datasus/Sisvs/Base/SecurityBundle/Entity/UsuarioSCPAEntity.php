<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioSCPAEntity
 *
 * @ORM\Table(name="DBSCPA.VW_SCPA_USUARIO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\Base\SecurityBundle\Repository\UsuarioSCPARepository")
 */
class UsuarioSCPAEntity
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
     * @ORM\Column(name="CO_ESFERA_ATUACAO", type="string", length=250)
     */
    private $coEsferaAtuacao;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PERFIL", type="integer")
     */
    private $coPerfil;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_PERFIL", type="integer")
     */
    private $coSeqPerfil;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SEQ_SISTEMA", type="integer")
     */
    private $coSeqSistema;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_ESFERA", type="string", length=70)
     */
    private $dsEsfera;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_ESFERA_ATUACAO", type="string", length=250)
     */
    private $dsEsferaAtuacao;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_PAGINA_INICIAL", type="string", length=100)
     */
    private $dsPaginaInicial;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_PERFIL", type="string", length=100)
     */
    private $dsPerfil;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_SISTEMA", type="string", length=100)
     */
    private $dsSistema;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_EMAIL_CORPORATIVO", type="string", length=100)
     */
    private $dsEmailCorporativo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_AUTORIZACAO_ACESSO", type="date")
     */
    private $dtAutorizacaoAcesso;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_SOLICITACAO_ACESSO", type="date")
     */
    private $dtSolicitacaoAcesso;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_PERFIL", type="string", length=10)
     */
    private $sgPerfil;
    /**
     * @var string
     *
     * @ORM\Column(name="SG_SISTEMA", type="string", length=20)
     */
    private $sgSistema;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_PERFIL_OCULTO", type="string", length=1)
     */
    private $stPerfilOculto;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO_PERFIL", type="string", length=1)
     */
    private $stRegistroAtivoPerfil;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO_SISTEMA", type="string", length=1)
     */
    private $stRegistroAtivoSistema;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO_USR_PERFIL", type="string", length=1)
     */
    private $stRegistroAtivoUsrPerfil;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO_USUARIO", type="string", length=1)
     */
    private $stRegistroAtivoUsuario;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_USUARIO_PERFIL_ESFERA", type="string", length=1)
     */
    private $stUsuarioPerfilEsfera;
    /**
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\Base\SecurityBundle\Entity\UsuarioEntity", inversedBy="coUsuarioSCPA")
     * @ORM\JoinColumn(name="CO_SEQ_USUARIO", referencedColumnName="CO_SEQ_USUARIO")
     */
    private $coUsuario;

    /**
     * @return string
     */
    public function getCoEsferaAtuacao()
    {
        return $this->coEsferaAtuacao;
    }

    /**
     * @param string $coEsferaAtuacao
     */
    public function setCoEsferaAtuacao($coEsferaAtuacao)
    {
        $this->coEsferaAtuacao = $coEsferaAtuacao;
    }

    /**
     * @return int
     */
    public function getCoPerfil()
    {
        return $this->coPerfil;
    }

    /**
     * @param int $coPerfil
     */
    public function setCoPerfil($coPerfil)
    {
        $this->coPerfil = $coPerfil;
    }

    /**
     * @return int
     */
    public function getCoSeqPerfil()
    {
        return $this->coSeqPerfil;
    }

    /**
     * @param int $coSeqPerfil
     */
    public function setCoSeqPerfil($coSeqPerfil)
    {
        $this->coSeqPerfil = $coSeqPerfil;
    }

    /**
     * @return int
     */
    public function getCoSeqSistema()
    {
        return $this->coSeqSistema;
    }

    /**
     * @param int $coSeqSistema
     */
    public function setCoSeqSistema($coSeqSistema)
    {
        $this->coSeqSistema = $coSeqSistema;
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
    public function getDsEsfera()
    {
        return $this->dsEsfera;
    }

    /**
     * @param string $dsEsfera
     */
    public function setDsEsfera($dsEsfera)
    {
        $this->dsEsfera = $dsEsfera;
    }

    /**
     * @return string
     */
    public function getDsEsferaAtuacao()
    {
        return $this->dsEsferaAtuacao;
    }

    /**
     * @param string $dsEsferaAtuacao
     */
    public function setDsEsferaAtuacao($dsEsferaAtuacao)
    {
        $this->dsEsferaAtuacao = $dsEsferaAtuacao;
    }

    /**
     * @return string
     */
    public function getDsPaginaInicial()
    {
        return $this->dsPaginaInicial;
    }

    /**
     * @param string $dsPaginaInicial
     */
    public function setDsPaginaInicial($dsPaginaInicial)
    {
        $this->dsPaginaInicial = $dsPaginaInicial;
    }

    /**
     * @return string
     */
    public function getDsPerfil()
    {
        return $this->dsPerfil;
    }

    /**
     * @param string $dsPerfil
     */
    public function setDsPerfil($dsPerfil)
    {
        $this->dsPerfil = $dsPerfil;
    }

    /**
     * @return string
     */
    public function getDsSistema()
    {
        return $this->dsSistema;
    }

    /**
     * @param string $dsSistema
     */
    public function setDsSistema($dsSistema)
    {
        $this->dsSistema = $dsSistema;
    }

    /**
     * @param string $dsEmailCorporativo
     */
    public function setDsEmailCorporativo($dsEmailCorporativo)
    {
        $this->dsEmailCorporativo = $dsEmailCorporativo;
    }

    /**
     * @return string
     */
    public function getDsEmailCorporativo()
    {
        return $this->dsEmailCorporativo;
    }


    /**
     * @return \DateTime
     */
    public function getDtAutorizacaoAcesso()
    {
        return $this->dtAutorizacaoAcesso;
    }

    /**
     * @param \DateTime $dtAutorizacaoAcesso
     */
    public function setDtAutorizacaoAcesso($dtAutorizacaoAcesso)
    {
        $this->dtAutorizacaoAcesso = $dtAutorizacaoAcesso;
    }

    /**
     * @return \DateTime
     */
    public function getDtSolicitacaoAcesso()
    {
        return $this->dtSolicitacaoAcesso;
    }

    /**
     * @param \DateTime $dtSolicitacaoAcesso
     */
    public function setDtSolicitacaoAcesso($dtSolicitacaoAcesso)
    {
        $this->dtSolicitacaoAcesso = $dtSolicitacaoAcesso;
    }

    /**
     * @return string
     */
    public function getSgPerfil()
    {
        return $this->sgPerfil;
    }

    /**
     * @param string $sgPerfil
     */
    public function setSgPerfil($sgPerfil)
    {
        $this->sgPerfil = $sgPerfil;
    }

    /**
     * @return string
     */
    public function getSgSistema()
    {
        return $this->sgSistema;
    }

    /**
     * @param string $sgSistema
     */
    public function setSgSistema($sgSistema)
    {
        $this->sgSistema = $sgSistema;
    }

    /**
     * @return string
     */
    public function getStPerfilOculto()
    {
        return $this->stPerfilOculto;
    }

    /**
     * @param string $stPerfilOculto
     */
    public function setStPerfilOculto($stPerfilOculto)
    {
        $this->stPerfilOculto = $stPerfilOculto;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivoPerfil()
    {
        return $this->stRegistroAtivoPerfil;
    }

    /**
     * @param string $stRegistroAtivoPerfil
     */
    public function setStRegistroAtivoPerfil($stRegistroAtivoPerfil)
    {
        $this->stRegistroAtivoPerfil = $stRegistroAtivoPerfil;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivoSistema()
    {
        return $this->stRegistroAtivoSistema;
    }

    /**
     * @param string $stRegistroAtivoSistema
     */
    public function setStRegistroAtivoSistema($stRegistroAtivoSistema)
    {
        $this->stRegistroAtivoSistema = $stRegistroAtivoSistema;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivoUsrPerfil()
    {
        return $this->stRegistroAtivoUsrPerfil;
    }

    /**
     * @param string $stRegistroAtivoUsrPerfil
     */
    public function setStRegistroAtivoUsrPerfil($stRegistroAtivoUsrPerfil)
    {
        $this->stRegistroAtivoUsrPerfil = $stRegistroAtivoUsrPerfil;
    }

    /**
     * @return string
     */
    public function getStRegistroAtivoUsuario()
    {
        return $this->stRegistroAtivoUsuario;
    }

    /**
     * @param string $stRegistroAtivoUsuario
     */
    public function setStRegistroAtivoUsuario($stRegistroAtivoUsuario)
    {
        $this->stRegistroAtivoUsuario = $stRegistroAtivoUsuario;
    }

    /**
     * @return string
     */
    public function getStUsuarioPerfilEsfera()
    {
        return $this->stUsuarioPerfilEsfera;
    }

    /**
     * @param string $stUsuarioPerfilEsfera
     */
    public function setStUsuarioPerfilEsfera($stUsuarioPerfilEsfera)
    {
        $this->stUsuarioPerfilEsfera = $stUsuarioPerfilEsfera;
    }


}
