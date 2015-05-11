<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * InscricaoEntity
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_ANEXO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AutorBundle\Repository\AnexoRepository")
 */
class AnexoEntity extends AbstractBase
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_ANEXO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_ANEXO_COSEQANEXO", allocationSize=1, initialValue=1)
     */
    private $coSeqAnexo;
    /**
     * @var interger
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity", inversedBy="coAnexo")
     * @ORM\JoinColumn(name="CO_INSCRICAO", referencedColumnName="CO_SEQ_INSCRICAO")
     */
    private $coInscricao;
    /**
     * @var string
     * @ORM\Column(name="NO_ARQUIVO", type="text", nullable=true)
     */
    private $noArquivo;
    /**
     * @var string
     * @ORM\Column(name="DS_ARQUIVO", type="blob", nullable=true)
     */
    private $dsArquivo;
    /**
     * @var float
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;

    /**
     * @return
     */
    public function getCoInscricao()
    {
        return $this->coInscricao;
    }

    /**
     * @param  $coInscricao
     */
    public function setCoInscricao($coInscricao)
    {
        $this->coInscricao = $coInscricao;
    }

    /**
     * @return int
     */
    public function getCoSeqAnexo()
    {
        return $this->coSeqAnexo;
    }

    /**
     * @param int $coSeqAnexo
     */
    public function setCoSeqAnexo($coSeqAnexo)
    {
        $this->coSeqAnexo = $coSeqAnexo;
    }

    /**
     * @return string
     */
    public function getDsArquivo()
    {
        return $this->dsArquivo;
    }

    /**
     * @param string $dsArquivo
     */
    public function setDsArquivo($dsArquivo)
    {
        $this->dsArquivo = $dsArquivo;
    }

    /**
     * @return string
     */
    public function getNoArquivo()
    {
        return $this->noArquivo;
    }

    /**
     * @param string $noArquivo
     */
    public function setNoArquivo($noArquivo)
    {
        $this->noArquivo = $noArquivo;
    }

    public function __toString()
    {
        return $this->noArquivo;
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

}
