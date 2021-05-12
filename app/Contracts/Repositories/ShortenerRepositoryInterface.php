<?php

namespace App\Contracts\Repositories;

use App\Models\UrlShort;

interface ShortenerRepositoryInterface
{
    public function firstOrCreate(array $data);

    public function generateShortUrl();
}