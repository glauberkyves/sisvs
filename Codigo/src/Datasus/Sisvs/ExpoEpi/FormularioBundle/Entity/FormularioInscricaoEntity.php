<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FormularioInscricao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_FORMULARIO_INSCRICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\FormularioBundle\Repository\FormularioInscricaoRepository")
 */
class FormularioInscricaoEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_FORMULARIO_INSCRICAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_FORMINSCRICAO_COSEQFORMINSC", allocationSize=1, initialValue=1)
     */
    private $coSeqFormularioInscricao;
    /**
     * @var integer
     * @ORM\Column(name="NU_FORMULARIO", type="string")
     */
    private $nuFormulario;
    /**
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankCoModalidade")
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity")
     * @ORM\JoinColumn(name="CO_MODALIDADE", referencedColumnName="CO_SEQ_MODALIDADE")
     */
    private $coModalidade;
    /**
     * @var \Date
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDtInicio")
     * @ORM\Column(name="DT_INICIO", type="date")
     */
    private $dtInicio;
    /**
     * @var \Date
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDtFim")
     * @ORM\Column(name="DT_FIM", type="date")
     */
    private $dtFim;
    /**
     * @var string
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDsTitulo")
     * @ORM\Column(name="DS_TITULO", type="string", length=200)
     */
    private $dsTitulo;
    /**
     * @var string
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDsObjeto")
     * @ORM\Column(name="DS_OBJETO", type="string", length=2000)
     */
    private $dsObjeto;
    /**
     * @var string
     * @ORM\Column(name="DS_AREA_EVENTO", type="string", length=500)
     */
    private $dsAreaEvento;
    /**
     * @var string
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDsResumo")
     * @ORM\Column(name="DS_RESUMO", type="string", length=2000)
     */
    private $dsResumo;
    /**
     * @var string
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDsApresentacao")
     * @ORM\Column(name="DS_APRESENTACAO", type="string", length=2000)
     */
    private $dsApresentacao;
    /**
     * @var string
     * @Assert\NotBlank(message="formulario.validations.formulario_inscricao.noBlankDsDeclaracao")
     * @ORM\Column(name="DS_DECLARACAO", type="string", length=2000)
     */
    private $dsDeclaracao;
    /**
     * @var string
     * @ORM\Column(name="DS_ANEXOS", type="string", length=2000)
     */
    private $dsAnexos;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\SituacaoFormularioEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_SITUACAO_FORMULARIO", referencedColumnName="CO_SITUACAO_FORMULARIO")
     * })
     */
    private $coSituacaoFormulario;

    /**
     * @var integer
     * @ORM\Column(name="CO_ULTIMA_SITUACAO_FORMULARIO", type="integer")
     */
    private $coUltimaSituacaoFormulario;
    /**
     * @var date
     * @ORM\Column(name="DT_PRORROGACAO", type="date")
     */
    private $dtProrrogacao;
    /**
     * @var string
     * @ORM\Column(name="DS_JUSTIFICATIVA_PRORROGACAO", type="string", length=500)
     */
    private $dsJustificativa;
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_USUARIO_PRORROGACAO")
     */
     private $coUsuario;


    /**
     * @return int
     */
    public function getCoModalidade()
    {
        return $this->coModalidade;
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
    public function getCoSeqFormularioInscricao()
    {
        return $this->coSeqFormularioInscricao;
    }

    /**
     * @param int $coSeqFormularioInscricao
     */
    public function setCoSeqFormularioInscricao($coSeqFormularioInscricao)
    {
        $this->coSeqFormularioInscricao = $coSeqFormularioInscricao;
    }

    /**
     * @return string
     */
    public function getDsAnexos()
    {
        return $this->dsAnexos;
    }

    /**
     * @param string $dsAnexos
     */
    public function setDsAnexos($dsAnexos)
    {
        $this->dsAnexos = $dsAnexos;
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
    public function getDsDeclaracao()
    {
        return $this->dsDeclaracao;
    }

    /**
     * @param string $dsDeclaracao
     */
    public function setDsDeclaracao($dsDeclaracao)
    {
        $this->dsDeclaracao = $dsDeclaracao;
    }

    /**
     * @return string
     */
    public function getDsObjeto()
    {
        return $this->dsObjeto;
    }

    /**
     * @param string $dsObjeto
     */
    public function setDsObjeto($dsObjeto)
    {
        $this->dsObjeto = $dsObjeto;
    }

    /**
     * @param string $dsAreaEvento
     */
    public function setDsAreaEvento($dsAreaEvento)
    {
        $this->dsAreaEvento = $dsAreaEvento;
    }

    /**
     * @return string
     */
    public function getDsAreaEvento()
    {
        return $this->dsAreaEvento;
    }

    /**
     * @return string
     */
    public function getDsResumo()
    {
        return $this->dsResumo;
    }

    /**
     * @param string $dsResumo
     */
    public function setDsResumo($dsResumo)
    {
        $this->dsResumo = $dsResumo;
    }

    /**
     * @return string
     */
    public function getDsTitulo()
    {
        return $this->dsTitulo;
    }

    /**
     * @param string $dsTitulo
     */
    public function setDsTitulo($dsTitulo)
    {
        $this->dsTitulo = $dsTitulo;
    }

    /**
     * @return \DateTime
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * @param \DateTime $dtFim
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;
    }

    /**
     * @return \DateTime
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * @param \DateTime $dtInicio
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;
    }

    /**
     * @return int
     */
    public function getNuFormulario()
    {
        return $this->nuFormulario;
    }

    /**
     * @param int $nuFormulario
     */
    public function setNuFormulario($nuFormulario)
    {
        $this->nuFormulario = $nuFormulario;
    }

    /**
     * @return int
     */
    public function getCoSituacaoFormulario()
    {
        return $this->coSituacaoFormulario;
    }

    /**
     * @param int $coSituacaoFormulario
     */
    public function setCoSituacaoFormulario($coSituacaoFormulario)
    {
        $this->coSituacaoFormulario = $coSituacaoFormulario;
    }

    /**
     * @param int $coUsuario
     */
    public function setCoUsuario($coUsuario)
    {
        $this->coUsuario = $coUsuario;
    }

    /**
     * @return int
     */
    public function getCoUsuario()
    {
        return $this->coUsuario;
    }

    /**
     * @param string $dsJustificativa
     */
    public function setDsJustificativa($dsJustificativa)
    {
        $this->dsJustificativa = $dsJustificativa;
    }

    /**
     * @return string
     */
    public function getDsJustificativa()
    {
        return $this->dsJustificativa;
    }

    /**
     * @param \Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\date $dtProrrogacao
     */
    public function setDtProrrogacao($dtProrrogacao)
    {
        $this->dtProrrogacao = $dtProrrogacao;
    }

    /**
     * @return \Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\date
     */
    public function getDtProrrogacao()
    {
        return $this->dtProrrogacao;
    }

    /**
     * @param int $coUltimaSituacaoFormulario
     */
    public function setCoUltimaSituacaoFormulario($coUltimaSituacaoFormulario)
    {
        $this->coUltimaSituacaoFormulario = $coUltimaSituacaoFormulario;
    }

    /**
     * @return int
     */
    public function getCoUltimaSituacaoFormulario()
    {
        return $this->coUltimaSituacaoFormulario;
    }

}