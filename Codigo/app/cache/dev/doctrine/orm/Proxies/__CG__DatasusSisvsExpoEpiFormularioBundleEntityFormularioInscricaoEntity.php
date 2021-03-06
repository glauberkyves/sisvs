<?php

namespace Proxies\__CG__\Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class FormularioInscricaoEntity extends \Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coSeqFormularioInscricao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'nuFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtInicio', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtFim', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsTitulo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsObjeto', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsAreaEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsResumo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsApresentacao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsDeclaracao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsAnexos', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coSituacaoFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coUltimaSituacaoFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtProrrogacao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsJustificativa', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coUsuario');
        }

        return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coSeqFormularioInscricao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'nuFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coModalidade', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtInicio', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtFim', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsTitulo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsObjeto', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsAreaEvento', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsResumo', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsApresentacao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsDeclaracao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsAnexos', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coSituacaoFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coUltimaSituacaoFormulario', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dtProrrogacao', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'dsJustificativa', '' . "\0" . 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Entity\\FormularioInscricaoEntity' . "\0" . 'coUsuario');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (FormularioInscricaoEntity $proxy) {
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
    public function getCoSeqFormularioInscricao()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCoSeqFormularioInscricao();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqFormularioInscricao', array());

        return parent::getCoSeqFormularioInscricao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqFormularioInscricao($coSeqFormularioInscricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqFormularioInscricao', array($coSeqFormularioInscricao));

        return parent::setCoSeqFormularioInscricao($coSeqFormularioInscricao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsAnexos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsAnexos', array());

        return parent::getDsAnexos();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsAnexos($dsAnexos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsAnexos', array($dsAnexos));

        return parent::setDsAnexos($dsAnexos);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsApresentacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsApresentacao', array());

        return parent::getDsApresentacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsApresentacao($dsApresentacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsApresentacao', array($dsApresentacao));

        return parent::setDsApresentacao($dsApresentacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsDeclaracao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsDeclaracao', array());

        return parent::getDsDeclaracao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsDeclaracao($dsDeclaracao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsDeclaracao', array($dsDeclaracao));

        return parent::setDsDeclaracao($dsDeclaracao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsObjeto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsObjeto', array());

        return parent::getDsObjeto();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsObjeto($dsObjeto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsObjeto', array($dsObjeto));

        return parent::setDsObjeto($dsObjeto);
    }

    /**
     * {@inheritDoc}
     */
    public function setDsAreaEvento($dsAreaEvento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsAreaEvento', array($dsAreaEvento));

        return parent::setDsAreaEvento($dsAreaEvento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsAreaEvento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsAreaEvento', array());

        return parent::getDsAreaEvento();
    }

    /**
     * {@inheritDoc}
     */
    public function getDsResumo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsResumo', array());

        return parent::getDsResumo();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsResumo($dsResumo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsResumo', array($dsResumo));

        return parent::setDsResumo($dsResumo);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsTitulo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsTitulo', array());

        return parent::getDsTitulo();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsTitulo($dsTitulo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsTitulo', array($dsTitulo));

        return parent::setDsTitulo($dsTitulo);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtFim()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtFim', array());

        return parent::getDtFim();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtFim($dtFim)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtFim', array($dtFim));

        return parent::setDtFim($dtFim);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtInicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtInicio', array());

        return parent::getDtInicio();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtInicio($dtInicio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtInicio', array($dtInicio));

        return parent::setDtInicio($dtInicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuFormulario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuFormulario', array());

        return parent::getNuFormulario();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuFormulario($nuFormulario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuFormulario', array($nuFormulario));

        return parent::setNuFormulario($nuFormulario);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoSituacaoFormulario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSituacaoFormulario', array());

        return parent::getCoSituacaoFormulario();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSituacaoFormulario($coSituacaoFormulario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSituacaoFormulario', array($coSituacaoFormulario));

        return parent::setCoSituacaoFormulario($coSituacaoFormulario);
    }

    /**
     * {@inheritDoc}
     */
    public function setCoUsuario($coUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoUsuario', array($coUsuario));

        return parent::setCoUsuario($coUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoUsuario', array());

        return parent::getCoUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsJustificativa($dsJustificativa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsJustificativa', array($dsJustificativa));

        return parent::setDsJustificativa($dsJustificativa);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsJustificativa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsJustificativa', array());

        return parent::getDsJustificativa();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtProrrogacao($dtProrrogacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtProrrogacao', array($dtProrrogacao));

        return parent::setDtProrrogacao($dtProrrogacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtProrrogacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtProrrogacao', array());

        return parent::getDtProrrogacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoUltimaSituacaoFormulario($coUltimaSituacaoFormulario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoUltimaSituacaoFormulario', array($coUltimaSituacaoFormulario));

        return parent::setCoUltimaSituacaoFormulario($coUltimaSituacaoFormulario);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoUltimaSituacaoFormulario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoUltimaSituacaoFormulario', array());

        return parent::getCoUltimaSituacaoFormulario();
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
