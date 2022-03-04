<?php

use Aurion72\Helpers\HelpersArrays;
use Aurion72\Helpers\HelpersDebug;
use Aurion72\Helpers\HelpersMedia;
use Aurion72\Helpers\HelpersNumbers;
use Aurion72\Helpers\HelpersStrings;
use Illuminate\Foundation\Application;
use Illuminate\Http\UploadedFile;

if (!function_exists('lts')) {
    /**
     * @return mixed
     */
    function lts()
    {
        return HelpersDebug::loadingTimeStart();
    }
}

if (!function_exists('lte')) {
    /**
     * @param bool $die
     * @return mixed
     */
    function lte($die = true)
    {
        return HelpersDebug::loadingTimeEnd($die);
    }
}

if (!function_exists('boolToString')) {
    /**
     * @param $value
     * @param null $true_string
     * @param null $false_string
     * @param null $locale
     * @return Application|mixed
     */
    function boolToString($value, $true_string = null, $false_string = null, $locale = null)
    {
        return HelpersStrings::boolToString($value, $true_string, $false_string, $locale);
    }
}

if (!function_exists('boolToColorizedString')) {
    /**
     * @param $value
     * @param null $true_string
     * @param null $false_string
     * @param null $locale
     * @return string
     */
    function boolToColorizedString($value, $true_string = null, $false_string = null, $locale = null)
    {
        return HelpersStrings::boolToColorizedString($value, $true_string, $false_string, $locale);
    }
}

if (!function_exists('rawSql')) {
    /**
     * @param $builder
     * @return mixed|null|string|string[]
     */
    function rawSql($builder)
    {
        return HelpersDebug::rawSql($builder);
    }
}

if (!function_exists('formatPrice')) {
    /**
     * @param $price
     * @param string $currency_sign
     * @param boolean $invert
     * @return string
     */
    function formatPrice($price, $currency_sign = ' €', $invert = false)
    {
        return HelpersStrings::formatPrice($price, $currency_sign, $invert);
    }
}

if (!function_exists('formatPercent')) {
    /**
     * @param $percent
     * @param bool $percent_sign
     * @return string
     */
    function formatPercent($percent, $precision = 2, $percent_sign = true)
    {
        return HelpersStrings::formatPercent($percent, $precision, $percent_sign);
    }
}

if (!function_exists('randomBoolean')) {
    /**
     * @param int $chance_of_true
     * @return bool
     */
    function randomBoolean($chance_of_true = 50, $max = 100)
    {
        return HelpersNumbers::randomBoolean($chance_of_true, $max);
    }
}

if (!function_exists('randomPassword')) {
    /**
     * @param $length
     * @param bool $caps
     * @return UploadedFile|string
     */
    function randomPassword($length, $caps = true)
    {
        return HelpersStrings::randomPassword($length, $caps);
    }
}

if (!function_exists('addSign')) {

    /**
     * @param $value
     * @param bool $minus_only
     * @return string
     */
    function addSign($value, $minus_only = false)
    {
        return HelpersNumbers::addSign($value, $minus_only);
    }
}

if (!function_exists('rmdirRecursive')) {

    /**
     * @param string $dir
     */
    function rmdirRecursive($dir)
    {
        HelpersMedia::rmdirRecursive($dir);
    }
}

if (!function_exists('stringToHexColor')) {
    /**
     * @param string $dir
     * @return string
     */
    function stringToHexColor(string $dir): string
    {
        return HelpersMedia::stringToHexColor($dir);
    }
}


if (!function_exists('arrayDepthCount')) {
    /**
     * @param  array  $array
     * @param  string  $key
     * @param  bool  $must_contains_data
     * @return string
     */
    function arrayDepthCount(array $array, string $key, bool $must_contains_data = true): string
    {
        return HelpersArrays::arrayDepthCount($array, $key, $must_contains_data);
    }
}

if (!function_exists('arrayDepthMultiCount')) {
    /**
     * @param  array  $array
     * @param  string  $key
     * @return string
     */
    function arrayDepthMultiCount(array $array, string $key): string
    {
        return HelpersArrays::arrayDepthMultiCount($array, $key);
    }
}
