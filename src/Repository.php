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

}
