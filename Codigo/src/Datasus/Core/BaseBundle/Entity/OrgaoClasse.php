<?php

namespace Datasus\Core\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrgaoClasse
 *
 * @ORM\Table(name="DBGERAL.TB_ORGAO_CLASSE")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Datasus\Core\BaseBundle\EntityRepository\OrgaoClasse")

 */
class OrgaoClasse extends \Datasus\Core\BaseBundle\Entity\AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ORGAO_CLASSE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_ORGAO_CLASSE_CO_ORGAO_CLASS", allocationSize=1, initialValue=1)
     */
    private $coOrgaoClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="NO_ORGAO_CLASSE", type="string", length=100, nullable=false)
     */
    private $noOrgaoClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="SG_ORGAO_CLASSE", type="string", length=10, nullable=true)
     */
    private $sgOrgaoClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="ST_REGISTRO_ATIVO", type="string", length=1, nullable=false)
     */
    private $stRegistroAtivo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Datasus\Core\BaseBundle\Entity\Especialidade", mappedBy="coOrgaoClasse")
     */
    private $especialidades;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->especialidades = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get coOrgaoClasse
     *
     * @return integer 
     */
    public function getCoOrgaoClasse()
    {
        return $this->coOrgaoClasse;
    }

    /**
     * Set noOrgaoClasse
     *
     * @param string $noOrgaoClasse
     * @return OrgaoClasse
     */
    public function setNoOrgaoClasse($noOrgaoClasse)
    {
        $this->noOrgaoClasse = $noOrgaoClasse;
    
        return $this;
    }

    /**
     * Get noOrgaoClasse
     *
     * @return string 
     */
    public function getNoOrgaoClasse()
    {
        return $this->noOrgaoClasse;
    }

    /**
     * Set sgOrgaoClasse
     *
     * @param string $sgOrgaoClasse
     * @return OrgaoClasse
     */
    public function setSgOrgaoClasse($sgOrgaoClasse)
    {
        $this->sgOrgaoClasse = $sgOrgaoClasse;
    
        return $this;
    }

    /**
     * Get sgOrgaoClasse
     *
     * @return string 
     */
    public function getSgOrgaoClasse()
    {
        return $this->sgOrgaoClasse;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param string $stRegistroAtivo
     * @return OrgaoClasse
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
     * Add especialidades
     *
     * @param \Datasus\Core\BaseBundle\Entity\Especialidade $especialidades
     * @return OrgaoClasse
     */
    public function addEspecialidades(\Datasus\Core\BaseBundle\Entity\Especialidade $especialidades)
    {
        $this->especialidades[] = $especialidades;
    
        return $this;
    }

    /**
     * Remove especialidades
     *
     * @param \Datasus\Core\BaseBundle\Entity\Especialidade $especialidades
     */
    public function removeEspecialidades(\Datasus\Core\BaseBundle\Entity\Especialidade $especialidades)
    {
        $this->especialidades->removeElement($especialidades);
    }

    /**
     * Get especialidades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspecialidades()
    {
        return $this->especialidades;
    }
}
