<?php

namespace App\Contracts\Repositories;

interface ShortenerRepositoryInterface
{
    public function store(array $data);

    public function generateShortName();

    public function getLinkByShortName(string $shortName);
}
