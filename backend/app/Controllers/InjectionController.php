<?php

namespace App\Controllers;

use App\Services\Request;
use App\Services\Response;
use App\Vulnerabilities\BlindSQLInjection;
use App\Vulnerabilities\SQLInjection;

class InjectionController extends Controller
{
    private SQLInjection $sqlInjection;
    private BlindSQLInjection $blindSqlInjection;

    public function __construct(Response $response, Request $request, SQLInjection $sqlInjection, BlindSQLInjection $blindSqlInjection)
    {
        parent::__construct($response, $request);
        $this->sqlInjection = $sqlInjection;
        $this->blindSqlInjection = $blindSqlInjection;
    }

    public function sqli()
    {
        $this->sqlInjection->setId($this->getRequest()->getParam('id'));
        return $this->sqlInjection->execute();
    }

    public function blindSqli()
    {
        $this->blindSqlInjection->setId($this->getRequest()->getParam('name'));
        return $this->blindSqlInjection->execute();
    }

}