<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

interface BookingFlightRepository
{
    public function save(BookingFlight $bookingFlight): void;
}