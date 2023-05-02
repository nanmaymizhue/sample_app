<?php

namespace App\Providers;

use App\Repository\Blog\BlogRepoInterface;
use App\Repository\Blog\BlogRepository;
use App\Repository\Post\PostRepoInterface;
use App\Repository\Post\PostRepository;
use App\Services\Blog\BlogService;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Post\PostService;
use App\Services\Post\PostServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BlogRepoInterface::class,BlogRepository::class);
        $this->app->bind(BlogServiceInterface::class,BlogService::class);
        $this->app->bind(PostRepoInterface::class,PostRepository::class);
        $this->app->bind(PostServiceInterface::class,PostService::class);
    }
}
