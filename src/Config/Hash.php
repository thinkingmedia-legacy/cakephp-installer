<?php

namespace Installer\Config;

/**
 * @readme AppConfig.Hash Hash
 *
 * The `Hash` class uses the [mcrypt_create_iv](http://php.net/manual/en/function.mcrypt-create-iv.php) to generate passwords and salt values.
 *
 * ```PHP
 * App\Console\Config\Hash::generate(15);
 * ```
 */
class Hash
{
}
