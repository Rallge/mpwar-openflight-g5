<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class AirportsOriginAndDestinationAreEquals extends DomainError
{

    public function __construct(private string $InAirportOrigin, private string $InAirportDestination)
    {
        parent::__construct();
    }


    public function errorCode(): string
    {
        return 'not_different_airports';
    }

    protected function errorMessage(): string
    {
        return sprintf('The airport of departure must be different from the airport of arrival', $this->InAirportOrigin);
    }
}