<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class ShowCurrentTimeCommand extends Command
{
    protected $signature = 'show:current-time';

    protected $description = 'Show the current time';

    public function handle(): void
    {
        $this->info(Carbon::now()->format('Y-m-d H:i:s'));
    }
}
