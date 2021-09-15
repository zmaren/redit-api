<?php

namespace App\Providers;

use Eyesee\Entities\Community\Repositories\CommunityRepository;
use Eyesee\Entities\Community\Repositories\CommunityRepositoryEloquent;
use Eyesee\Entities\Thread\Repositories\ThreadRepository;
use Eyesee\Entities\Thread\Repositories\ThreadRepositoryEloquent;
use Eyesee\Entities\User\Repositories\UserRepository;
use Eyesee\Entities\User\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(ThreadRepository::class, ThreadRepositoryEloquent::class);
        $this->app->bind(CommunityRepository::class, CommunityRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
