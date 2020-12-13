<?php


namespace App\Exceptions;


class ValidationException extends \Exception
{
    const MESSAGE = 'Validation Error :  "%s"';

    /**
     * @param string $configFile
     * @return ValidationException
     */
    public static function create(string $configFile): ValidationException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}