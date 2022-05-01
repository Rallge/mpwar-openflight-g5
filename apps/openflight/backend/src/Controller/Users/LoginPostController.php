<?php

namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Users;

use CodelyTv\OpenFlight\Users\Application\UserLogin;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginPostController
{
    public function __construct(private UserLogin $userLogin)
    {

    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->userLogin->__invoke(
            $request->request->getAlpha('username'),
            $request->request->get('password')
        );

        return new JsonResponse("Usuario Logueado",Response::HTTP_OK);
        // TODO: Implement __invoke() method.
    }

}