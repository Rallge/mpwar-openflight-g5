<?php

namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Flight;

use CodelyTv\OpenFlight\Flight\Application\FlightRegistration;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RegisterFlightPostController
{
    public function __construct(private FlightRegistration $flightRegistration)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        try {

            $data = $request->toArray();
            $this->flightRegistration($id, $data["origin"], $data["destination"], $data["flightHours"], $data["price"], $data["currency"], $data["departureDate"], $data["aircraft"], $data["airline"]);

            return new JsonResponse("OK", Response::HTTP_CREATED);

        } catch (DomainError $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);


        }

    }
}