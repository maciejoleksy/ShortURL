<?php

namespace App\Contracts\Repositories;

use App\Models\UrlShort;

interface ShortenerRepositoryInterface
{
    public function store(array $data);

    public function randomUrl();

    public function link(string $link);
}