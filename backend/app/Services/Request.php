<?php


namespace App\Services;

use App\Contracts\RequestContract;

class Request implements RequestContract
{
    const METHOD = 'REQUEST_METHOD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const URI = 'REQUEST_URI';
    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';



    public function getPath(): string
    {

        $uri = $this->getUri();
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        return rawurldecode($uri);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $_SERVER[static::URI];
    }

    public function sendMethodNotAllowedHeader()
    {
        header($this->getServerProtocol() . ' 405 Method Not Allowed');
    }

    private function getServerProtocol()
    {
        return $_SERVER[static::SERVER_PROTOCOL];
    }

    public function sendNotFoundHeader()
    {
        header($this->getServerProtocol() . ' 404 Not Found');
    }

    public function getParam(string $name)
    {
        return $this->getRequestParam($this->getMethod(), $name);
    }

    /**
     * @param string $type
     * @param string $parameter
     * @return null|string
     */
    public function getRequestParam(string $type, string $parameter)
    {
        switch ($type) {
            case static::METHOD_GET:
                $parameterValue = $this->getParamFromGetVar($parameter);
                break;
            case static::METHOD_POST:
                $parameterValue = $this->getParamFromPostVar($parameter);
                break;
            default:
                $parameterValue = null;
        }

        return $parameterValue;
    }

    /**
     * @param string $parameter
     * @return null|string
     */
    private function getParamFromGetVar(string $parameter)
    {
        return $this->getParamFromVar($parameter, $_GET);
    }

    /**
     * @param string $parameter
     * @param array $var
     * @return string|null
     */
    private function getParamFromVar(string $parameter, array $var)
    {
        if (array_key_exists($parameter, $var)) {
            return $var[$parameter];
        }

        return null;
    }

    /**
     * @param string $parameter
     * @return null|string
     */
    private function getParamFromPostVar(string $parameter)
    {
        return $this->getParamFromVar($parameter, $_POST);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER[static::METHOD];
    }

}