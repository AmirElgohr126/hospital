<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\User;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Admin\Eloquent\EloquentAdminRepository;
use App\Repositories\User\Eloquent\EloquentUserRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(UserRepository::class,function () {
            return new EloquentUserRepository(new User());
        });

        $this->app->bind(AdminRepository::class, function () {
            return new EloquentAdminRepository(new Admin());
        });
    }
}
