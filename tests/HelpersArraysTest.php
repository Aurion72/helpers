<?php namespace Aurion72\Helpers\Tests;

class HelpersArraysTest extends HelpersTest
{
    public function test_array_depth_is_correctly_calculated()
    {
        $array_depth_0 = [

        ];

        $array_depth_1 = [
            'depth' => [

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

        $this->assertTrue(arrayDepthCount($array_depth_0, 'depth') == 0);
        $this->assertTrue(arrayDepthCount($array_depth_1, 'depth') == 1);
        $this->assertTrue(arrayDepthCount($array_depth_3, 'depth') == 3);
        $this->assertTrue(arrayDepthCount($array_depth_5, 'depth') == 5);
    }
}
