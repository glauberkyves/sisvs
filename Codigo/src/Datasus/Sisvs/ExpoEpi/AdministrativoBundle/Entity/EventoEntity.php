<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Evento
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_EVENTO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\EventoRepository")
 */
class EventoEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_EVENTO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_EVENTO_COSEQEVENTO", allocationSize=1, initialValue=1)
     */
    private $coSeqEvento;
    /**
     * @var string
     * @Assert\NotBlank(message="administrativo.validations.evento.notBlank")
     * @ORM\Column(name="NO_EVENTO", type="string", length=60)
     */
    private $noEvento;
    /**
     * @var string
		 * @ORM\Column(name="NO_EDITAL", type="string", length=100)
     */
    private $noEdital;
    /**
     * @var string
     * @ORM\Column(name="NO_LOGOTIPO", type="string", length=100)
     */
    private $noLogotipo;
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity", mappedBy="coEvento")
         * @ORM\OrderBy({"coSeqModalidade" = "desc"})
     */
    private $coModalidade;
    /**
     * @var string
     * @Assert\NotBlank(message="administrativo.validations.evento.notBlankAnEvento")
     * @ORM\Column(name="NU_ANO_EVENTO", type="string", length=4)
     */
    private $anEvento;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres. Verifique o texto digitado!")
     * @ORM\Column(name="DS_EVENTO", type="string", length=500)
     */
    private $dsEvento;
    /**
     * @var string
     *
     * @ORM\Column(name="NU_EDITAL", type="string", length=10)
     */
    private $nuEdital;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_EDITAL", type="date")
     */
    private $dtEdital;
    /**
     * @var string
     *
     * @ORM\Column(name="DS_EDITAL", type="blob")
     */
    private $dsEdital;
    /**
     * @var string
     * @ORM\Column(name="IM_LOGOTIPO", type="blob")
     */
    private $imLogotipo;
    /**
     * @var string
     *
     * @ORM\Column(name="ST_ATIVO", type="string", length=1)
     */
    private $stAtivo;

    /**
     * Get coSeqEvento
     *
     * @return integer
     */
    public function getCoSeqEvento()
    {
        return $this->coSeqEvento;
    }

    /**
     * Set coSeqEvento
     *
     * @param integer $coSeqEvento
     *
     * @return Evento
     */
    public function setCoSeqEvento($coSeqEvento)
    {
        $this->coSeqEvento = $coSeqEvento;

        return $this;
    }

    /**
     * Get anEvento
     *
     * @return string
     */
    public function getAnEvento()
    {
        return $this->anEvento;
    }

    /**
     * Set anEvento
     *
     * @param string $anEvento
     *
     * @return Evento
     */
    public function setAnEvento($anEvento)
    {
        $this->anEvento = $anEvento;

        return $this;
    }

    /**
     * Get noEvento
     *
     * @return string
     */
    public function getNoEvento()
    {
        return $this->noEvento;
    }

    /**
     * Set noEvento
     *
     * @param string $noEvento
     *
     * @return Evento
     */
    public function setNoEvento($noEvento)
    {
        $this->noEvento = $noEvento;

        return $this;
    }

    /**
     * Get dsEvento
     *
     * @return string
     */
    public function getDsEvento()
    {
        return $this->dsEvento;
    }

    /**
     * Set dsEvento
     *
     * @param string $dsEvento
     *
     * @return Evento
     */
    public function setDsEvento($dsEvento)
    {
        $this->dsEvento = $dsEvento;

        return $this;
    }

    /**
     * Get nuEdital
     *
     * @return string
     */
    public function getNuEdital()
    {
        return $this->nuEdital;
    }

    /**
     * Set nuEdital
     *
     * @param string $nuEdital
     *
     * @return Evento
     */
    public function setNuEdital($nuEdital)
    {
        $this->nuEdital = $nuEdital;

        return $this;
    }

    /**
     * Get dtEdital
     *
     * @return \DateTime
     */
    public function getDtEdital()
    {
        return $this->dtEdital;
    }

    /**
     * Set dtEdital
     *
     * @param \DateTime $dtEdital
     *
     * @return Evento
     */
    public function setDtEdital($dtEdital)
    {
        $this->dtEdital = $dtEdital;

        return $this;
    }

    /**
     * Get dsEdital
     *
     * @return string
     */
    public function getDsEdital()
    {
        return $this->dsEdital;
    }

    /**
     * Set dsEdital
     *
     * @param string $dsEdital
     *
     * @return Evento
     */
    public function setDsEdital($dsEdital)
    {
        $this->dsEdital = $dsEdital;

        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return string
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * Set stAtivo
     *
     * @param string $stAtivo
     *
     * @return Evento
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;

        return $this;
    }

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

    public function __toString()
    {
        return $this->noEvento;
    }

    /**
     * @return string
     */
    public function getImLogotipo()
    {
        return $this->imLogotipo;
    }

    /**
     * @param string $imLogotipo
     */
    public function setImLogotipo($imLogotipo)
    {
        $this->imLogotipo = $imLogotipo;
    }

    /**
     * @return mixed
     */
    public function getNoEdital()
    {
        return $this->noEdital;
    }

    /**
     * @param mixed $noEdital
     */
    public function setNoEdital($noEdital)
    {
        $this->noEdital = $noEdital;
    }

    /**
     * @return mixed
     */
    public function getNoLogotipo()
    {
        return $this->noLogotipo;
    }

    /**
     * @param mixed $noLogotipo
     */
    public function setNoLogotipo($noLogotipo)
    {
        $this->noLogotipo = $noLogotipo;
    }


}
