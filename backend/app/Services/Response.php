<?php


namespace App\Services;
use App\Contracts\ResponseContract;

class Response implements ResponseContract
{

    /**
     * @param string[] $resp
     */
    public function toJson(array $resp)
    {
        echo json_encode($resp);
    }

}