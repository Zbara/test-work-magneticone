<?php

namespace App\Factory;

class Sedan implements Car
{
    public function drive(): string
    {
        return "Driving a sedan.";
    }
}
