<?php namespace Aurion72\Helpers\Tests;

class HelpersDebugTest extends HelpersTest
{
    public function test_loading_time_start_less_than_loading_time_end()
    {
        $lts = lts();
        sleep(0.2);
        $this->assertLessThan($lts, lte(false));
    }
}