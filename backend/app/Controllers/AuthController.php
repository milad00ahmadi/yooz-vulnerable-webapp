<?php


namespace App\Controllers;


use App\Services\Request;
use App\Services\Response;
use App\Vulnerabilities\CrossSiteRequestForgery;

class AuthController extends Controller
{
    private CrossSiteRequestForgery $requestForgery;

    public function __construct(Response $response, Request $request, CrossSiteRequestForgery $requestForgery)
    {
        parent::__construct($response, $request);
        $this->requestForgery = $requestForgery;
    }

    public function csrf()
    {

    }


}