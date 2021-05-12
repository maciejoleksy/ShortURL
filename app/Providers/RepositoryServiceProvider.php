<?php

namespace App\Providers;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Repositories\ShortenerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ShortenerRepositoryInterface::class, ShortenerRepository::class);
    }

}
