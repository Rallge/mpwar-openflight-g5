<?php

namespace CodelyTv\OpenFlight\BookingFlight\Application;

use CodelyTv\OpenFlight\BookingFlight\Domain\BookingFlight;
use CodelyTv\OpenFlight\BookingFlight\Domain\BookingFlightRepository;
use CodelyTv\OpenFlight\BookingFlight\Domain\ValueObject\ClassFlight;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class BookingFlightRegistration
{

    public function __construct(private BookingFlightRepository $repository)
    {

    }

    public function __invoke(string $id, string $idFlight, string $idUser, string $seat, float $price, string $classFlight)
    {
        $uuid = new Uuid($id);
        $uuidFlight = new Uuid($idFlight);
        $uuidUser = new Uuid($idUser);
        $classFlight = new ClassFlight($classFlight);

        $bookingFlight = BookingFlight::RegisterBookingFlight($uuid,$uuidFlight,$uuidUser,$seat,$price,$classFlight);
        $this->repository->Save($bookingFlight);

    }
}