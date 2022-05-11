<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\OpenFlight\BookingFlight\Domain\ValueObject\ClassFlight;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class BookingFlight
{

    private Uuid $id; //Cod. Reserva
    private Uuid $idFlight;
    private Uuid $idUser;
    private string $seat;
    private float $price;
    private string $reservationDate;
    private ClassFlight $classFlight;

    /**
     * @param Uuid $id
     * @param Uuid $idFlight
     * @param Uuid $idUser
     * @param string $seat
     * @param float $price
     * @param string $reservationDate
     * @param ClassFlight $classFlight
     */
    public function __construct(Uuid $id, Uuid $idFlight, Uuid $idUser, string $seat, float $price, string $reservationDate, ClassFlight $classFlight)
    {
        $this->id = $id;
        $this->idFlight = $idFlight;
        $this->idUser = $idUser;
        $this->seat = $seat;
        $this->price = $price;
        $this->reservationDate = $reservationDate;
        $this->classFlight = $classFlight;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return Uuid
     */
    public function getIdFlight(): Uuid
    {
        return $this->idFlight;
    }

    /**
     * @return Uuid
     */
    public function getIdUser(): Uuid
    {
        return $this->idUser;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getReservationDate(): string
    {
        return $this->reservationDate;
    }

    /**
     * @return ClassFlight
     */
    public function getClassFlight(): ClassFlight
    {
        return $this->classFlight;
    }



}