<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\OpenFlight\Flight\Domain\valueObject\Journey;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class Flight
{
    private Uuid $id;
    private Journey $journey;
    private int $flightHours;
    private float $price;
    private static array $currencies=[
        '$', '£', '€'];
    private string $currency;
    private string $departureDate;
    private string $aircraft;
    private string $airline;

    public function __construct(Uuid $id, Journey $journey, int $flightHours, float $price, string $currency, string $departureDate, string $aircraft, string $airline)
    {
        $this->id = $id;
        $this->journey = $journey;
        $this->flightHours = $flightHours;
        $this->price = $price;
        $this->currency = $currency;
        $this->departureDate = $departureDate;
        $this->aircraft = $aircraft;
        $this->airline = $airline;
    }

    /**
     * @return Journey
     */
    public function journey(): Journey
    {
        return $this->journey;
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
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

    public static function validateflightHours(int $InflightHours){
        if($InflightHours<1){
            throw new InvalidFlightHours($InflightHours);
        }
    }

    public static function validateCurrency(string $InCurrency){
        if(!in_array($InCurrency,self::$currencies)){
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

    public static function registerFlight(Uuid $id, Journey $journey, int $flightHours, float $price, string $currency, string $departureDate, string $aircraft, string $airline) {

        self::validateflightHours($flightHours);
        self::validateCurrency($currency);
        self::validateDepartureDate($departureDate);
        return  new self($id,$journey,$flightHours,  $price,  $currency, $departureDate,  $aircraft, $airline);

    }

}