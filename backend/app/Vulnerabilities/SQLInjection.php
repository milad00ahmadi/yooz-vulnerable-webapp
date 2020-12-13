<?php

namespace App\Vulnerabilities;

use App\Contracts\VulnerabilityContract as VulnerabilityContract;
use App\Exceptions\DatabaseException;
use mysqli;

class SQLInjection implements VulnerabilityContract
{
    protected string $id;
    protected mysqli $connection;


    public function execute()
    {
        try {
            $query = $this->getQuery();
            $results = $this->createConnection()->executeQuery($query);

            return $this->createResults($query, $results);
        } catch (\Throwable $exception) {
            return $this->createError($query, $exception);
        }
    }

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

        $this->connection->close();
        return $rows;
    }

    /**
     * @return SQLInjection
     * @throws DatabaseException
     */
    public function createConnection()
    {
        $connection = new mysqli(config('DATABASE_URL'), config('DATABASE_USERNAME'), config('DATABASE_PASSWORD'), config('DATABASE_NAME'));
        if ($connection->connect_error) {
            throw DatabaseException::create('error while connecting to database');
        }
        $this->connection = $connection;

        return $this;
    }

    /**
     * @param $query
     * @param $results
     * @return array
     */
    protected function createResults($query, $results)
    {
        return [
            'query' => $query,
            'data' => $results
        ];
    }

    /**
     * @param $query
     * @param $exception
     * @return array
     */
    protected function createError($query, $exception)
    {
        return [
            'query' => $query,
            'exception' => $exception->getMessage()
        ];
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}