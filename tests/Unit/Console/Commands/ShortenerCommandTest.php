<?php

namespace Tests\Unit\Console\Commands;

use App\Console\Commands\ShortenerCommand;
use App\Service\ShortenerService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class ShortenerCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws Exception
     */
    public function testHandle()
    {
        $service = $this->createMock(ShortenerService::class);
        $service->method('createLink')
            ->willReturn('http://short.url/abc123');

        App::instance(ShortenerService::class, $service);

        $this->artisan('shortener:created-link', ['url' => 'http://example.com'])
            ->expectsOutput('Creating short link...')
            ->expectsOutput('Short link created at http://short.url/abc123')
            ->assertExitCode(0);
    }
}
