<?php


namespace App\Vulnerabilities;


use App\Contracts\VulnerabilityContract;
use App\Traits\InjectionTrait;

class AdminBypass implements VulnerabilityContract
{
    use InjectionTrait;

    private string $username;
    private string $password;


    public function executeQuery($query)
    {
        // VULNERABLE CODE
        $results = $this->connection->query($query);

        $result = 'Username or Password is incorrect';

        $user = mysqli_num_rows($results);
        if ($user == 1) {
            $result = 'Successfully logged in';
        }
        return $result;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    protected function getQuery(): string
    {
        return "SELECT id,username,password FROM users WHERE username = '" . $this->username . "' AND password='" . $this->password . "' LIMIT 1,1";
    }


}