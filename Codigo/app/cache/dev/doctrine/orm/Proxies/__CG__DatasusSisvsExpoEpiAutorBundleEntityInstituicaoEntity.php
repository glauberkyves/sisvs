<?php

namespace Proxies\__CG__\Datasus\Sisvs\ExpoEpi\AutorBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class InstituicaoEntity extends \Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InstituicaoEntity implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coSeqInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'stAtivo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coInscricao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coTipoInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coMunicipioIbge', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coUfIbge', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noRegiao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'dsComplemento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'dsEndereco', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noBairro', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuCep', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuFax', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuTelefone', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'sgUf');
        }

        return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coSeqInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'stAtivo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coInscricao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coTipoInstituicao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coMunicipioIbge', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'coUfIbge', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noRegiao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'dsComplemento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'dsEndereco', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'noBairro', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuCep', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuFax', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'nuTelefone', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Entity\\InstituicaoEntity' . "\0" . 'sgUf');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (InstituicaoEntity $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getCoSeqInstituicao()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCoSeqInstituicao();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqInstituicao', array());

        return parent::getCoSeqInstituicao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqInstituicao($coSeqInstituicao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqInstituicao', array($coSeqInstituicao));

        return parent::setCoSeqInstituicao($coSeqInstituicao);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoInstituicao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoInstituicao', array());

        return parent::getNoInstituicao();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoInstituicao($noInstituicao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoInstituicao', array($noInstituicao));

        return parent::setNoInstituicao($noInstituicao);
    }

    /**
     * {@inheritDoc}
     */
    public function getStAtivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStAtivo', array());

        return parent::getStAtivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setStAtivo($stAtivo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStAtivo', array($stAtivo));

        return parent::setStAtivo($stAtivo);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoTipoInstituicao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoTipoInstituicao', array());

        return parent::getCoTipoInstituicao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoTipoInstituicao($coTipoInstituicao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoTipoInstituicao', array($coTipoInstituicao));

        return parent::setCoTipoInstituicao($coTipoInstituicao);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoMunicipioIbge()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoMunicipioIbge', array());

        return parent::getCoMunicipioIbge();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoMunicipioIbge($coMunicipioIbge)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoMunicipioIbge', array($coMunicipioIbge));

        return parent::setCoMunicipioIbge($coMunicipioIbge);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getCoInscricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoInscricao', array());

        return parent::getCoInscricao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoInscricao($coInscricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoInscricao', array($coInscricao));

        return parent::setCoInscricao($coInscricao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsComplemento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsComplemento', array());

        return parent::getDsComplemento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsComplemento($dsComplemento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsComplemento', array($dsComplemento));

        return parent::setDsComplemento($dsComplemento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEndereco()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEndereco', array());

        return parent::getDsEndereco();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEndereco($dsEndereco)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEndereco', array($dsEndereco));

        return parent::setDsEndereco($dsEndereco);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoBairro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoBairro', array());

        return parent::getNoBairro();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoBairro($noBairro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoBairro', array($noBairro));

        return parent::setNoBairro($noBairro);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuCep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuCep', array());

        return parent::getNuCep();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuCep($nuCep)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuCep', array($nuCep));

        return parent::setNuCep($nuCep);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuFax()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuFax', array());

        return parent::getNuFax();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuFax($nuFax)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuFax', array($nuFax));

        return parent::setNuFax($nuFax);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuTelefone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuTelefone', array());

        return parent::getNuTelefone();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuTelefone($nuTelefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuTelefone', array($nuTelefone));

        return parent::setNuTelefone($nuTelefone);
    }

    /**
     * {@inheritDoc}
     */
    public function getSgUf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSgUf', array());

        return parent::getSgUf();
    }

    /**
     * {@inheritDoc}
     */
    public function setSgUf($sgUf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSgUf', array($sgUf));

        return parent::setSgUf($sgUf);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoUfIbge()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoUfIbge', array());

        return parent::getCoUfIbge();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoUfIbge($coUfIbge)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoUfIbge', array($coUfIbge));

        return parent::setCoUfIbge($coUfIbge);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoRegiao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoRegiao', array());

        return parent::getNoRegiao();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoRegiao($noRegiao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoRegiao', array($noRegiao));

        return parent::setNoRegiao($noRegiao);
    }

    /**
     * {@inheritDoc}
     */
    public function loadValues(\Datasus\Core\BaseBundle\Entity\AbstractBase $entity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'loadValues', array($entity));

        return parent::loadValues($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function fromArray(array $data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'fromArray', array($data));

        return parent::fromArray($data);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray($parent = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array($parent));

        return parent::toArray($parent);
    }

}
