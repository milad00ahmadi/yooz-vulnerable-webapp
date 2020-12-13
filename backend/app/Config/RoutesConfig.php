<?php


namespace App\Config;

use App\Contracts\RoutesConfigContract;
use App\Exceptions\ConfigFileNotFoundException;
use App\Exceptions\InvalidConfigFileException;
use Generator;
use function is_array;

class RoutesConfig extends Config implements RoutesConfigContract
{

    const CONFIG_NAME = 'Routes';
    /**
     * @var string[]
     */
    private $routes;

    /**
     * @return Generator
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigFileException
     */
    public function createRouteItems(): Generator
    {
        $routes = $this->getRoutes();

        if (!is_array($routes)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }

        foreach ($routes as $route) {
            yield $this->createRouteItem($route);
        }
    }


    /**
     * @return string[]
     * @throws ConfigFileNotFoundException
     */
    private function getRoutes(): array
    {
        if ($this->routes === null) {
            $this->routes = $this->readConfigFile($this->getConfigFilePath());
        }

        return $this->routes;
    }


    private function getConfigFilePath(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'routes.php';
    }


    /**
     * @param array $route
     * @return RouteItem
     * @throws InvalidConfigFileException
     */
    private function createRouteItem(
        array $route
    ): RouteItem
    {

        $this->checkRouteItemKeys($route);

        $routePath = $route[RouteConfigKeys::ROUTE_PATH];
        $httpMethod = $route[RouteConfigKeys::HTTP_METHOD];
        $controller = $route[RouteConfigKeys::CONTROLLER];
        $controllerAction = $route[RouteConfigKeys::CONTROLLER_ACTION];
        $controllerMiddlewares = $route[RouteConfigKeys::CONTROLLER_MIDDLEWARES];

        return new RouteItem($routePath, $httpMethod, $controller, $controllerAction, $controllerMiddlewares);
    }

    /**
     * @param array $groupRouteItem
     * @throws InvalidConfigFileException
     */
    private function checkRouteItemKeys(array $groupRouteItem)
    {
        if (!array_key_exists(RouteConfigKeys::ROUTE_PATH, $groupRouteItem)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }
        if (!array_key_exists(RouteConfigKeys::CONTROLLER_MIDDLEWARES, $groupRouteItem)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::HTTP_METHOD, $groupRouteItem)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::CONTROLLER, $groupRouteItem)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::CONTROLLER_ACTION, $groupRouteItem)) {
            throw InvalidConfigFileException::create(static::CONFIG_NAME);
        }
    }


}