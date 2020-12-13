<?php


namespace App\Vulnerabilities;


class BlindSQLInjection extends SQLInjection
{
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

        $this->connection->close();
        return $result;
    }

    protected function getQuery(): string
    {
        return "SELECT id, name, price, description FROM products LIKE name='" . $this->keyword . "'";
    }

}