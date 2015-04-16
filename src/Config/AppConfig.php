<?php

namespace Installer\Config;

use Installer\Exceptions\InstallException;

/**
 * @readme AppConfig
 *
 * Use `AppConfig` to make changes to the `app.php` file.
 *
 * ```PHP
 * $config = new App\Console\Config\AppConfig();
 * $config->setSalt();
 * $config->setToken('__DB_NAME__','AppDatabase');
 * $config->setToken('__DB_USER__','AppUser');
 * $config->setToken('__DB_PASS__',App\Console\Config\Tokens::create(16));
 * $config->save();
 * ```
 */
class AppConfig
{
    /**
     * @var string
     */
    private $content;

    /**
     * Constructor
     *
     * @throws InstallException
     */
    public function __construct()
    {
        if (!file_exists(self::getPath()))
        {
            throw new InstallException("File not found: /config/app.php");
        }
        $this->content = file_get_contents(self::getPath());
    }

    /**
     * Calculates the path to the app.php file.
     *
     * @return string
     */
    private static function getPath()
    {
        $rootDir = dirname(dirname(__DIR__));

        return $rootDir.'/config/app.php';
    }

    public function setSalt()
    {
    }

    /**
     * Performs a simple search and replace on a token.
     *
     * @param {string} $name
     * @param {string} $value
     */
    public function setToken($name, $value)
    {
        $this->content = str_replace($this->content, $name, $value);
    }

    /**
     * @throws InstallException
     */
    public function save()
    {
        $result = file_put_contents(self::getPath(), $this->content);
        if (!$result)
        {
            throw new InstallException("Unable to update /config/app.php");
        }
    }
}
