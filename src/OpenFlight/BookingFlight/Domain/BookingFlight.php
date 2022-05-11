<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\Shared\Domain\ValueObject\Uuid;

class BookingFlight
{

    private Uuid $id; //Cod. Reserva
    private Uuid $idFlight;
    private Uuid $idUser;
    private string $seat;
    private float $price;
    private string $reservationDate;
}