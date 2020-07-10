<?php
namespace paydoo_test_lib;
use Exceptions\MissingQueryParameterException;

class Util {
    
    public static $apdo;
    
    /**
     * 
     * @param array $params - associative array with query parameters.
     * @return \Currency
     */
    public static function baseCurrencyFromRequestQuery(array $params): Currency
    {
        if(empty($params['cbase']))
            throw new MissingQueryParameterException ('cbase');
        else
            return $params['cbase'];
    }
    
    /**
     * 
     * @param array $params - associative array with query parameters.
     * @return \Currency
     */
    public static function targetCurrencyFromRequestQuery(array $params): Currency
    {
        if(empty($params['ctarget']))
            throw new MissingQueryParameterException ('ctarget');
        else
            return $params['ctarget'];
    }

    /**
     * 
     * @param array $params - associative array with query parameters.
     * @return array
     */
    public static function productsFromRequestQuery(array $params): array
    {
        if(empty($params['products']))
            throw new MissingQueryParameterException ('products');
        else
            return $params['products'];
    }

}
