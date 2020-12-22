<?php namespace Aurion72\Helpers\Tests;

class HelpersArraysTest extends HelpersTest
{
    public function test_array_depth_is_correctly_calculated()
    {
        $array_depth_0 = [

        ];

        $array_depth_1 = [
            'depth' => [
                'depth' => [

                ]
            ]
        ];

        $array_depth_3 = [
            'depth' => [
                'depth' => [
                    'depth' => [

                    ]
                ]
            ]
        ];

        $array_depth_5 = [
            'depth' => [
                'depth' => [
                    'depth' => [
                        'depth' => [
                            'depth' => [

                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertTrue(arrayDepthCount($array_depth_0, 'depth', false) == 0);
        $this->assertTrue(arrayDepthCount($array_depth_0, 'depth', true) == 0);
        $this->assertTrue(arrayDepthCount($array_depth_1, 'depth', false) == 2);
        $this->assertTrue(arrayDepthCount($array_depth_1, 'depth', true) == 1);
        $this->assertTrue(arrayDepthCount($array_depth_3, 'depth', false) == 3);
        $this->assertTrue(arrayDepthCount($array_depth_3, 'depth', true) == 2);
        $this->assertTrue(arrayDepthCount($array_depth_5, 'depth', true) == 4);
        $this->assertTrue(arrayDepthCount($array_depth_5, 'depth', false) == 5);
    }
}
