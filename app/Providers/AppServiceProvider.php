<?php

namespace UserTodo\Providers;

use Illuminate\Support\ServiceProvider;
use UserTodo\Repositories\Contracts\DataRepository;
use UserTodo\Repositories\Contracts\TodoRepository;
use UserTodo\Repositories\Contracts\UserRepository;
use UserTodo\Repositories\Impl\EloquentTodoRepository;
use UserTodo\Repositories\Impl\EloquentUserRepository;
use UserTodo\Repositories\Impl\RestApiDataRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(TodoRepository::class, EloquentTodoRepository::class);
        $this->app->singleton(DataRepository::class, RestApiDataRepository::class);
    }
}
