<?php

namespace App\Console\Commands;

use App\Factory\CarFactory;
use Exception;
use Illuminate\Console\Command;

class CarShowCommand extends Command
{
    protected $signature = 'car:show';

    protected $description = 'Car show command';

    public function handle(): void
    {
        try {
            $type = $this->choice('Select car type', [
                'sedan',
                'bus',
                'station-wagon'
            ]);

            $car = CarFactory::createCar($type);
            $this->info(sprintf('Car type: %s', $car->drive()));

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
