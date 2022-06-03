<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
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
        Validator::extend(
            'phone', function ($attribute, $value, $parameters) {
                return preg_match('/^([\+]{0,1}[0-9]{9,})$/', $value);
            }, 'Input is not a phone number'
        );
    }
}
