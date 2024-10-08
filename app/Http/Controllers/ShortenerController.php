<?php

namespace App\Http\Controllers;

use App\Service\ShortenerService;

class ShortenerController extends Controller
{
    /**
     * @throws \Exception
     */
    public function __invoke(
        string $link,
        ShortenerService $shortenerService
    )
    {
        return redirect($shortenerService->getLink($link));
    }
}
