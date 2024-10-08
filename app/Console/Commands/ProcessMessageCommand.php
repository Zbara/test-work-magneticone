<?php

namespace App\Console\Commands;

use App\Jobs\ProcessMessage;
use Illuminate\Console\Command;

class ProcessMessageCommand extends Command
{
    protected $signature = 'process:message {message}';

    protected $description = 'Process message';

    public function handle(): void
    {
        ProcessMessage::dispatch($this->argument('message'));
    }
}
