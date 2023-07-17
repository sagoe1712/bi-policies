<?php

include 'vendor/autoload.php';

$policiesRepo = new \sagoe1712\BiPolicies\Repository(
    new sagoe1712\BiPolicies\Mapper(
        new \Doctrine\DBAL\Connection([
            'host' => '192.168.33.200',
            'dbname' => 'broker_insight',
            'user' => 'root',
            'password' => ''
        ], new \Doctrine\DBAL\Driver\PDOMySql\Driver()),
        new \sagoe1712\BiPolicies\Collection\Factory()
    )
);

$newPolicy = $policiesRepo->getNew(
    'John Doe',
    '10 Dowing Street London W23 1DE',
    123.21,
    'Motor Insurance',
    'Aviva Insurance'
);

$newPolicy = $policiesRepo->save($newPolicy);
echo $newPolicy->getId();
