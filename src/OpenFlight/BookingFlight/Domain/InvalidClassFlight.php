<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class InvalidClassFlight extends DomainError
{


    public function __construct(private string $inClassFlight)
    {
        parent::__construct();
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