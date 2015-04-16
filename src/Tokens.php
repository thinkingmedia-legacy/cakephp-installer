<?php

namespace Installer;

/**
 * @readme Usage.Tokens Tokens
 *
 * The `Tokens` class lets you replace tokens in the `app.php` file with new string values.
 *
 * An example of reading the `app.php` from the `src/Console/Installer.php` post-install script.
 *
 * ```PHP
 * $rootDir = dirname(dirname(__DIR__));
 * $app = \Installer\Tokens::AppConfig($rootDir);
 * $app->set('__SALT__', Installer\Hash::salt());
 * $app->set('__DB_NAME__', 'database');
 * $app->set('__DB_USER__', 'username');
 * $app->set('__DB_PASS__', \Installer\Hash::mysql_password());
 * $app->save();
 * ```
 */
class Tokens
{
    /**
     * @var string
     */
    private $content;

    private $file;

    /**
     * Short cut for reading the `config/app.php` file with the `config/app.default.php` file used for defaults.
     *
     * @param string $rootDir The path to the app folder.
     *
     * @returns Tokens An instance of the `Tokens` class.
     * @throws \FileNotFoundException If the file or the default file can not be found.
     */
    public static function AppConfig($rootDir)
    {
        $appConfig = $rootDir.'/config/app.php';
        $defaultConfig = $rootDir.'/config/app.default.php';

        return new Tokens($appConfig, $defaultConfig);
    }

    /**
     * Loads a text file. If the file doesn't exist the *optional* default file is loaded instead.
     *
     * @param string      $file The file to read.
     * @param string|null $default (optional) The default file.
     *
     * @throws \FileNotFoundException If the file or the default file can not be found.
     */
    public function __construct($file, $default = null)
    {
        $this->file = $file;
        if (file_exists($file))
        {
            $this->content = file_get_contents($file);
        }
        else
        {
            if ($default === null || !file_exists($default))
            {
                throw new \FileNotFoundException($default === null ? $file : $default);
            }
            $this->content = file_get_contents($default);
        }
    }

    /**
     * Replaces a token with a value.
     *
     * @param string $key
     * @param string $value
     *
     * @returns Tokens
     */
    public function set($key, $value)
    {
        $this->content = str_replace($key, $value, $this->content);

        return $this;
    }

    /**
     * Saves the file.
     */
    public function save()
    {
        file_put_contents($this->file, $this->content);
    }
}
