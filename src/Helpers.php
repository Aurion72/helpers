<?php namespace Aurion72\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Croppa;

/**
 * Class Helpers
 *
 * @package App\Helpers
 */
class Helpers
{
    /**
     * @var int
     */
    private static $start_microtime = 0;

    /**
     * Return Raw SQL from Query Builder
     *
     * @param $builder
     * @return mixed|null|string|string[]
     */
    public static function rawSql($builder)
    {
        $transform = [];
        $sql = $builder->toSql();
        $bindings = $builder->getBindings();

        foreach ($bindings as $binding) {
            $value = is_numeric($binding) ? $binding : "'".$binding."'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }

        $database = env('DB_DATABASE');
        if (count($transform) > 0) {
            foreach ($transform as $key => $i) {
                $sql = str_replace("from `$key`", "from `$database`.`$key`", $sql);
            }
        }

        return $sql;
    }

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
     * Start counting loading time
     *
     * @return mixed
     */
    public static function loadingTimeStart()
    {
        static::$start_microtime = microtime(true);

        return static::$start_microtime;
    }

    /**
     * Save loading time
     *
     * @param bool $die
     * @return int|mixed
     */
    public static function loadingTimeEnd($die = true)
    {
        $result = microtime(true) - static::$start_microtime;
        if ($die) dd($result);

        return $result;
    }

    /**
     * Turn a number into a currency formatted string
     *
     * @param $price
     * @param string $currency_sign
     * @return string
     */
    public static function formatPrice($price, $currency_sign = ' €')
    {
        return is_null($price) ? '-' : number_format($price, 2, ',', ' ').($currency_sign ? $currency_sign : '');
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
     * Make a filename from a Model instance
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $name_attribute
     * @return null|string
     */
    public static function makeFileName(Model $model, string $name_attribute = 'name')
    {
        $name = $model->$name_attribute;

        if (!$name) $name = $model->__name;

        return $name ? str_slug($name.'-'.$model->id.'-'.uniqid()) : null;
    }

    /**
     * Display and crop public image (using Croppa)
     *
     * @param $path
     * @param null $width
     * @param null $height
     * @return string
     */
    public static function displayImage($path, $width = null, $height = null)
    {
        return (string) Croppa::url(Storage::url($path), $width, $height);
    }

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

    /**
     * Add a sign to a number
     *
     * @param $value
     * @param bool $minus_only
     * @return string
     */
    public static function addSign($value, $minus_only = false)
    {
        $value_floated = floatval($value);
        if ($value_floated < 0) {
            return $minus_only ? $value : "+ $value";
        } else {
            return "- $value";
        }
    }

    /**
     * Get the current action
     *
     * @param bool $keep_namespace
     * @return mixed|string
     */
    public static function getAction($keep_namespace = false)
    {
        if ($keep_namespace) {
            return request()->route()->getActionName();
        }
        $action = request()->route()->getAction();
        $namespace = $action['namespace'];
        $controller = $action['controller'];

        return str_replace($namespace.'\\', '', $controller);
    }

    /*
     * Remove directories with files, recursively
     */

    /**
     * Recursively remove directories and files
     *
     * @param $dir
     */
    public static function rmdirRecursive($dir)
    {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) static::rmdirRecursive("$dir/$file"); else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}