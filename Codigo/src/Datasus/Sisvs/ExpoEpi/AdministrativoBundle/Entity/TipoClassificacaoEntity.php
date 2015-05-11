<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoClassificacao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.TB_TIPO_CLASSIFICACAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\TipoClassificacaoRepository")
 */
class TipoClassificacaoEntity extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CO_TIPO_CLASSIFICACAO", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $coSeqTipoClassificacao;
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="DS_CLASSIFICACAO", type="string", length=50)
     */
    private $dsClassificacao;

    /**
     * Get coSeqTipoClassificacao
     *
     * @return integer
     */
    public function getCoSeqTipoClassificacao()
    {
        return $this->coSeqTipoClassificacao;
    }

    /**
     * Set coSeqTipoClassificacao
     *
     * @param integer $coSeqTipoClassificacao
     *
     * @return TipoClassificacao
     */
    public function setCoSeqTipoClassificacao($coSeqTipoClassificacao)
    {
        $this->coSeqTipoClassificacao = $coSeqTipoClassificacao;

        return $this;
    }

    /**
     * Get dsClassificacao
     *
     * @return string
     */
    public function getDsClassificacao()
    {
        return $this->dsClassificacao;
    }

    /**
     * Set dsClassificacao
     *
     * @param string $dsClassificacao
     *
     * @return TipoClassificacao
     */
    public function setDsClassificacao($dsClassificacao)
    {
        $this->dsClassificacao = $dsClassificacao;

        return $this;
    }

    public function __toString()
    {
        return $this->dsClassificacao;
    }

}
