<?php

namespace CodelyTv\OpenFlight\Users\Domain;

use CodelyTv\Shared\Domain\DomainError;

class NotFoundUser extends DomainError
{
    public function __construct(private string $username)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'not_found_user';
    }

    protected function errorMessage(): string
    {
        return sprintf('Not found user.', $this->username);
    }

}