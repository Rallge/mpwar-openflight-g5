<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

interface FlightRepository
{
public function save(Flight $flight): void;
}