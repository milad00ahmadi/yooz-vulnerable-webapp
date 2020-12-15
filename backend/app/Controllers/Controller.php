<?php

namespace App\Controllers;

use App\Services\Request;
use App\Services\Response;

abstract class Controller
{
    /**
     * @var Response
     */
    private Response $response;
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @param Response $response
     * @param Request $request
     */
    public function __construct(Response $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;


    }

    /**
     * @return Response
     */
    protected function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return Request
     */
    protected function getRequest(): Request
    {
        return $this->request;
    }


}