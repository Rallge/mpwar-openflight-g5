<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class NotExistAirport extends DomainError
{


    public function __construct(public string $InAirport)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_airport';
    }

    protected function errorMessage(): string
    {
        return sprintf('The airport provided <%s> not exist ',$this->InAirport);
    }
}