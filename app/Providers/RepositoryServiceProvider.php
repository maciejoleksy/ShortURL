<?php

namespace App\Providers;

use App\Contracts\Repositories\LinkRepositoryInterface;
use App\Repositories\LinkRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
    }

}
