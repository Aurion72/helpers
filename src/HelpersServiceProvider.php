<?php

namespace Aurion72\Helpers;

class HelpersServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        require 'helpers.php';
    }
}
