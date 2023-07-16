<?php

namespace sagoe1712\Policies;

use sagoe1712\Foundation\Model;
use DateTime;
class Policies extends Model
{
    /**
     * @var int|null
     */
    protected ?int $id;
    /**
     * @var string
     */
    protected string $customerName;
    /**
     * @var string
     */
    protected string $customerAddress;
    /**
     * @var float
     */
    protected float $premium;
    /**
     * @var string
     */
    protected string $policyType;
    /**
     * @var string
     */
    protected string $insurerName;

    /**
     * @param string $customerName
     * @param string $customerAddress
     * @param float $premium
     * @param string $policyType
     * @param string $insurerName
     * @param int|null $id
     */
    public function __construct(
        string $customerName,
        string $customerAddress,
        float $premium,
        string $policyType,
        string $insurerName,
        ?int $id
    )
    {
        $this->id = $id;
        $this->customerName = $customerName;
        $this->customerAddress = $customerAddress;
        $this->premium = $premium;
        $this->policyType = $policyType;
        $this->insurerName = $insurerName;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName(string $customerName): void
    {
        $this->customerName = $customerName;
    }

    /**
     * @return string
     */
    public function getCustomerAddress(): string
    {
        return $this->customerAddress;
    }

    /**
     * @param string $customerAddress
     */
    public function setCustomerAddress(string $customerAddress): void
    {
        $this->customerAddress = $customerAddress;
    }

    /**
     * @return float
     */
    public function getPremium(): float
    {
        return $this->premium;
    }

    /**
     * @param float $premium
     */
    public function setPremium(float $premium): void
    {
        $this->premium = $premium;
    }

    /**
     * @return string
     */
    public function getPolicyType(): string
    {
        return $this->policyType;
    }

    /**
     * @param string $policyType
     */
    public function setPolicyType(string $policyType): void
    {
        $this->policyType = $policyType;
    }

    /**
     * @return string
     */
    public function getInsurerName(): string
    {
        return $this->insurerName;
    }

    /**
     * @param string $insurerName
     */
    public function setInsurerName(string $insurerName): void
    {
        $this->insurerName = $insurerName;
    }


}
