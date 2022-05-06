<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\ValueObject\Uuid;

class Flight
{
    private Uuid $id;
    private string $origin;
    private string $destination;
    private int $flightHours;
    private float $price;
    private static array $currencies=[
        '$', '£', '€'];
    private string $currency;
    private string $departureDate;
    private string $aircraft;
    private string $airline;

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

    public function __construct(Uuid $id, string $origin, string $destination, int $flightHours, float $price, string $currency, string $departureDate, string $aircraft, string $airline)
    {
        $this->id = $id;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->flightHours = $flightHours;
        $this->price = $price;
        $this->currency = $currency;
        $this->departureDate = $departureDate;
        $this->aircraft = $aircraft;
        $this->airline = $airline;
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function origin(): string
    {
        return $this->origin;
    }

    /**
     * @return string
     */
    public function destination(): string
    {
        return $this->destination;
    }

    /**
     * @return int
     */
    public function flightHours(): int
    {
        return $this->flightHours;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function currency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function departureDate(): string
    {
        return $this->departureDate;
    }

    /**
     * @return string
     */
    public function aircraft(): string
    {
        return $this->aircraft;
    }

    /**
     * @return string
     */
    public function airline(): string
    {
        return $this->airline;
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

    public static function validateflightHours(int $InflightHours){
        if($InflightHours<1){
            throw new InvalidFlightHours($InflightHours);
        }
    }

    public static function validateCurrency(string $InCurrency){
        if(!in_array($InCurrency,selft::currencies)){
            throw new InvalidCurrency($InCurrency);
        }
    }

    public static function validateDepartureDate(string $InDepartureDate){
        $currentDate = strtotime(date("Y-m-d H:i:s",time()));
        $intDate = strtotime($InDepartureDate);
        if($currentDate > $intDate){
            throw new InvalidDepartureDate($InDepartureDate);
        }
    }

}