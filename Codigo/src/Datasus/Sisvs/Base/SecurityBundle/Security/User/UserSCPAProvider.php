<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Security\User;

use Datasus\Core\BaseBundle\ServiceLayer\ServiceAbstract;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class UserSCPAProvider extends ServiceAbstract implements UserProviderInterface
{

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserSCPA) {
            $this->registerError(sprintf('Instances of "%s" are not supported.', get_class($user)));
            $this->triggerErrors();
        }

        return $user;
    }

    public function loadUserByUsername($username)
    {
        $service  = $this->getContainer()->get('datasus_sisvs_base_service_scpa');
        $password = bin2hex(hash('sha256', $this->getContainer()->get('request')->get('_password'), true));

        $service->validateAuth($username, $password);

        $coSeqUsuario = $service->authenticate($username, $password);

        if ($coSeqUsuario instanceof \stdClass) {
            $attr = $service->find($coSeqUsuario->usuario->id);

            if (!$attr) {
                $this->registerError('security.validations.default.requiredProfile');

                $route = $service->getContainer()->get('router')->generate('datasus_sisvs_base_security_auth_login');
                return new RedirectResponse($route);
            }

            $roles = array_flip($service->getTipoPerfisSCPA($coSeqUsuario));

            return new UserSCPA($username, $password, '', $roles, $attr);
        } else {
            $this->registerError('security.validations.default.badCredentials');
            $this->triggerErrors();
        }
    }

    public function supportsClass($class)
    {
        return $class === 'Datasus\Sisvs\Base\SecurityBundle\Security\User\UserSCPA';
    }
}