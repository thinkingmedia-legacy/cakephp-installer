<?php

namespace Installer;

/**
 * @readme Usage.Hash Hash
 *
 * The `Hash` class uses the [mcrypt_create_iv](http://php.net/manual/en/function.mcrypt-create-iv.php) to generate passwords and salt values.
 *
 * ```PHP
 * \Installer\Hash::generate(15);
 * ```
 */
class Hash
{
    /**
     * @return string
     */
    public static function generate()
    {
        return 'asdasd';
    }

    /**
     * @returns string
     */
    public static function salt()
    {
    }

    /**
     * @returns string
     */
    public static function mysql_password()
    {
    }
}
