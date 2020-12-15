<?php

namespace App\Vulnerabilities;

use App\Contracts\VulnerabilityContract as VulnerabilityContract;
use App\Exceptions\ValidationException;
use App\Traits\InjectionTrait;

class SQLInjection implements VulnerabilityContract
{
    use InjectionTrait;
    protected string $id;


    /**
     * @return string
     */
    protected function getQuery(): string
    {
        return "SELECT id, name, price, description FROM products WHERE id='" . $this->id . "'";
    }

    public function executeQuery($query)
    {
        // VULNERABLE CODE
        $results = $this->connection->query($query);
        $rows = [];

        if ($results && $results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }




    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}