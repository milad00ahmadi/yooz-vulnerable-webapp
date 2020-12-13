<?php


namespace App\Contracts;


interface ResponseContract
{
    /**
     * @param array $resp
     * @return mixed
     */
    public function toJson(array $resp);
}