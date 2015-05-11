<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 16/01/14
 * Time: 09:48
 */

namespace Datasus\Sisvs\Base\SecurityBundle\Service;


use Datasus\Sisvs\Base\BaseBundle\Service\BaseService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserSCPAService extends BaseService
{

    protected $entity = 'Datasus\Sisvs\Base\SecurityBundle\Entity\UsuarioEntity';
    /**
     * @var \SoapClient
     */
    protected $_client = null;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        parent::__construct($entityManager, $container);

        $this->setClient();
    }

    /**
     * @return array
     */
    public function getDataAuth()
    {
        return array(
            'autenticacao' => array(
                'email'        => $this->getContainer()->getParameter('scpa_email'),
                'senha'        => hash('sha256', $this->getContainer()->getParameter('scpa_senha')),
                'siglaSistema' => $this->getContainer()->getParameter('scpa_sigla_sistema')
            )
        );
    }

    /**
     * @return \SoapClient
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * @param \SoapClient $client
     */
    public function setClient($client = null, array $options = array())
    {
        if (null === $client) {
            $client = $this->getWsdl();
        }

        if (null === $options) {
            $options = $this->getOptions();
        }

        try {
            $this->_client = new \SoapClient($client, $options);
        } catch (\SoapFault $exc) {
            $this->registerError('security.validations.default.notConnect');
            $this->triggerErrors();
        }
    }

    /**
     * @return string
     */
    public function getWsdl()
    {
        return $this->getContainer()->getParameter('scpa_wsdl');
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->getContainer()->getParameter('scpa_wsdl_options');
    }

    /**
     * @param $username
     * @param $password
     */
    public function validateAuth($username, $password)
    {
        $this->_validatePassword($password);
        $this->_validateEmail($username);
        $this->triggerErrors();
    }

    /**
     * @param $password
     *
     * @return int
     */
    protected function _validatePassword($password)
    {
        $validateEmpty          = new NotBlank();
        $validateEmpty->message = 'security.validations.password.notBlank';

        $erros = $this->getValidator()->validateValue($password, $validateEmpty);

        if ($erros->count()) {
            foreach ($erros as $value) {
                $this->registerError($value->getMessage());
            }
        }
    }

    /**
     * @param $email
     *
     * @return int
     */
    protected function _validateEmail($email)
    {
        $validateEmail          = new Email();
        $validateEmail->message = 'security.validations.email.notValidEmail';

        $validateEmpty          = new NotBlank();
        $validateEmpty->message = 'security.validations.email.notBlank';

        $email = $email == 'NONE_PROVIDED' ? '' : $email;
        $erros = $this->getValidator()->validateValue($email, array($validateEmail, $validateEmpty));

        if ($erros->count()) {
            foreach ($erros as $value) {
                $this->registerError($value->getMessage());
            }
        }
    }

    /**
     * @param $username
     * @param $password
     *
     * @return array
     */
    public function getTipoPerfisSCPA($coSeqUsuario)
    {
        $arrPerfil = array();

        if (isset($coSeqUsuario->perfis)) {
            foreach ($coSeqUsuario->perfis->perfil as $value) {
                $arrPerfil['ROLE_' . $value->perfil->sigla] = $value->perfil->nome;
            }
        }

        return $arrPerfil;
    }

    /**
     * @param $user
     *
     * @return array
     */
    public function getPerfisSCPA($coSeqUsuario)
    {
        $repository = 'DatasusSisvsBaseSecurityBundle::UsuarioSCPAEntity';
        $result     = $this->getRepository($repository)->findByCoSeqUsuario($coSeqUsuario);

        $arrPerfil = array();

        foreach ($result as $value) {
            $arrPerfil[$value->getSgPerfil()] = $value->getDsPerfil();
        }

        return $arrPerfil;
    }

    /**
     * @param $email
     * @param $password
     *
     * @return bool
     */
    public function authenticate($email, $password)
    {
        $criteria = array(
            'autenticacao' => array(
                'email'        => $email,
                'senha'        => $password,
                'siglaSistema' => $this->getContainer()->getParameter('scpa_sigla_sistema')
            )
        );

        $result = $this->callMethodSoap('buscaPerfilUsuario', $criteria);

        if ($result) {
            return $result->respostaBuscaPerfilUsuario;
        }

        return false;
    }

    /**
     * @param       $method
     * @param array $criteria
     *
     * @return bool|mixed|\stdClass
     */
    public function callMethodSoap($method, array $criteria)
    {
        try {
            return $this->_client->__soapCall($method, array($criteria));
        } catch (\SoapFault $exc) {
            return false;
        }
    }

    /**
     * @return RedirectResponse
     */
    public function redirectUser()
    {
        $context = $this->getContainer()->get('security.context');
        $router  = $this->getContainer()->get('router');
        $roles   = $context->getToken()->getUser()->getRoles();

        if (count($roles) == 0) {
            $this->registerError('security.validations.default.requiredProfile');

            return new RedirectResponse($router->generate('datasus_sisvs_base_security_auth_login'));
        }

        if (count($roles) > 1 && !$context->getToken()->isAuthenticated()) {
            $route = $router->generate('datasus_sisvs_base_security_auth_perfil');

            return new RedirectResponse($route);
        }

        if (count($roles) == 1 && !$context->getToken()->isAuthenticated()) {
            $this->setUserSession($context->getToken()->getUser()->getUsername(), array(
                $context->getToken()->getUser()->getCurrentRole()
            ));
        }

        $currentRole = current($context->getToken()->getRoles())->getRole();

        /**
         * @todo refatorar role
         */
        switch ($currentRole) {
            case 'ROLE_COO':
                return new RedirectResponse($router->generate('administrativo_default'));
                break;

            case 'ROLE_AUT':
                return new RedirectResponse($router->generate('autor_default'));
                break;

            default:
                $this->registerError('security.validations.default.requiredProfile');

                return new RedirectResponse($router->generate('datasus_sisvs_base_security_auth_login'));
                break;
        }
    }

    /**
     * @param       $username
     * @param array $roles
     */
    public function setUserSession($username, array $roles = array())
    {
        $context     = $this->getContainer()->get('security.context');
        $user        = $context->getToken()->getUser();
        $providerKey = $context->getToken()->getProviderKey();

        $roleUser = $user->getRoles();
        $user->setRoles(array(array_search(current($roles), $roleUser) => current($roles)));

        $authenticatedToken = new UsernamePasswordToken($user, $username, $providerKey, $roles);
        $context->setToken($authenticatedToken);
    }
}

