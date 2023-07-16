<?php

include 'vendor/autoload.php';

$policiesRepo = new \sagoe1712\Policies\Repository(
    new sagoe1712\Policies\Mapper(
        new \Doctrine\DBAL\Connection([
            'host' => '127.0.0.1',
            'dbname' => 'broker_insight',
            'user' => 'root',
            'password' => ''
        ], new \Doctrine\DBAL\Driver\PDOMySql\Driver()),
        new \ArenaRacingCompany\ActivityLog\Collection\Factory()
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
