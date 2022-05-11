<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\OpenFlight\BookingFlight\Domain\ValueObject\ClassFlight;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class BookingFlight
{
    private Uuid $id; //Cod. Reserva
    private Uuid $idFlight;
    private Uuid $idUser;
    private int $price;
    private string $seat;
    private string $reservationDate;
    private ClassFlight $classFlight;

    public function __construct(Uuid $id, Uuid $idUser,Uuid $idFlight, int $price, string $seat, ClassFlight $classFlight)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idFlight = $idFlight;
        self::validateEmptyPrice($price);
        $this->price = $price;
        self::validateEmptySeat($seat);
        $this->seat = $seat;
        $this->reservationDate = (new \DateTimeImmutable())->format('Y-m-d H:i:s');
        $this->classFlight = $classFlight;
    }

    /**
     * @return Uuid
     */
    public function id(): Uuid
    {
        return $this->id;
    }

    /**
     * @return Uuid
     */
    public function idUser(): Uuid
    {
        return $this->idUser;
    }

    /**
     * @return Uuid
     */
    public function idFlight(): Uuid
    {
        return $this->idFlight;
    }

    /**
     * @return int
     */
    public function price(): int
    {
        return $this->price;
    }
    /**
     * @return string
     */
    public function seat(): string
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    public function reservationDate(): string
    {
        return $this->reservationDate;
    }

    /**
     * @return ClassFlight
     */
    public function classFlight(): ClassFlight
    {
        return $this->classFlight;
    }

    public static function validateEmptyPrice(int $price)
    {

        if ($price == 0) {
            throw new EmptyPrice();
        }
    }

    public static function validateEmptySeat(string $seat)
    {
        if ($seat == "") {
            throw new EmptySeat();
        }
    }

    public static function RegisterBookingFlight(Uuid $id, Uuid $idUser, Uuid $idFlight, int $price, string $seat, ClassFlight $classFlight):BookingFlight{
        return new self($id,$idUser, $idFlight,$price,$seat,$classFlight);
    }
}