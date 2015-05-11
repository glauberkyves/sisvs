<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ModalidadeInstituicao
 *
 * @ORM\Table(name="DBSISVS_TEMP_H.RL_MODALIDADE_TIPO_INSTITUICAO")
 * @ORM\Entity(repositoryClass="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Repository\ModalidadeInstituicaoRepository")
 */
class ModalidadeInstituicaoEntity extends AbstractBase
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity")
     * @ORM\JoinColumn(name="CO_MODALIDADE", referencedColumnName="CO_SEQ_MODALIDADE")
     */
    private $coModalidade;
    /**
     * @var integer
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\InstituicaoEntity")
     * @ORM\JoinColumn(name="CO_TIPO_INSTITUICAO", referencedColumnName="CO_SEQ_TIPO_INSTITUICAO")
     */
    private $coInstituicao;

    /**
     * @return int
     */
    public function getCoInstituicao()
    {
        return $this->coInstituicao;
    }

    /**
     * @param int $coInstituicao
     */
    public function setCoInstituicao($coInstituicao)
    {
        $this->coInstituicao = $coInstituicao;
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

    /**
     * @return mixed
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * @param mixed $stAtivo
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
    }


}
