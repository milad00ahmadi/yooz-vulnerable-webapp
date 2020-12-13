<?php


namespace App\Config;


class RouteItem
{

    /**
     * @var string
     */
    private string $routePath;

    /**
     * @var string
     */
    private string $httpMethod;

    /**
     * @var string
     */
    private string $controller;

    /**
     * @var string
     */
    private string $controllerAction;

    /**
     * @var array
     */
    private array $controllerMiddlewares;

    /**
     * @param string $routePath
     * @param string $httpMethod
     * @param string $controller
     * @param string $controllerAction
     * @param array $controllerMiddlewares
     */
    public function __construct(
        string $routePath,
        string $httpMethod,
        string $controller,
        string $controllerAction,
        array $controllerMiddlewares
    )
    {
        $this->routePath = $routePath;
        $this->httpMethod = $httpMethod;
        $this->controller = $controller;
        $this->controllerAction = $controllerAction;
        $this->controllerMiddlewares = $controllerMiddlewares;
    }


    /**
     * @return string
     */
    public function getRoutePath(): string
    {
        return $this->routePath;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getControllerAction(): string
    {
        return $this->controllerAction;
    }

    /**
     * @return array
     */
    public function getControllerMiddlewares(): array
    {
        return $this->controllerMiddlewares;
    }

}