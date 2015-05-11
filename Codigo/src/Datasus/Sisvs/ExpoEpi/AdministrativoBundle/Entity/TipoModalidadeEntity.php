<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoModalidade
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_TIPO_MODALIDADE")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\TipoModalidadeRepository")
 */
class TipoModalidadeEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_SEQ_TIPO_MODALIDADE", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="DBSISVS_TEMP_H.SQ_TIPOMODALIDADE_COSEQTIPOMOD", allocationSize=1, initialValue=1)
     */
    private $coSeqTipoModalidade;
    /**
     * @var string
     * @Assert\Length(
     *  max = 60,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @Assert\NotBlank(message="administrativo.validations.tipo_modalidade.notBlank")
     * @ORM\Column(name="NO_TIPO_MODALIDADE", type="string", length=60)
     */
    private $noTipoModalidade;
    /**
     * @var string
     * @Assert\Length(
     *  max = 500,
     *  maxMessage = "O tamanho máximo do texto é {{ limit }} caracteres")
     * @ORM\Column(name="DS_TIPO_MODALIDADE", type="text", nullable=true, length=500)
     */
    private $dsTipoModalidade;
    /**
     * @var integer
     *
     * @ORM\Column(name="ST_ATIVO", type="string")
     */
    private $stAtivo;

    /**
     * Get coSeqTipoModalidade
     *
     * @return integer
     */
    public function getCoSeqTipoModalidade()
    {
        return $this->coSeqTipoModalidade;
    }

    /**
     * Set coSeqTipoModalidade
     *
     * @param integer $coSeqTipoModalidade
     *
     * @return TipoModalidade
     */
    public function setCoSeqTipoModalidade($coSeqTipoModalidade)
    {
        $this->coSeqTipoModalidade = $coSeqTipoModalidade;

        return $this;
    }

    /**
     * Get noTipoModalidade
     *
     * @return string
     */
    public function getNoTipoModalidade()
    {
        return $this->noTipoModalidade;
    }

    /**
     * Set noTipoModalidade
     *
     * @param string $noTipoModalidade
     *
     * @return TipoModalidade
     */
    public function setNoTipoModalidade($noTipoModalidade)
    {
        $this->noTipoModalidade = $noTipoModalidade;

        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return integer
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * Set stAtivo
     *
     * @param integer $stAtivo
     *
     * @return TipoModalidade
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;

        return $this;
    }

    /**
     * @return string
     */
    public function getDsTipoModalidade()
    {
        return $this->dsTipoModalidade;
    }

    /**
     * @param string $dsApresentacao
     */
    public function setDsTipoModalidade($dsApresentacao)
    {
        $this->dsTipoModalidade = $dsApresentacao;
    }

}
