<?php

namespace App\Factory;
use Exception;

class CarFactory
{
    /**
     * @throws Exception
     */
    public static function createCar($type): StationWagon|Sedan|Bus
    {
        return match ($type) {
            'sedan' => new Sedan(),
            'bus' => new Bus(),
            'station-wagon' => new StationWagon(),
            default => throw new Exception("Car type not recognized."),
        };
    }
}

