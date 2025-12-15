<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Додаємо currentUser до ВСІХ view
        View::composer('*', function ($view) {
            $view->with('currentUser', User::first());
        });
    }
}
