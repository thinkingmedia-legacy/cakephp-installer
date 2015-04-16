<?php

namespace Installer;

use Underscore\_;

/**
 * @readme Usage.Files
 *
 * The `Files` class contains static functions for the modifying of file permissions on Linux.
 */
class Files
{
    private static function walk(array &$arr, $dir)
    {
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file)
        {
            $path = $dir.'/'.$file;
            $arr[] = $path;
            if (is_dir($path))
            {
                self::walk($arr, $path);
            }
        }
    }

    /**
     * @param $dir
     *
     * @return _
     */
    public static function recursive($dir)
    {
        $arr = [];
        self::walk($arr, $dir);
        return _::create($arr);
    }
}
