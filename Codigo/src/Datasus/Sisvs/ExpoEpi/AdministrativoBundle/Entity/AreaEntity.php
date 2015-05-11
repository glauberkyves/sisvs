<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Area
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_AREA")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\AreaRepository")
 */
class AreaEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_AREA", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_AREA_COSEQAREA", allocationSize=1, initialValue=1)
     * @ORM\OrderBy({"coSeqArea" = "ASC"})
     */
    private $coSeqArea;
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CO_MODALIDADE", referencedColumnName="CO_SEQ_MODALIDADE")
     * })
     */
    private $coModalidade;
    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TemaEntity", mappedBy="coArea")
     * @ORM\OrderBy({"nuTema" = "ASC"})
     */
    private $coTema;

    /**
     * @var string
     * @Assert\NotBlank(message="administrativo.validations.area.notBlank")
     * @ORM\Column(name="NO_AREA", type="text", nullable=true, length=250)
     */
    private $noArea;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_AREA", type="text", nullable=true, length=500)
     */
    private $dsArea;

    /**
     * @var string
     *
     * @ORM\Column(name="NU_AREA", type="string",length=250, nullable=true)
     */
    private $nuArea;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;

    public function getCoSeqArea()
    {
        return $this->coSeqArea;
    }

    public function setCoSeqArea($coSeqArea)
    {
        $this->coSeqArea = $coSeqArea;
    }

    public function getCoModalidade()
    {
        return $this->coModalidade ? $this->coModalidade : new ModalidadeEntity();
    }

    public function setCoModalidade($coModalidade)
    {
        $this->coModalidade = $coModalidade;
    }

    public function getDsArea()
    {
        return $this->dsArea;
    }

    public function setDsArea($dsArea)
    {
        $this->dsArea = $dsArea;
    }

    public function getNoArea()
    {
        return $this->noArea;
    }

    public function setNoArea($noArea)
    {
        $this->noArea = $noArea;
    }

	/**
	 * @param string $nuArea
	 */
	public function setNuArea($nuArea)
	{
		$this->nuArea = $nuArea;
	}

	/**
	 * @return string
	 */
	public function getNuArea()
	{
		return $this->nuArea;
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
     * @return mixed
     */
    public function getCoArea()
    {
//        return $this->coArea;
        return 'A1';
    }

    /**
     * @param mixed $coArea
     */
    public function setCoArea($coArea)
    {
        $this->coArea = $coArea;
    }

    /**
     * @return int
     */
    public function getCoTema()
    {
        return $this->coTema;
    }

    /**
     * @param int $coTema
     */
    public function setCoTema($coTema)
    {
        $this->coTema = $coTema;
    }

    public function __toString()
    {
        return $this->noArea;
    }

}
