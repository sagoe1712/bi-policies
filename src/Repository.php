<?php

namespace sagoe1712\BiPolicies;

use sagoe1712\BiPolicies;
use sagoe1712\Foundation;
use sagoe1712\BiPolicies\Collection\Collection;
use Doctrine\DBAL\Exception;

class Repository extends Foundation\Repository
{
    /**
     * @param BiPolicies\Mapper $mapper
     */
    public function __construct(BiPolicies\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $customerName
     * @param string $customerAddress
     * @param float $premium
     * @param string $policyType
     * @param string $insurerName
     * @param int|null $id
     * @return \sagoe1712\BiPolicies\BiPolicies
     */
    public function getNew(
        string $customerName,
        string $customerAddress,
        float $premium,
        string $policyType,
        string $insurerName,
        ?int $id = null
    ): BiPolicies\BiPolicies {
        return new BiPolicies\BiPolicies(
            $customerName,
            $customerAddress,
            $premium,
            $policyType,
            $insurerName,
            $id
        );
    }

    /**
     * @param \sagoe1712\BiPolicies\BiPolicies $policy
     * @return \sagoe1712\BiPolicies\BiPolicies
     * @throws Exception
     */
    public function save(BiPolicies\BiPolicies $policy): BiPolicies\BiPolicies
    {
        return $this->mapper->save($policy);
    }

    /**
     * Get policy by id.
     *
     * @param int $id
     * @return Collection
     * @throws Exception
     */
    public function getById(int $id): Collection
    {
        return $this->mapper->getById($id);
    }

}
