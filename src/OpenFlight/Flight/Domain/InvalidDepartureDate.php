<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class InvalidDepartureDate extends DomainError
{

    public function __construct(private string $InDepartureDate)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_DepartureDate';
    }

    protected function errorMessage(): string
    {
        return sprintf('The departure date must be greater than the current date', $this->InDepartureDate);
    }
}