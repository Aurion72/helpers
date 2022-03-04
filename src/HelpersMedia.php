<?php namespace Aurion72\Helpers;

use Illuminate\Support\Facades\Storage;
use Bkwld\Croppa\Facade as Croppa;

/**
 * Class Helpers
 *
 * @package App\Helpers
 */
class HelpersMedia
{
    /*
     * Remove directories with files, recursively
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

    /**
     * Convert a string to a hexadecimal color
     *
     * @param string $string
     * @return string
     */
    public static function stringToHexColor(string $string): string
    {
        $code = dechex(crc32($string));
        $code = substr($code, 0, 6);

        return $code;
    }
}
