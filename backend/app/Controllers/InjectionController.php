<?php

namespace App\Controllers;

use App\Services\Request;
use App\Services\Response;
use App\Vulnerabilities\AdminBypass;
use App\Vulnerabilities\BlindSQLInjection;
use App\Vulnerabilities\SQLInjection;
use App\Traits\ApiTrait;

class InjectionController extends Controller
{

    private SQLInjection $sqlInjection;
    private BlindSQLInjection $blindSqlInjection;
    private AdminBypass $adminBypass;


    public function __construct(Response $response, Request $request, SQLInjection $sqlInjection,
                                BlindSQLInjection $blindSqlInjection, AdminBypass $adminBypass)
    {
        parent::__construct($response, $request);
        $this->sqlInjection = $sqlInjection;
        $this->blindSqlInjection = $blindSqlInjection;
        $this->adminBypass = $adminBypass;

    }


    public function sqli()
    {
        $this->sqlInjection->setId($this->getRequest()->getParam('id'));
        return $this->sqlInjection->execute();
    }

    public function blindSqli()
    {
        $this->blindSqlInjection->setKeyword($this->getRequest()->getParam('name'));
        return $this->blindSqlInjection->execute();
    }

    public function authBypass()
    {
        $this->adminBypass->setUsername($this->getRequest()->getParam('username'));
        $this->adminBypass->setPassword($this->getRequest()->getParam('password'));
        return $this->adminBypass->execute();
    }


}