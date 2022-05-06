<?php

namespace CodelyTv\OpenFlight\Flight\Application;

use CodelyTv\OpenFlight\Flight\Domain\Flight;
use CodelyTv\OpenFlight\Flight\Domain\FlightRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class FlightRegistration
{

    public function __construct(private FlightRepository $repository)
    {

    }

    public function __invoke(Uuid $id, string $origin, string $destination, int $flightHours, float $price, string $currency, string $departureDate, string $aircraft, string $airline)
    {
        $uuid = new Uuid($id);
        $flight = Flight::registerFlight($id, $origin, $destination,  $flightHours,  $price,  $currency, $departureDate,  $aircraft, $airline);
        $this->repository($flight);
    }


}