<?php
namespace paydoo_test_lib\Models;

class baseModel 
{
    protected $pdo;
    
    public function __construct(\Aura\Sql\AbstractExtendedPdo $pdo) 
    {
        $this->pdo = $pdo;
    }
}
