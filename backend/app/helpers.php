<?php
function app()
{
    return \App\Application::getInstance();

}

function app_path($path)
{

    if ($path === null) {
        return app();
    }
    return dirname(__DIR__ . DIRECTORY_SEPARATOR . $path);
}

function view($view = null, $data = [])
{
    return app()->view($view, $data);
}

function config($name)
{
    return $_ENV[$name];
}