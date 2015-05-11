<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Security\Http\Authentication;

use Datasus\Sisvs\Base\BaseBundle\Service\AbstractService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler extends AbstractService implements AccessDeniedHandlerInterface
{
    /**
     * Handles an access denied failure.
     *
     * @param Request $request
     * @param AccessDeniedException $accessDeniedException
     *
     * @return Response may return null
     */
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $this->registerError('security.validations.default.requiredProfile');

        return $this->getContainer()->get('datasus_sisvs_base_service_scpa')->redirectUser();
    }

}
