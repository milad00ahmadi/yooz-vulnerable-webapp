<?php


namespace App\Vulnerabilities;


use App\Contracts\VulnerabilityContract as VulnerabilityContract;
use App\Traits\InjectionTrait;

class BlindSQLInjection implements VulnerabilityContract
{
    use InjectionTrait;

    private $keyword;

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword): void
    {
        $this->keyword = $keyword;
    }

    public function executeQuery($query)
    {
        // VULNERABLE CODE
        $results = $this->connection->query($query);
        $result = 'Product not found';

        if ($results->num_rows > 0) {
            $result = 'Product Found';
        }

        return $result;
    }

    protected function getQuery(): string
    {
        return "SELECT id, name, price, description FROM products WHERE name LIKE '%{$this->keyword}%'";
    }

}