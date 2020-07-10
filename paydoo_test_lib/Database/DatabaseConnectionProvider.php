<?php
namespace paydoo_test_lib\Database;

use \paydoo_test_lib\Database\DatabaseConnectionProviderInterface;
use \Aura\Sql\AbstractExtendedPdo;
use \Aura\Sql\ExtendedPdo;
use Exceptions\MissingCharsetConfigException;

class DatabaseConnectionProvider implements DatabaseConnectionProviderInterface
{
    public $exPdo;
    
    public function __construct(string $pdoDsn, string $username, string $password)
    {
        if (strpos($pdoDsn, 'charset=') === false)
            throw new MissingCharsetConfigException ($pdoDsn);

        $this->exPdo = new \Aura\Sql\ExtendedPdo($pdoDsn, $username, $password);
    }
    
    public function getConnection(): \Aura\Sql\AbstractExtendedPdo
    {
        return $this->exPdo;
    }
}
