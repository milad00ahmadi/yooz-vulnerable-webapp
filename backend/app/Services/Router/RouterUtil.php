<?php


namespace App\Services\Router;


use App\Config\RouteItem;
use DI\Container;

class RouterUtil
{
    const HANDLER_DELIMITER = '@';

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param RouteItem $route
     * @return string
     */
    public function createRouteActionString(RouteItem $route): string
    {
        $action = '';
        $action = self::createMiddlewaresString($route, $action);
        $action = $action . $route->getController() . static::HANDLER_DELIMITER . $route->getControllerAction();
        return $action;
    }

    /**
     * @param RouteItem $route
     * @param string $action
     * @return string
     */
    private static function createMiddlewaresString(RouteItem $route, string $action): string
    {
        foreach ($route->getControllerMiddlewares() as $controllerMiddleware) {
            $action = $action . $controllerMiddleware . static::HANDLER_DELIMITER;
        }
        return $action;
    }

    public function createRouteAction(string $action): array
    {
        $handlers = explode(static::HANDLER_DELIMITER, $action);

        $handlersLength = sizeof($handlers);

        $middlewares = $this->createMiddlewares(array_slice($handlers, 0, $handlersLength - 2));
        $controller = $this->getContainer()->get($handlers[$handlersLength - 2]);
        return [
            'middlewares' => $middlewares,
            'controller' => $controller,
            'method' => $handlers[$handlersLength - 1]
        ];
    }

    /**
     * @param $middlewarePaths
     * @return array
     */
    private function createMiddlewares($middlewarePaths): array
    {
        $middlewares = [];
        if (sizeof($middlewarePaths) >= 1) {
            $middlewares = $this->instantiateMiddlewares($middlewarePaths, $middlewares);
            $this->chainMiddlewares($middlewares);
        }
        return $middlewares;
    }

    /**
     * @param $middlewarePaths
     * @param array $middlewares
     * @return array
     */
    private function instantiateMiddlewares($middlewarePaths, array $middlewares): array
    {
        for ($i = 0; $i < sizeof($middlewarePaths); $i++) {
            $middlewares[] = $this->getContainer()->get($middlewarePaths[$i]);
        }
        return $middlewares;
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * @param array $middlewares
     */
    private function chainMiddlewares(array $middlewares): void
    {
        for ($i = 0; $i < sizeof($middlewares); $i++) {
            if ($i + 1 < sizeof($middlewares)) {
                $middleware = $middlewares[$i];
                $middleware->setNext($middlewares[$i + 1]);
            }
        }
    }

}