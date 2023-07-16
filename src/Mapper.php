<?php

namespace sagoe1712\Policies;

use DateTime;
use Doctrine\DBAL\Query\QueryBuilder;
use sagoe1712\Policies\Collection\Collection;
use sagoe1712\Foundation;
use Exception;
class Mapper extends  Foundation\Mapper
{
    public function getModel(): string
    {
        return Policies::class;
    }

    protected function instantiateModel(array $data): Policies
    {

        return parent::instantiateModel($data);
    }

    public function getBaseQuery(): QueryBuilder
    {
        // Get the database query builder.
        $queryBuilder = $this->getQueryBuilder();

        // Return a start point for a Entity.
        return $queryBuilder->select(
           'policies.customerName',
           'policies.customerAddress',
           'policies.premium',
           'policies.policyType',
           'policies.insurerName',
           'policies.id'
        )->from('policies', 'policies');
    }

    public function save(Policies $policy): Policies
    {
        $queryBuilder = $this->buildSave($this->getQueryBuilder(), 'policies', [
            'id' => ':id',
            'customerName' => ':customerName',
            'customerAddress' => ':customerAddress',
            'premium' => ':premium',
            'policyType' => ':policyType',
            'insurerName' => ':insurerName',
        ], [
            'id' => $policy->getId(),
            'customerName' => $policy->getCustomerName(),
            'customerAddress' => $policy->getCustomerAddress(),
            'premium' => $policy->getPremium(),
            'policyType' => $policy->getPolicyType(),
            'insurerName' => $policy->getInsurerName(),
        ]);

        $queryBuilder->execute();

        // Set ID for an insert.
        if (is_null($policy->getId())) {
            $policy->setId($queryBuilder->getConnection()->lastInsertId());
        }

        return $policy;
    }

    public function getById(int $id): Foundation\Collection\CollectionInterface
    {
        $result = $this->getBaseQuery()
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAll();

        return $this->bindToCollection($result, $this->collectionFactory->getCollection());
    }

}
