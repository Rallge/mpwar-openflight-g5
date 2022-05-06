<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class InvalidFlightHours extends DomainError
{

    public function __construct(private int $InflightHours)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_flightHours';
    }

    protected function errorMessage(): string
    {
        return sprintf('Flight hours must be greater than 1', $this->InflightHours);
    }
}