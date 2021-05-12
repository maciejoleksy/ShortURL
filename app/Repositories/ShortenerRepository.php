<?php

namespace App\Repositories;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Models\UrlShort;

class ShortenerRepository implements ShortenerRepositoryInterface
{
    public function firstOrCreate(array $data)
    {
        return UrlShort::where('url', $data['longUrl'])->firstOr(function () use ($data) {
            return UrlShort::create([
                'url'   => $data['longUrl'],
                'short' => isset($data['shortUrl']) ? $data['shortUrl'] : $this->generateShortUrl(),
            ]);
        });
    }

    public function generateShortUrl()
    {
        $result = base_convert(rand(1000, 99999), 10, 36);
        $data   = UrlShort::whereShort($result)->first();

        if ($data != null) {
            $this->generateShortUrl();
        }

        return $result;
    }
}
