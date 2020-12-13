<?php


namespace App\Contracts;


interface RequestContract
{

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getUri(): string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $type
     * @param string $parameter
     * @return null|string
     */
    public function getRequestParam(string $type, string $parameter);

    /**
     * @return mixed
     */
    public function sendMethodNotAllowedHeader();

    /**
     * @return mixed
     */
    public function sendNotFoundHeader();


    /**
     * @param string $name
     * @return mixed
     */
    public function getParam(string $name);

}