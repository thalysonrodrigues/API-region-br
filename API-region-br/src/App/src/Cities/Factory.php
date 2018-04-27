<?php

declare(strict_types=1);

namespace App\Cities;

use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class Factory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        $config = $container->get('config');
        $adapter = new Adapter($config['db']);
        $tableGateway = new TableGateway('CITIES', $adapter);

        return new $requestedName($tableGateway, $adapter);
    }
}
