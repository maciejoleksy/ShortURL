<?php

namespace App\Repositories;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Models\UrlShort;
use Illuminate\Support\Str;

class ShortenerRepository implements ShortenerRepositoryInterface
{
    public function store(array $data)
    {
        return UrlShort::create([
            'url'   => $data['longUrl'],
            'short' => isset($data['shortUrl']) ? $data['shortUrl'] : $this->randomUrl(),
        ]);
    }

    public function link(string $link)
    {
        $url = UrlShort::where('short', $link)->firstOrFail();

        if (!preg_match("~^(?:f|ht)tps?://~i", $url->url)) {
            $url = "http://" . $url->url;

            return $url;
        }

        return $url->url;
    }

    public function randomUrl()
    {
        $randomUrl = strtolower(Str::random());
        if (UrlShort::where('short', $randomUrl)->first() === null) {
            return $randomUrl;
        }

        return $this->randomUrl();
    }
}
