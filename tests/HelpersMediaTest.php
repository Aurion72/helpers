<?php namespace Aurion72\Helpers\Tests;

use Bkwld\Croppa\Facade as Croppa;
use Illuminate\Support\Facades\Storage;

class HelpersMediaTest extends HelpersTest
{
    public function test_string_is_converted_to_hex_color()
    {
        $string = 'Hello World';
        $color = '4a17b1';

        $this->assertEquals($color, stringToHexColor($string));
    }
}
