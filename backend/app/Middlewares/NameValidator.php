<?php

namespace App\Middlewares;

use App\Contracts\RequestContract;
use App\Exceptions\ValidationException;

class NameValidator extends Middleware
{

    /**
     * @param RequestContract $request
     * @return mixed
     * @throws ValidationException
     */
    public function handle(RequestContract $request)
    {
        if (!$request->getParam('name'))
            throw ValidationException::create('name is required');

        return $this->executeNext($request);
    }
}