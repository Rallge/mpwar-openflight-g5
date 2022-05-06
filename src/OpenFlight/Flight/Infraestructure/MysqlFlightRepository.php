<?php

namespace CodelyTv\OpenFlight\Flight\Infraestructure;

use CodelyTv\OpenFlight\Flight\Domain\Flight;
use CodelyTv\OpenFlight\Flight\Domain\FlightRepository;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;

class MysqlFlightRepository implements FlightRepository
{


    public function __construct(private Mysql $mysql)
    {
    }

    public function save(Flight $flight): void
    {
        $sql = 'INSERT INTO flight VALUES (:id, :origin, :destination, :flight_hours, :price, :currency, :departure_date, :aircraft, :airline)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $flight->ID()->value());
        $statement->bindValue(':origin', $flight->origin());
        $statement->bindValue(':destination', $flight->destination());
        $statement->bindValue(':flight_hours', $flight->flightHours());
        $statement->bindValue(':price', $flight->price());
        $statement->bindValue(':currency', $flight->currency());
        $statement->bindValue(':departure_date', $flight->departureDate());
        $statement->bindValue(':aircraft', $flight->aircraft());
        $statement->bindValue(':airline', $flight->airline());
        $statement->execute();
    }
}