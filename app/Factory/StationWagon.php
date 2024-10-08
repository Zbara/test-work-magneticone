<?php

namespace App\Factory;

class StationWagon implements Car
{
    public function drive(): string
    {
        return "Driving a station wagon.";
    }
}
