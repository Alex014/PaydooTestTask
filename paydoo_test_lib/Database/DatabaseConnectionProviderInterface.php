<?php
namespace paydoo_test_lib\Database;

use \Aura\Sql\AbstractExtendedPdo;

interface DatabaseConnectionProviderInterface 
{
    public function getConnection(): \Aura\Sql\AbstractExtendedPdo;
}