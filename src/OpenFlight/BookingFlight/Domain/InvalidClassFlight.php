<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class InvalidClassFlight extends DomainError
{


    public function __construct(private string $inClassFlight)
    {
    }

    public function errorCode(): string
    {
        return 'invalid_ClassFlight';
    }

    protected function errorMessage(): string
    {
        return sprintf('The Class Flight is invalid', $this->inClassFlight);
    }
}