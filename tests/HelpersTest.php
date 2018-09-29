<?php

namespace Aurion72\Helpers\Tests;

use Aurion72\Helpers\HelpersServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class HelpersTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [HelpersServiceProvider::class];
    }
}
