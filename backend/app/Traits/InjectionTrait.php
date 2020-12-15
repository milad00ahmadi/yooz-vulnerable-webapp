<?php


namespace App\Traits;


use App\Exceptions\DatabaseException;
use mysqli;

trait InjectionTrait
{

    protected mysqli $connection;


    /**
     * @return mixed
     */
    public function execute()
    {
        try {
            $query = $this->getQuery();
            $results = $this->createConnection()->executeQuery($query);
            $this->connection->close();

            return $this->createResults($query, $results);
        } catch (\Throwable $exception) {
            return $this->createError($query, $exception);
        }
    }

    /**
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

}