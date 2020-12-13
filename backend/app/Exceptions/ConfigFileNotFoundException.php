<?php


namespace App\Exceptions;


use Exception;

class ConfigFileNotFoundException extends Exception
{
    const MESSAGE = 'Config file "%s" was not found';

    /**
     * @param string $configFile
     * @return ConfigFileNotFoundException
     */
    public static function create(string $configFile): ConfigFileNotFoundException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}