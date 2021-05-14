<?php

namespace App\Contracts\Repositories;

interface LinkRepositoryInterface
{
    public function store(array $data);

    public function generateShortName();

    public function getLinkByShortName(string $shortName);
}
