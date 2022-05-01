<?php
declare(strict_types=1);


namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Users;


use CodelyTv\OpenFlight\Users\Application\UserRegistration;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RegisterPutController
{
    public function __construct(private UserRegistration $userRegistration)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        try {


            $data = $request->toArray();
           /*Para verificar
            dd(                $id,
               $data['username'],
                $data['name'],
                $data['last_name'],
                $data['password']);*/

            $this->userRegistration->__invoke(
                $id,
                $data['username'],
                $data['name'],
                $data['last_name'],
                $data['password']
            );
            return new JsonResponse("OK", Response::HTTP_CREATED);
        } catch (DomainError $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}