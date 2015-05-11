<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends AbstractController
{

    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        return $this->render(
            'DatasusSisvsBaseSecurityBundle:Security:login.html.twig',
            array(
                'last_email' => $session->get(SecurityContext::LAST_USERNAME)
            )
        );
    }

    public function perfilAction()
    {
        $context = $this->get('security.context');
        $token   = $context->getToken();
        $user    = $token->getUser();

        $service  = $this->get('datasus_sisvs_base_service_scpa');
        $arrRoles = $this->container->getParameter('spca_role');

        $arrPerfil = array_flip(array_filter(array_flip($arrRoles), function ($value) use ($user, $arrRoles) {
            if (in_array($value, $user->getRoles())) {
                return $arrRoles[$value];
            }
        }));

        if ($this->getRequest()->isMethod('POST')) {
            foreach ($user->getRoles() as $role) {
                if ($this->getRequest()->get('perfil') == $role) {

                    $service->setUserSession($user->getUsername(), array(
                        $role
                    ));

                    return $service->redirectUser();
                }
            }

            $service->registerError('security.validations.default.requiredProfile');
        }

        return $this->render(
            'DatasusSisvsBaseSecurityBundle:Security:perfil.html.twig',
            array(
                'arrPerfil' => $arrPerfil
            )
        );
    }

    public function checkRouteAction()
    {
        return $this->get('datasus_sisvs_base_service_scpa')->redirectUser();
    }
}
