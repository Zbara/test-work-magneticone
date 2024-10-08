<?php

namespace App\Console\Commands;

use App\Service\ShortenerService;
use Illuminate\Console\Command;

class ShortenerCommand extends Command
{
    protected $signature = 'shortener:created-link {url}';

    protected $description = 'Create short link';

    public function handle(): void
    {
        $this->info('Creating short link...');

        $service = app(ShortenerService::class);

        $link = $service->createLink($this->argument('url'));

        if(is_string($link)){
            $this->info(sprintf('Short link created at %s', $link));
            return;
        }
        $this->info('Short link created');

    }
}
