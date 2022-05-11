<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class EmptySeat extends DomainError
{


    public function __construct(private string $seat)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'empty_seat';
    }

    protected function errorMessage(): string
    {
        return sprintf('The Seat <%s> provided is empty', $this->seat);
    }
}