<?php

namespace CodelyTv\OpenFlight\Flight\Application;

use CodelyTv\OpenFlight\Flight\Domain\Flight;
use CodelyTv\OpenFlight\Flight\Domain\FlightRepository;
use CodelyTv\OpenFlight\Flight\Domain\valueObject\Journey;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class FlightRegistration
{

    public function __construct(private FlightRepository $repository)
    {

    }

    public function __invoke(string $id, string $origin, string $destination, int $flightHours, int $price, string $currency, string $departureDate, string $aircraft, string $airline)
    {
        $uuid = new Uuid($id);
        $journey = new Journey($origin,$destination);
        $flight = Flight::registerFlight( $uuid, $journey,  $flightHours,  $price,  $currency, $departureDate,  $aircraft, $airline);
        $this->repository->save($flight);
    }


}