<?php

namespace Proxies\__CG__\Datasus\Sisvs\Base\SecurityBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UsuarioSCPAEntity extends \Datasus\Sisvs\Base\SecurityBundle\Entity\UsuarioSCPAEntity implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqUsuario', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coEsferaAtuacao', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEsfera', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEsferaAtuacao', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsPaginaInicial', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEmailCorporativo', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dtAutorizacaoAcesso', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dtSolicitacaoAcesso', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'sgPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'sgSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stPerfilOculto', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoUsrPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoUsuario', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stUsuarioPerfilEsfera', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coUsuario');
        }

        return array('__isInitialized__', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqUsuario', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coEsferaAtuacao', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coSeqSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEsfera', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEsferaAtuacao', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsPaginaInicial', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dsEmailCorporativo', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dtAutorizacaoAcesso', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'dtSolicitacaoAcesso', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'sgPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'sgSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stPerfilOculto', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoSistema', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoUsrPerfil', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stRegistroAtivoUsuario', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'stUsuarioPerfilEsfera', '' . "\0" . 'Datasus\\Sisvs\\Base\\SecurityBundle\\Entity\\UsuarioSCPAEntity' . "\0" . 'coUsuario');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UsuarioSCPAEntity $proxy) {
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
    public function getCoEsferaAtuacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoEsferaAtuacao', array());

        return parent::getCoEsferaAtuacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoEsferaAtuacao($coEsferaAtuacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoEsferaAtuacao', array($coEsferaAtuacao));

        return parent::setCoEsferaAtuacao($coEsferaAtuacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoPerfil', array());

        return parent::getCoPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoPerfil($coPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoPerfil', array($coPerfil));

        return parent::setCoPerfil($coPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoSeqPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqPerfil', array());

        return parent::getCoSeqPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqPerfil($coSeqPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqPerfil', array($coSeqPerfil));

        return parent::setCoSeqPerfil($coSeqPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoSeqSistema()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqSistema', array());

        return parent::getCoSeqSistema();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqSistema($coSeqSistema)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqSistema', array($coSeqSistema));

        return parent::setCoSeqSistema($coSeqSistema);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoSeqUsuario()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCoSeqUsuario();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoSeqUsuario', array());

        return parent::getCoSeqUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoSeqUsuario($coSeqUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoSeqUsuario', array($coSeqUsuario));

        return parent::setCoSeqUsuario($coSeqUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEsfera()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEsfera', array());

        return parent::getDsEsfera();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEsfera($dsEsfera)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEsfera', array($dsEsfera));

        return parent::setDsEsfera($dsEsfera);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEsferaAtuacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEsferaAtuacao', array());

        return parent::getDsEsferaAtuacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEsferaAtuacao($dsEsferaAtuacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEsferaAtuacao', array($dsEsferaAtuacao));

        return parent::setDsEsferaAtuacao($dsEsferaAtuacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsPaginaInicial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsPaginaInicial', array());

        return parent::getDsPaginaInicial();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsPaginaInicial($dsPaginaInicial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsPaginaInicial', array($dsPaginaInicial));

        return parent::setDsPaginaInicial($dsPaginaInicial);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsPerfil', array());

        return parent::getDsPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsPerfil($dsPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsPerfil', array($dsPerfil));

        return parent::setDsPerfil($dsPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsSistema()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsSistema', array());

        return parent::getDsSistema();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsSistema($dsSistema)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsSistema', array($dsSistema));

        return parent::setDsSistema($dsSistema);
    }

    /**
     * {@inheritDoc}
     */
    public function setDsEmailCorporativo($dsEmailCorporativo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsEmailCorporativo', array($dsEmailCorporativo));

        return parent::setDsEmailCorporativo($dsEmailCorporativo);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsEmailCorporativo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsEmailCorporativo', array());

        return parent::getDsEmailCorporativo();
    }

    /**
     * {@inheritDoc}
     */
    public function getDtAutorizacaoAcesso()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtAutorizacaoAcesso', array());

        return parent::getDtAutorizacaoAcesso();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtAutorizacaoAcesso($dtAutorizacaoAcesso)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtAutorizacaoAcesso', array($dtAutorizacaoAcesso));

        return parent::setDtAutorizacaoAcesso($dtAutorizacaoAcesso);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtSolicitacaoAcesso()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtSolicitacaoAcesso', array());

        return parent::getDtSolicitacaoAcesso();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtSolicitacaoAcesso($dtSolicitacaoAcesso)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtSolicitacaoAcesso', array($dtSolicitacaoAcesso));

        return parent::setDtSolicitacaoAcesso($dtSolicitacaoAcesso);
    }

    /**
     * {@inheritDoc}
     */
    public function getSgPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSgPerfil', array());

        return parent::getSgPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setSgPerfil($sgPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSgPerfil', array($sgPerfil));

        return parent::setSgPerfil($sgPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getSgSistema()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSgSistema', array());

        return parent::getSgSistema();
    }

    /**
     * {@inheritDoc}
     */
    public function setSgSistema($sgSistema)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSgSistema', array($sgSistema));

        return parent::setSgSistema($sgSistema);
    }

    /**
     * {@inheritDoc}
     */
    public function getStPerfilOculto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStPerfilOculto', array());

        return parent::getStPerfilOculto();
    }

    /**
     * {@inheritDoc}
     */
    public function setStPerfilOculto($stPerfilOculto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStPerfilOculto', array($stPerfilOculto));

        return parent::setStPerfilOculto($stPerfilOculto);
    }

    /**
     * {@inheritDoc}
     */
    public function getStRegistroAtivoPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStRegistroAtivoPerfil', array());

        return parent::getStRegistroAtivoPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setStRegistroAtivoPerfil($stRegistroAtivoPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStRegistroAtivoPerfil', array($stRegistroAtivoPerfil));

        return parent::setStRegistroAtivoPerfil($stRegistroAtivoPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getStRegistroAtivoSistema()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStRegistroAtivoSistema', array());

        return parent::getStRegistroAtivoSistema();
    }

    /**
     * {@inheritDoc}
     */
    public function setStRegistroAtivoSistema($stRegistroAtivoSistema)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStRegistroAtivoSistema', array($stRegistroAtivoSistema));

        return parent::setStRegistroAtivoSistema($stRegistroAtivoSistema);
    }

    /**
     * {@inheritDoc}
     */
    public function getStRegistroAtivoUsrPerfil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStRegistroAtivoUsrPerfil', array());

        return parent::getStRegistroAtivoUsrPerfil();
    }

    /**
     * {@inheritDoc}
     */
    public function setStRegistroAtivoUsrPerfil($stRegistroAtivoUsrPerfil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStRegistroAtivoUsrPerfil', array($stRegistroAtivoUsrPerfil));

        return parent::setStRegistroAtivoUsrPerfil($stRegistroAtivoUsrPerfil);
    }

    /**
     * {@inheritDoc}
     */
    public function getStRegistroAtivoUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStRegistroAtivoUsuario', array());

        return parent::getStRegistroAtivoUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setStRegistroAtivoUsuario($stRegistroAtivoUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStRegistroAtivoUsuario', array($stRegistroAtivoUsuario));

        return parent::setStRegistroAtivoUsuario($stRegistroAtivoUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getStUsuarioPerfilEsfera()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStUsuarioPerfilEsfera', array());

        return parent::getStUsuarioPerfilEsfera();
    }

    /**
     * {@inheritDoc}
     */
    public function setStUsuarioPerfilEsfera($stUsuarioPerfilEsfera)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStUsuarioPerfilEsfera', array($stUsuarioPerfilEsfera));

        return parent::setStUsuarioPerfilEsfera($stUsuarioPerfilEsfera);
    }

}