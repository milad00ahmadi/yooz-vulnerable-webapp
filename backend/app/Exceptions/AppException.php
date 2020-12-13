<?php


namespace App\Exceptions;


class AppException extends \Exception
{
    const MESSAGE = 'Config file "%s" was not found';

    /**
     * @param string $configFile
     * @return AppException
     */
    public static function create(string $configFile): AppException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}