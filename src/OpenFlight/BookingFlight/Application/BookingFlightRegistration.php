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

    public function __invoke(string $id,  string $idUser, string $idFlight, string $seat, int $price, string $classFlight)
    {
        $uuid = new Uuid($id);
        $uuidUser = new Uuid($idUser);
        $uuidFlight = new Uuid($idFlight);
        $classFlight = new ClassFlight($classFlight);

        $bookingFlight = BookingFlight::RegisterBookingFlight($uuid,$uuidUser,$uuidFlight,$price,$seat,$classFlight);
        $this->repository->Save($bookingFlight);

    }
}