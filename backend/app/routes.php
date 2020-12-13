<?php


namespace App;


use App\Config\RouteConfigKeys;
use App\Controllers\GeneralController;
use App\Controllers\InjectionController;
use App\Middlewares\IdValidator;
use App\Middlewares\NameValidator;
use App\Services\Request;

return [

    [
        RouteConfigKeys::ROUTE_PATH => '/',
        RouteConfigKeys::HTTP_METHOD => Request::METHOD_GET,
        RouteConfigKeys::CONTROLLER => GeneralController::class,
        RouteConfigKeys::CONTROLLER_ACTION => 'home',
        RouteConfigKeys::CONTROLLER_MIDDLEWARES => []

    ],
    [
        RouteConfigKeys::ROUTE_PATH => '/api/sqli',
        RouteConfigKeys::HTTP_METHOD => Request::METHOD_GET,
        RouteConfigKeys::CONTROLLER => InjectionController::class,
        RouteConfigKeys::CONTROLLER_ACTION => 'sqli',
        RouteConfigKeys::CONTROLLER_MIDDLEWARES => [IdValidator::class]

    ],
    [
        RouteConfigKeys::ROUTE_PATH => '/api/blind-sqli',
        RouteConfigKeys::HTTP_METHOD => Request::METHOD_GET,
        RouteConfigKeys::CONTROLLER => InjectionController::class,
        RouteConfigKeys::CONTROLLER_ACTION => 'blindSqli',
        RouteConfigKeys::CONTROLLER_MIDDLEWARES => [NameValidator::class]
    ],

];