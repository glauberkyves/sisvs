<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Security\Http\Authentication;

use Datasus\Sisvs\Base\BaseBundle\Service\AbstractService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationSuccessHandler extends AbstractService implements AuthenticationSuccessHandlerInterface
{
    protected $httpUtils;
    protected $options;
    protected $providerKey;

    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $context = $this->getContainer()->get('security.context');
        $context->getToken()->setAuthenticated(false);

        return $this->getContainer()->get('datasus_sisvs_base_service_scpa')->redirectUser();
    }
}
