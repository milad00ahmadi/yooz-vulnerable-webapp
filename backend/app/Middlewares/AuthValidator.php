<?php

namespace App\Middlewares;

use App\Contracts\RequestContract;
use App\Exceptions\ValidationException;

class AuthValidator extends Middleware
{

    /**
     * @param RequestContract $request
     * @return mixed
     * @throws ValidationException
     */
    public function handle(RequestContract $request)
    {
        if (!$request->getParam('username') || !$request->getParam('password'))
            throw ValidationException::create('username/password is required');

        return $this->executeNext($request);
    }
}