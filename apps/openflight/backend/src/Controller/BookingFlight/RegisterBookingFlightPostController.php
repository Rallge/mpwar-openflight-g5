<?php

namespace CodelyTv\Apps\OpenFlight\Backend\Controller\BookingFlight;

use CodelyTv\OpenFlight\BookingFlight\Application\BookingFlightRegistration;
use CodelyTv\Shared\Domain\DomainError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterBookingFlightPostController
{
    public function __construct(private BookingFlightRegistration $bookingFlightRegistration)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        try {

            $data = $request->toArray();
            $this->bookingFlightRegistration->__invoke(
                $id,
                $data["idUser"],
                $data["idFlight"],
                $data["seat"],
                $data["price"],
                $data["class"]);

            return new JsonResponse("OK Booking Flight Created", Response::HTTP_CREATED);

        } catch (DomainError $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);


        }

    }
}