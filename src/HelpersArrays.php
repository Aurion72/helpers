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

    public static function arrayDepthCount(array $array, string $key, bool $must_contains_data = true)
    {
        $max_depth = 0;

        if (!array_key_exists($key, $array)) {
            return $max_depth;
        }

        if ($must_contains_data && count($array[$key]) == 0) {
            return $max_depth;
        }

        $depth = static::arrayDepthCount($array[$key], $key, $must_contains_data) + 1;

        if ($depth > $max_depth) {
            $max_depth = $depth;
        }

        return $max_depth;
    }

    /*
     * Arrays
     */

    public static function arrayDepthMultiCount(array $array, string $key)
    {
        $max_depth = 0;

        foreach ($array as $value) {
            if (is_array($value)) {
                if (array_key_exists($key, $value)) {
                    $count = static::arrayDepthMultiCount($value, $key) + 1;
                } else {
                    $count = static::arrayDepthMultiCount($value, $key);
                }

                if ($count > $max_depth) {
                    $max_depth = $count;
                }
            }
        }

        return $max_depth;
    }
}
