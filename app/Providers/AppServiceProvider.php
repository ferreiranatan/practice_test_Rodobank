<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;
use App\Database\Connections\JsonConnection;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        DB::extend('json', function ($config) {
            return new JsonConnection($config);
        });
    }

    public function boot()
    {
        //
    }
}
