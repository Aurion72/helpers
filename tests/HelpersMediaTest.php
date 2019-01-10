<?php namespace Aurion72\Helpers\Tests;

use Bkwld\Croppa\Facade as Croppa;
use Illuminate\Support\Facades\Storage;

class HelpersMediaTest extends HelpersTest
{
    public function test_display_image_has_a_valid_url()
    {
        $path = 'path/to/image.jpg';
        $expectedUrl = '/storage/path/to/image-200x400.jpg';
        $this->assertEquals($expectedUrl, displayImage($path, 200, 400));
    }

    public function test_string_is_converted_to_hex_color()
    {
        $string = 'Hello World';
        $color = '4a17b1';
        
        $this->assertEquals($color, stringToHexColor($string));
    }
}