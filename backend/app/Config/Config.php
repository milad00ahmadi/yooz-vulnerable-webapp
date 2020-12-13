<?php


namespace App\Config;

use App\Exceptions\ConfigFileNotFoundException;

abstract class Config
{
    /**
     * @param string $configFile
     * @return mixed
     * @throws ConfigFileNotFoundException
     */
    protected function readConfigFile(string $configFile)
    {
        if (!is_file($configFile) || !is_readable($configFile)) {
            throw ConfigFileNotFoundException::create($configFile);
        }

        return include $configFile;
    }

}