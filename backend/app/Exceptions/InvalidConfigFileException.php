<?php


namespace App\Exceptions;


use Exception;

class InvalidConfigFileException extends Exception
{
    const MESSAGE = 'Invalid Config file : "%s"';

    /**
     * @param string $configFile
     * @return InvalidConfigFileException
     */
    public static function create(string $configFile): InvalidConfigFileException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}