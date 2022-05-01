<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Domain;

use CodelyTv\Shared\Domain\DomainError;

final class InvalidPasswordLogin extends DomainError
{
    public function __construct(private string $password)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_credentials';
    }

    protected function errorMessage(): string
    {
        return sprintf('The password provided <%s> is invalid.', $this->password);
    }
}
