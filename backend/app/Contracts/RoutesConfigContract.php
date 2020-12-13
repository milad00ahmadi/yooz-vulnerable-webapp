<?php


namespace App\Contracts;


use Generator;

interface RoutesConfigContract
{
    /**
     * @return Generator
     */
    public function createRouteItems(): Generator;

}