<?php namespace Aurion72\Helpers;

/**
 * Class Helpers
 *
 * @package App\Helpers
 */
class HelpersNumbers
{
    /*
     * NUMBERS
     */

    /**
     * Return a boolean with a random factor
     *
     * @param int $chance_of_true
     * @return bool
     */
    public static function randomBoolean($chance_of_true = 50)
    {
        $is_true = rand(1, 100);

        return $chance_of_true >= $is_true;
    }

    /**
     * Add a sign to a number
     *
     * @param $value
     * @param bool $minus_only
     * @return string
     */
    public static function addSign($value, $minus_only = false)
    {
        $value = trim($value);
        $value_floated = floatval(str_replace(' ','',$value));

        if ($value_floated > 0) {
            return $minus_only ? $value_floated : "+ $value_floated";
        } else {
            return "- ".abs($value_floated);
        }
    }
}