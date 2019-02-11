<?php namespace Aurion72\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Helpers
 *
 * @package App\Helpers
 */
class HelpersStrings
{
    /**
     * Transform a value to a string.
     *
     * @param $value
     * @param null $true_string
     * @param null $false_string
     * @param null $locale
     * @return mixed|\Illuminate\Foundation\Application
     */
    public static function boolToString($value, $true_string = null, $false_string = null, $locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        if (!$true_string) $true_string = 'misc.yes';
        if (!$false_string) $false_string = 'misc.no';

        return (bool) $value ? __($true_string, [], $locale) : __($false_string, [], $locale);
    }

    /**
     * Transform a value to a colorized string
     *
     * @param $value
     * @param null $true_string
     * @param null $false_string
     * @param null $locale
     * @return string
     */
    public static function boolToColorizedString($value, $true_string = null, $false_string = null, $locale = null)
    {
        $string = static::boolToString($value, $true_string, $false_string, $locale);

        return (bool) $value ? '<span class="text-success">'.$string.'</span>' : '<span class="text-danger">'.$string.'</span>';
    }

    /**
     * Turn a number into a currency formatted string
     *
     * @param $price
     * @param string $currency_sign
     * @return string
     */
    public static function formatPrice($price, $currency_sign = ' €', $invert = false)
    {
        $sign = ($currency_sign ? $currency_sign : '');
        $price = is_null($price) ? '-' : number_format($price, 2, ',', ' ');

        return $invert ? $sign.$price : $price.$sign;
    }

    /**
     * Turn a number into a percentage formatted string
     *
     * @param $percent
     * @param int $precision
     * @param bool $percent_sign
     * @return string
     */
    public static function formatPercent($percent, $precision = 2, $percent_sign = true)
    {
        return is_null($percent) || is_string($percent) ? $percent : number_format($percent, $precision, ',', ' ').($percent_sign ? ' %' : '');
    }

    /**
     * Generate a random password
     *
     * @param $length
     * @param bool $caps
     * @return array|string
     */
    public static function randomPassword($length, $caps = false)
    {
        $alphabet = "abcdefghjkmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ123456789";
        $pass = [];
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $pass = implode($pass);
        if ($caps) {
            $pass = strtoupper($pass);
        }

        return $pass;
    }
}
