<?php
namespace paydoo_test_lib\Database;

use \paydoo_test_lib\Database\DatabaseConnectionProviderInterface;
use \Aura\Sql\AbstractExtendedPdo;
use \Aura\Sql\DecoratedPdo;

class DatabaseConnectionFromPdoProvider implements DatabaseConnectionProviderInterface
{
    public $exPdo;
    
    public function __construct(\PDO $pdo)
    {
        $this->exPdo = new DecoratedPdo($pdo);
    }
    
    public function getConnection(): \Aura\Sql\AbstractExtendedPdo
    {
        return $this->exPdo;
    }
}
