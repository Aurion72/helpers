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
     * MEDIA
     */

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

}