<?php

namespace CodelyTv\OpenFlight\BookingFlight\Domain\ValueObject;

use CodelyTv\OpenFlight\BookingFlight\Domain\InvalidClassFlight;

class ClassFlight
{
    private static array $classes = [
        "Tourist",
        "Tourist Premium",
        "Business Class"
    ];
    private string $class;

    /**
     * @param string $class
     */
    public function __construct(string $class)
    {
        self::validateClassFlight($class);
        $this->class = $class;
    }

    public function classFlights(): string{
        return $this->class;
    }
    public static function validateClassFlight (string $class):void{
        if (!in_array($class,self::$classes)){
            throw new InvalidClassFlight();
        }
    }

}