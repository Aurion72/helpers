<?php

namespace Aurion72\Helpers\Tests;

use Aurion72\Helpers\HelpersServiceProvider;
use Orchestra\Testbench\TestCase;

class helpersTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [HelpersServiceProvider::class];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
