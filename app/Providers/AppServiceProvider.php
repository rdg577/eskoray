<?php

namespace App\Providers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('less_than_or_equal', function($attribute, $value, $parameters) {
            $other = Input::get($parameters[0]);

            return isset($other) && (intval($value) <= intval($other));
        });

        Validator::replacer('less_than_or_equal', function ($message, $attribute, $rule, $params) {
            return str_replace('_', ' ', 'The ' .$attribute. ' must be less than or equal to ' .$params[0]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
