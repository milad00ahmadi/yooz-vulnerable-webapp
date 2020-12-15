<?php


namespace App\Vulnerabilities;


use App\Contracts\VulnerabilityContract;
use App\Traits\InjectionTrait;

class CrossSiteRequestForgery implements VulnerabilityContract
{
    use InjectionTrait;

    private int $selectedProductId;
    private string $destZipCode;
    private int $userId;

    public function execute()
    {
        if ($this->hasEnoughCredit()){

        }
    }

    private function hasEnoughCredit(): bool
    {
        $query = "SELECT credit FROM users where id='{$this->userId}'";
        $results = $this->connection->query($query);
        echo $results;
        return true;

    }

    /**
     * @param int $selectedProductId
     */
    public function setSelectedProductId(int $selectedProductId): void
    {
        $this->selectedProductId = $selectedProductId;
    }

    /**
     * @param string $destZipCode
     */
    public function setDestZipCode(string $destZipCode): void
    {
        $this->destZipCode = $destZipCode;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}