<?php


namespace App;

use App\Config\RoutesConfig;
use App\Exceptions\AppException;
use App\Services\Request;
use App\Services\Router\Router;
use DI\Container;
use DI\Definition\Source\MutableDefinitionSource;
use DI\Proxy\ProxyFactory;
use Dotenv\Dotenv;
use Philo\Blade\Blade;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Throwable;


class Application
{

    static $instance;

    private Router $router;

    private string $basePath;

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public static function getInstance(): Application
    {
        if (self::$instance == null) {
            self::$instance = new Application(new Container());
        }
        return self::$instance;
    }

    public function setup(){
        $this->initENV();

        $this->initRouter();
    }

    public function initENV()
    {
        $dotenv = Dotenv::createImmutable($this->basePath);
        $dotenv->load();
    }

    public function initRouter()
    {
        $router = new Router(
            new RoutesConfig(),
            new Request(),
            new Container()
        );

        try {
            $router->dispatchRoute();
        } catch (AppException $ex) {
            $router->sendErrorResponse($ex->getMessage(), $ex->getCode());
        } catch (Throwable $ex) {
            $router->sendErrorResponse($ex->getMessage(), 500);
        }

    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     */
    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    public function view(string $view, $data = [])
    {
        $views = $this->basePath . DIRECTORY_SEPARATOR . 'views';
        $cache = $this->basePath . DIRECTORY_SEPARATOR . 'cache';

        $blade = new Blade($views, $cache);
        echo $blade->view()->make($view, $data)->render();
    }

}