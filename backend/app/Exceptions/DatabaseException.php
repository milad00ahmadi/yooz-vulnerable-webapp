<?php


namespace App\Exceptions;


use Exception;

class DatabaseException extends Exception
{
    const MESSAGE = 'DB ERROR : "%s"';

    /**
     * @param string $configFile
     * @return DatabaseException
     */
    public static function create(string $configFile): DatabaseException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}