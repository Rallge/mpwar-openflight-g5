<?php

namespace CodelyTv\OpenFlight\Users\Application;

use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class UserLogin
{
    //inyección de dependencias
    public function __construct(private UserRepository $repository)
    {
    }

    // Hace referencia cuando instancia la clase
    public function __invoke(string $username, string $password): void
    {
        //Usuario devuelto desde la base de datos
        $userDevuelto = $this->repository->Login($username,$password);
        $userDevuelto->loginUserValidate($password);
    }
}
