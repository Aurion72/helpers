<?php

use Aurion72\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;

if (!function_exists('lts')) {
    /**
     * @return mixed
     */
    function lts()
    {
        return Helpers::loadingTimeStart();
    }
}

if (!function_exists('lte')) {
    /**
     * @param bool $die
     * @return mixed
     */
    function lte($die = true)
    {
        return Helpers::loadingTimeEnd($die);
    }
}

if (!function_exists('boolToString')) {
    /**
     * @param $value
     * @param null $true_string
     * @param null $false_string
     * @param null $locale
     * @return \Illuminate\Foundation\Application|mixed
     */
    function boolToString($value, $true_string = null, $false_string = null, $locale = null)
    {
        return Helpers::boolToString($value, $true_string, $false_string, $locale);
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
        return Helpers::boolToColorizedString($value, $true_string, $false_string, $locale);
    }
}

if (!function_exists('rawSql')) {
    /**
     * @param $builder
     * @return mixed|null|string|string[]
     */
    function rawSql($builder)
    {
        return Helpers::rawSql($builder);
    }
}

if (!function_exists('formatPrice')) {
    /**
     * @param $price
     * @param bool $currency_sign
     * @return string
     */
    function formatPrice($price, $currency_sign = true)
    {
        return Helpers::formatPrice($price, $currency_sign);
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
        return Helpers::formatPercent($percent, $precision, $percent_sign);
    }
}

if (!function_exists('getNestedRelationships')) {
    /**
     * @param $model
     * @param $relations
     * @return \Illuminate\Support\Collection
     */
    function getNestedRelationships($model, $relations)
    {
        return Helpers::getNestedRelationships($model, $relations);
    }
}

if (!function_exists('makeFileName')) {
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $name_attribute
     * @return null|string
     */
    function makeFileName(Model $model, string $name_attribute = 'name')
    {
        return Helpers::makeFileName($model, $name_attribute);
    }
}

if (!function_exists('displayImage')) {
    /**
     * @param $path
     * @param $width
     * @param $height
     * @return string
     */
    function displayImage(?string $path = null, ?int $width = null, ?int $height = null)
    {
        return $path ? Helpers::displayImage($path, $width, $height) : 'https://via.placeholder.com/'.($width ? $width : 40).'x'.($width ? $width : 40);
    }
}

if (!function_exists('randomBoolean')) {
    /**
     * @param int $chance_of_true
     * @return bool
     */
    function randomBoolean($chance_of_true = 50)
    {
        return Helpers::randomBoolean($chance_of_true);
    }
}

if (!function_exists('getDummyImageListAsArray')) {
    /**
     * @return array
     */
    function getDummyImageListAsArray()
    {
        return Helpers::getDummyImageListAsArray();
    }
}

if (!function_exists('getRandomDummyImage')) {
    /**
     * @return \Illuminate\Http\UploadedFile|string
     */
    function getRandomDummyImage()
    {
        return Helpers::getRandomDummyImage();
    }
}

if (!function_exists('randomPassword')) {
    /**
     * @param $length
     * @param bool $caps
     * @return \Illuminate\Http\UploadedFile|string
     */
    function randomPassword($length, $caps = true)
    {
        return Helpers::randomPassword($length, $caps);
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
        return Helpers::addSign($value, $minus_only);
    }
}

if (!function_exists('getAction')) {
    /**
     * @param bool $keep_namespace
     * @return mixed|string
     */
    function getAction($keep_namespace = false)
    {
        return Helpers::getAction($keep_namespace);
    }
}

if (!function_exists('rmdirRecursive')) {

    /**
     * @param string $dir
     */
    function rmdirRecursive($dir)
    {
        Helpers::rmdirRecursive($dir);
    }
}
