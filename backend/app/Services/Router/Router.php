<?php


namespace App\Services\Router;

use App\Config\RoutesConfig;
use App\Contracts\RequestContract;
use App\Contracts\RoutesConfigContract;
use App\Exceptions\ConfigFileNotFoundException;
use App\Exceptions\InvalidConfigFileException;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Throwable;
use function FastRoute\simpleDispatcher;

class Router
{


    /**
     * @var RoutesConfigContract
     */
    private RoutesConfigContract $routesConfig;

    /**
     * @var RequestContract
     */
    private RequestContract $request;

    /**
     * @var Container
     */
    private Container $container;

    private RouterUtil $routerUtil;

    /**
     * @param RoutesConfigContract $routesConfig
     * @param RequestContract $request
     * @param Container $container
     */
    public function __construct(
        RoutesConfigContract $routesConfig,
        RequestContract $request,
        Container $container)
    {
        $this->routesConfig = $routesConfig;
        $this->request = $request;
        $this->container = $container;
        $this->routerUtil = new RouterUtil($container);
    }


    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigFileException
     */
    public function dispatchRoute()
    {
        $dispatcher = $this->getDispatcher();

        $request = $this->getRequest();
        $requestMethod = $request->getMethod();
        $requestUri = $request->getPath();

        $this->dispatch($requestMethod, $requestUri, $dispatcher);
    }

    /**
     * @return Dispatcher
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigFileException
     */
    private function getDispatcher(): Dispatcher
    {
        $routesConfig = $this->getRoutesConfig();

        $routerUtil = $this->getRouterUtil();


        return simpleDispatcher(function (RouteCollector $route) use ($routesConfig, $routerUtil) {
            $this->registerRoutes($routesConfig, $route, $routerUtil);
        });
    }

    /**
     * @return RoutesConfig
     */
    private function getRoutesConfig(): RoutesConfigContract
    {
        return $this->routesConfig;
    }

    /**
     * @return RouterUtil
     */
    public function getRouterUtil(): RouterUtil
    {
        return $this->routerUtil;
    }

    /**
     * @param RoutesConfig $routesConfig
     * @param RouteCollector $route
     * @param RouterUtil $routerUtil
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigFileException
     */
    private function registerRoutes(RoutesConfig $routesConfig, RouteCollector $route, RouterUtil $routerUtil): void
    {

        foreach ($routesConfig->createRouteItems() as $item) {

            $route->addRoute(
                $item->getHttpMethod(),
                $item->getRoutePath(),
                $routerUtil->createRouteActionString($item),
            );
        }
    }

    /**
     * @return RequestContract
     */
    private function getRequest(): RequestContract
    {
        return $this->request;
    }

    /**
     * @param string $requestMethod
     * @param string $requestUri
     * @param Dispatcher $dispatcher
     */
    private function dispatch(string $requestMethod, string $requestUri, Dispatcher $dispatcher)
    {
        try {
            $this->checkURL($dispatcher, $requestMethod, $requestUri);
        } catch (Throwable $exception) {
            $this->printUncaughtError($exception);
        }
    }

    /**
     * @param Dispatcher $dispatcher
     * @param string $requestMethod
     * @param string $requestUri
     * @throws DependencyException
     * @throws NotFoundException
     */
    private function checkURL(Dispatcher $dispatcher, string $requestMethod, string $requestUri): void
    {
        $routeInfo = $dispatcher->dispatch($requestMethod, $requestUri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                $this->getRequest()->sendNotFoundHeader();
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $this->getRequest()->sendMethodNotAllowedHeader();
                break;
            case Dispatcher::FOUND:
                $this->executeAction($routeInfo);
                break;
        }
    }

    /**
     * @param array $routeInfo
     * @throws DependencyException
     * @throws NotFoundException
     */
    private function executeAction(array $routeInfo): void
    {
        list($state, $handler, $vars) = $routeInfo;
        list('middlewares' => $middlewares, 'controller' => $controller, 'method' => $method) = $this->routerUtil->createRouteAction($handler);

        if (isset($middlewares[0]))
            $middlewares[0]->handle($this->request);

        $this->setHeaders();

        $result = $controller->{$method}(...array_values($vars));
        if (gettype($result) == 'array')
            echo json_encode($result);

        unset($state);
    }

    public function setHeaders()
    {
        if (strpos($this->request->getPath(), 'api') > 0) {
            header('Content-Type: application/json');
        }
    }

    public function printUncaughtError(Throwable $exception)
    {
        http_response_code(500);
        echo json_encode([
            'message' => 'something went wrong',
            'error' => $exception->getMessage(),
            'stacktrace' => $exception->getTraceAsString(),
        ]);
    }

    public function sendErrorResponse($message, $httpCode)
    {
        http_response_code($httpCode);
        echo $message;
    }

    /**
     * @return Container
     */
    private function getContainer(): Container
    {
        return $this->container;
    }
}