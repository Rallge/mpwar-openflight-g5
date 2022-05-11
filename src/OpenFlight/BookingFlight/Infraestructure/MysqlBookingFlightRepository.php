<?php

namespace CodelyTv\OpenFlight\BookingFlight\Infraestructure;

use CodelyTv\OpenFlight\BookingFlight\Domain\BookingFlight;
use CodelyTv\OpenFlight\BookingFlight\Domain\BookingFlightRepository;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;

class MysqlBookingFlightRepository implements BookingFlightRepository
{

    public function __construct(private Mysql $mysql)
    {
    }

    public function save(BookingFlight $bookingFlight): void
    {
        $sql = 'INSERT INTO booking_flight VALUES (:id, :idUser, :idFlight, :price, :reservationDate, :seat, :class)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $bookingFlight->ID()->value());
        $statement->bindValue(':idUser', $bookingFlight->idUser()->value());
        $statement->bindValue(':idFlight', $bookingFlight->idFlight()->value());
        $statement->bindValue(':price', $bookingFlight->price());
        $statement->bindValue(':reservationDate', $bookingFlight->reservationDate());
        $statement->bindValue(':seat', $bookingFlight->seat());
        $statement->bindValue(':class', $bookingFlight->classFlight()->classFlights());
        $statement->execute();
    }
}