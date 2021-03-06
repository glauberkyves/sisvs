<?php

namespace Proxies\__CG__\Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EventoEntity extends \Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\EventoEntity implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'coSeqEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noLogotipo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'anEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dsEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'nuEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dtEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dsEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'imLogotipo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'stAtivo');
        }

        return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'coSeqEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'noLogotipo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'anEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dsEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'nuEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dtEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'dsEdital', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'imLogotipo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Entity\\EventoEntity' . "\0" . 'stAtivo');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EventoEntity $proxy) {
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
    public function getCoSeqEvento()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCoSeqEvento();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqEvento', array());

        return parent::getCoSeqEvento();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqEvento($coSeqEvento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqEvento', array($coSeqEvento));

        return parent::setCoSeqEvento($coSeqEvento);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnEvento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnEvento', array());

        return parent::getAnEvento();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnEvento($anEvento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnEvento', array($anEvento));

        return parent::setAnEvento($anEvento);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoEvento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoEvento', array());

        return parent::getNoEvento();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoEvento($noEvento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoEvento', array($noEvento));

        return parent::setNoEvento($noEvento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEvento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEvento', array());

        return parent::getDsEvento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEvento($dsEvento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEvento', array($dsEvento));

        return parent::setDsEvento($dsEvento);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuEdital()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuEdital', array());

        return parent::getNuEdital();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuEdital($nuEdital)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuEdital', array($nuEdital));

        return parent::setNuEdital($nuEdital);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtEdital()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtEdital', array());

        return parent::getDtEdital();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtEdital($dtEdital)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtEdital', array($dtEdital));

        return parent::setDtEdital($dtEdital);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEdital()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEdital', array());

        return parent::getDsEdital();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEdital($dsEdital)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEdital', array($dsEdital));

        return parent::setDsEdital($dsEdital);
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getImLogotipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImLogotipo', array());

        return parent::getImLogotipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setImLogotipo($imLogotipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImLogotipo', array($imLogotipo));

        return parent::setImLogotipo($imLogotipo);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoEdital()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoEdital', array());

        return parent::getNoEdital();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoEdital($noEdital)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoEdital', array($noEdital));

        return parent::setNoEdital($noEdital);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoLogotipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoLogotipo', array());

        return parent::getNoLogotipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoLogotipo($noLogotipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoLogotipo', array($noLogotipo));

        return parent::setNoLogotipo($noLogotipo);
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
