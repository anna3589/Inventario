<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Ділимося currentUser з усіма view
        view()->share('currentUser', User::first());
    }
}