<?php


namespace CodelyTv\OpenFlight\Users\Domain;


use CodelyTv\Shared\Domain\ValueObject\Uuid;

interface UserRepository
{
    public function Save(User $user): void;

    public function Login(string $user, string $password): User;
}