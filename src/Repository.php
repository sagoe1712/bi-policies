<?php

namespace sagoe1712\Policies;

use sagoe1712\Policies;
use sagoe1712\Foundation;
use sagoe1712\Policies\Collection\Collection;
use DateTime;
use Doctrine\DBAL\Exception;
class Repository extends Foundation\Repository
{
    /**
     * @param Policies\Mapper $mapper
     */
    public function __construct(Policies\Mapper $mapper)
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
     * @return \sagoe1712\Policies\Policies
     */
    public function getNew(
        string $customerName,
        string $customerAddress,
        float $premium,
        string $policyType,
        string $insurerName,
        ?int $id = null
    ): Policies\Policies {
        return new Policies\Policies(
           $customerName,
           $customerAddress,
           $premium,
           $policyType,
           $insurerName,
           $id
        );
    }

    /**
     * @param \sagoe1712\Policies\Policies $policy
     * @return \sagoe1712\Policies\Policies
     */
    public function save(Policies\Policies $policy): Policies\Policies
    {
        return $this->mapper->save($policy);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getById(int $id): Collection
    {
        return $this->mapper->getById($id);
    }

}
