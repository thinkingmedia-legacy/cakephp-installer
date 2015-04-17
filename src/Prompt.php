<?php

namespace Installer;

use Cake\Console\ConsoleIo;
use React\Promise\Deferred;

/**
 * @readme Usage.Prompt Prompt
 *
 * The `Prompt` class handles interacting with the user using Promises.
 */
class Prompt
{
    /**
     * @var ConsoleIo
     */
    private $io;

    /**
     * Prompts the user to confirm a Yes or No question.
     *
     * @param string $msg The prompt message.
     * @param string $default The default response for non-interactive mode, or just pressing enter.
     *
     * @returns \React\Promise\Promise
     */
    public static function Confirm($msg, $default = 'N')
    {
        $prompt = new Prompt([
                                 ['text' => $msg, 'type' => 'char', 'default' => $default]
                             ]);

        return $prompt->show();
    }

    /**
     * Prompts the user to verify the key/value pairs in an array.
     *
     * @param string $msg The message for the prompt.
     * @param array  $options The key/value pairs for the user to edit.
     *
     * @returns \React\Promise\Promise
     */
    public static function Options($msg, array $options)
    {
        $arr = array_map(function ($key, $value)
        {
            return ['text' => $key, 'type' => 'string', 'default' => $value];
        }, $options);

        $prompt = new Prompt($arr);

        return $prompt->show();
    }

    /**
     * Constructor
     *
     * @param array $options
     */
    private function __construct(array $options)
    {
        $this->io = new ConsoleIO();
    }

    /**
     * @returns \React\Promise\Promise
     */
    public function show()
    {
        $deferred = new Deferred();
        $this->io->out('hello');
        $deferred->reject(false);

        return $deferred->promise();
    }
}
