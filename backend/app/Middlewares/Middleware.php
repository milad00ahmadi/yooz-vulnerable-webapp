<?php


namespace App\Middlewares;


use App\Contracts\RequestContract;

abstract class Middleware
{
    protected Middleware $next;

    /**
     * @param Middleware $next
     */
    public function setNext(Middleware $next): void
    {
        $this->next = $next;
    }

    public function executeNext($request)
    {
        if (isset($this->next)) {
            $this->next->handle($request);
        }
        return null;
    }

    public function handle(RequestContract $request)
    {
        return $this->next->handle($request);
    }


}