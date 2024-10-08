<?php

namespace App\Service;

use App\Models\Shortener;

class ShortenerService
{

    /**
     * @param string $url
     * @return string
     */
    public function createLink(
        string $url,
    ): string
    {
        $generate = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);

        if(Shortener::query()->where('short_url', $generate)->exists()){
            return $this->createLink($url);
        }
        $parsedUrl = parse_url($url);

        Shortener::query()->create([
            'url' => $url,
            'short_url' => $generate
        ]);

        return route('shortener', [
            'link' => $generate
        ]);
    }

    /**
     * @param string $shortUrl
     * @return string
     * @throws \Exception
     */
    public function getLink(
        string $shortUrl
    ): string
    {
        $shortener = Shortener::query()
            ->where('short_url', $shortUrl)
            ->first();

        if($shortener){
            return $shortener->url;
        }

       throw new \Exception('Link not found');
    }
}
