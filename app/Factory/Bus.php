<?php

namespace App\Factory;

class Bus implements Car
{
    public function drive(): string
    {
        return "Driving a bus.";
    }
}
