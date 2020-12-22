<?php namespace Aurion72\Helpers;

/**
 * Class HelpersArrays
 *
 * @package App\Helpers
 */
class HelpersArrays
{
    /*
     * Arrays
     */

    public static function arrayDepthCount(array $array, string $key)
    {
        $max_depth = 0;

        if (!array_key_exists($key, $array)) {
            return $max_depth;
        }

        $depth = static::arrayDepthCount($array[$key], $key) + 1;

        if ($depth > $max_depth) {
            $max_depth = $depth;
        }

        return $max_depth;
    }
}
