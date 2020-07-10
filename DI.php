<?php
namespace paydoo_test_lib;
use paydoo_test_lib\Database\DatabaseConnectionProvider;
use paydoo_test_lib\Models\transactions;
use paydoo_test_lib\Models\currency;
use paydoo_test_lib\Models\merchants;
use paydoo_test_lib\Models\products;

class DI {
    
    public static function getConnection() 
    {
        $provider = new Database\DatabaseConnectionProvider('mysql:host=localhost;dbname=paydoo_test;charset=utf8', 'user', 'user');
        return $provider->getConnection();
    }
    
    public static function getCurrency() 
    {
        return new currency(Registry::$apdo);
    }
    
    public static function getMerchants() 
    {
        return new merchants(Registry::$apdo);
    }
    
    public static function getProducts() 
    {
        return new products(Registry::$apdo);
    }
    
    public static function getTransactions() 
    {
        return new transactions(Registry::$apdo);
    }
}
