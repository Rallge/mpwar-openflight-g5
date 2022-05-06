<?php

namespace CodelyTv\OpenFlight\Flight\Domain;

use CodelyTv\Shared\Domain\DomainError;

class InvalidCurrency extends DomainError
{

    public function __construct(private string $InCurrency)
    {
        parent::__construct();
    }


    public function errorCode(): string
    {
        return 'invalid_Currency';
    }

    protected function errorMessage(): string
    {
        return sprintf('The currency provided is invalid',$this->InCurrency);
    }
}