<?php

namespace CodelyTv\OpenFlight\Flight\Domain\valueObject;

class Journey
{
    private string $origin;
    private string $destination;
    private static array $airports = [
        'BCN',
        'LAX',
        'DME',
        'DXB',
        'GRU',
        'GYE',
        'HND' .
        'HKG',
        'JFK',
        'LAS',
        'LIM',
        'MIA',
        'MUC',
        'MXP',
        'SCL',
        'TLS',
        'VVI',
        'YOW',
        'MAD',
        'LIS'
    ];


    public function __construct(string $origin, string $destination)
    {
        self::validateAirport($origin);
        self::validateAirport($destination);
        self::validateAirportOriginWithAirportDestination($origin,$destination);
        $this->origin = $origin;
        $this->destination = $destination;
    }

    public function origin(): string
    {
        return $this->origin;
    }

    public function destination(): string
    {
        return $this->destination;
    }

    public static function validateAirport(string $InAirport)
    {

        if (!in_array($InAirport, self::$airports)) {
            throw new NotExistAirport($InAirport);
        }
    }

    public static function validateAirportOriginWithAirportDestination(string $InAirportOrigin, string $InAirportDestination)
    {

        if ($InAirportOrigin === $InAirportDestination) {
            throw new AirportsOriginAndDestinationAreEquals($InAirportOrigin,$InAirportDestination);
        }
    }
}