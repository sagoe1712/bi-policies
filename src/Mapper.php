<?php

namespace sagoe1712\BiPolicies;

use Doctrine\DBAL\Query\QueryBuilder;
use sagoe1712\BiPolicies\Collection\Collection;
use sagoe1712\Foundation;
use Exception;
class Mapper extends  Foundation\Mapper
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return BiPolicies::class;
    }

    /**
     * @param array $data
     * @return BiPolicies
     */
    protected function instantiateModel(array $data): BiPolicies
    {

        return parent::instantiateModel($data);
    }

    /**
     * @return QueryBuilder
     */
    public function getBaseQuery(): QueryBuilder
    {
        // Get the database query builder.
        $queryBuilder = $this->getQueryBuilder();

        // Return a start point for a Entity.
        return $queryBuilder->select(
           'policies.customer_name',
           'policies.customer_address',
           'policies.premium',
           'policies.policy_type',
           'policies.insurer_name',
           'policies.id'
        )->from('policies', 'policies');
    }

    /**
     * @param BiPolicies $policy
     * @return BiPolicies
     * @throws \Doctrine\DBAL\Exception
     */
    public function save(BiPolicies $policy): BiPolicies
    {
        $queryBuilder = $this->buildSave($this->getQueryBuilder(), 'policies', [
            'id' => ':id',
            'customer_name' => ':customer_name',
            'customer_address' => ':customer_address',
            'premium' => ':premium',
            'policy_type' => ':policy_type',
            'insurer_name' => ':insurer_name',
        ], [
            'id' => $policy->getId(),
            'customer_name' => $policy->getCustomerName(),
            'customer_address' => $policy->getCustomerAddress(),
            'premium' => $policy->getPremium(),
            'policy_type' => $policy->getPolicyType(),
            'insurer_name' => $policy->getInsurerName(),
        ]);

        $queryBuilder->execute();

        // Set ID for an insert.
        if (is_null($policy->getId())) {
            $policy->setId($queryBuilder->getConnection()->lastInsertId());
        }

        return $policy;
    }

    /**
     * Get policy by id.
     *
     * @param int $id
     * @return Collection
     * @throws \Doctrine\DBAL\Exception
     */
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
