<?php namespace Aurion72\Helpers;

/**
 * Class Helpers
 *
 * @package App\Helpers
 */
class HelpersDebug
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
     * @param float|null $override_start_microtime
     * @return int|mixed
     */
    public static function loadingTimeEnd($die = true, float $override_start_microtime = null)
    {
        $start_microtime = $override_start_microtime ?: static::$start_microtime;
        $result = microtime(true) - $start_microtime;
        if ($die) dd($result); 

        return $result;
    }
}