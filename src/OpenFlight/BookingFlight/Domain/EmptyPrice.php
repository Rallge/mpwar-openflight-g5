<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class EmptyPrice extends DomainError
{

    public function __construct(private string $price)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_price';
    }

    protected function errorMessage(): string
    {
        return sprintf('The Price <%s> provided is empty', $this->price);
    }
}