<?php

namespace App\Middlewares;

use App\Contracts\RequestContract;
use App\Exceptions\ValidationException;

class IdValidator extends Middleware
{

    /**
     * @param RequestContract $request
     * @return mixed
     * @throws ValidationException
     */
    public function handle(RequestContract $request)
    {
        if (!$request->getParam('id'))
            throw ValidationException::create('id is required');

        return $this->executeNext($request);
    }
}