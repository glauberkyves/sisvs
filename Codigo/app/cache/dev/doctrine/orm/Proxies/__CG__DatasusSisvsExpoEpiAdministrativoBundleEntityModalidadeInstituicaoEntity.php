<?php

namespace Proxies\__CG__\Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ModalidadeInstituicaoEntity extends \Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeInstituicaoEntity implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\ModalidadeInstituicaoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\ModalidadeInstituicaoEntity' . "\0" . 'coInstituicao');
        }

        return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\ModalidadeInstituicaoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\ModalidadeInstituicaoEntity' . "\0" . 'coInstituicao');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ModalidadeInstituicaoEntity $proxy) {
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
    public function getCoInstituicao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoInstituicao', array());

        return parent::getCoInstituicao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoInstituicao($coInstituicao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoInstituicao', array($coInstituicao));

        return parent::setCoInstituicao($coInstituicao);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoModalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoModalidade', array());

        return parent::getCoModalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoModalidade($coModalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoModalidade', array($coModalidade));

        return parent::setCoModalidade($coModalidade);
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
