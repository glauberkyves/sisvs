<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especialidade
 *
 * @ORM\Table(name="DBGERAL.TB_ESPECIALIDADE")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\Especialidade")

 */
class Especialidade extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ESPECIALIDADE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_ESPECIALIDADE_CO_ESPECIALID", allocationSize=1, initialValue=1)
     */
    private $coEspecialidade;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_ESPECIALIDADE", type="string", length=200, nullable=false)
     */
    private $dsEspecialidade;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=false)
     */
    private $stRegistroAtivo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Datasus\Core\BaseBundle\Entity\OrgaoClasse", inversedBy="coEspecialidade")
     * @ORM\JoinTable(name="rl_orgaoclasse_especialidade",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CO_ESPECIALIDADE", referencedColumnName="CO_ESPECIALIDADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CO_ORGAO_CLASSE", referencedColumnName="CO_ORGAO_CLASSE")
     *   }
     * )
     */
    private $coOrgaoClasse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coOrgaoClasse = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get coEspecialidade
     *
     * @return integer 
     */
    public function getCoEspecialidade()
    {
        return $this->coEspecialidade;
    }

    /**
     * Set dsEspecialidade
     *
     * @param string $dsEspecialidade
     * @return Especialidade
     */
    public function setDsEspecialidade($dsEspecialidade)
    {
        $this->dsEspecialidade = $dsEspecialidade;
    
        return $this;
    }

    /**
     * Get dsEspecialidade
     *
     * @return string 
     */
    public function getDsEspecialidade()
    {
        return $this->dsEspecialidade;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return Especialidade
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
    
        return $this;
    }

    /**
     * Get stRegistroAtivo
     *
     * @return string 
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * Add coOrgaoClasse
     *
     * @param \Datasus\Core\BaseBundle\Entity\OrgaoClasse $coOrgaoClasse
     * @return Especialidade
     */
    public function addCoOrgaoClasse(\Datasus\Core\BaseBundle\Entity\OrgaoClasse $coOrgaoClasse)
    {
        $this->coOrgaoClasse[] = $coOrgaoClasse;
    
        return $this;
    }

    /**
     * Remove coOrgaoClasse
     *
     * @param \Datasus\Core\BaseBundle\Entity\OrgaoClasse $coOrgaoClasse
     */
    public function removeCoOrgaoClasse(\Datasus\Core\BaseBundle\Entity\OrgaoClasse $coOrgaoClasse)
    {
        $this->coOrgaoClasse->removeElement($coOrgaoClasse);
    }

    /**
     * Get coOrgaoClasse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoOrgaoClasse()
    {
        return $this->coOrgaoClasse;
    }
}
