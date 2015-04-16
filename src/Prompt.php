<?php
use Cake\Console\ConsoleIo;

/**
 * @readme Usage.Prompt Prompt
 *
 * The `Prompt` class handles interacting with the user.
 */
class Prompt
{
    const DEFAULT_YES = 1;
    const DEFAULT_NO = 2;

    private $io;

    /**
     * Prompts the user to confirm a Yes or No question.
     *
     * @param string $msg The prompt message.
     * @param int    $mode The default response for non-interactive mode, or just pressing enter.
     *
     * @returns \React\Promise
     */
    public static function Confirm($msg, $mode = Prompt::DEFAULT_NO)
    {
        $prompt = new Prompt($msg);

        return $prompt;
    }

    /**
     * Prompts the user to verify the key/value pairs in an array.
     *
     * @param array $options
     *
     * @returns \React\Promise
     */
    public static function Options(array $options)
    {
        $prompt = new Prompt($options);

        return $prompt;
    }

    public function __construct(array $options)
    {
        $this->io = new ConsoleIO();
    }
}
