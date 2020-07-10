<?php
namespace paydoo_test_lib\Models;
use paydoo_test_lib\Models\baseModel;

class transactions extends baseModel {
    public function getList(\DateTimeImmutable $from, \DateTimeImmutable $to, $products, $merchants) 
    {
        $pdo = $this->pdo;
        
        $products = array_map(function($product) use ($pdo) {
            return $pdo->quote($product);
        }, $products);
        
        $merchants = array_map(function($merchant) use ($pdo) {
            return $pdo->quote($merchant);
        }, $merchants);
        
        $stm = 'SELECT T.id, '
                . ' P.name AS product, '
                . ' C1.name AS currency_from, '
                . ' C2.name AS currency_to, '
                . ' M.name AS merchant, '
                . ' T.`date` '
                . 'FROM `transactions` T '
                . 'INNER JOIN products P ON (T.product_id = P.id) '
                . 'INNER JOIN currency C1 ON (T.from_currency_id = C1.id) '
                . 'INNER JOIN currency C2 ON (T.from_currency_id = C2.id) '
                . 'INNER JOIN merchants M ON (T.merchant_id = M.id) '
                . 'WHERE T.`date` BETWEEN :from AND :to '
                . '  AND P.name IN ('. implode(',', $products).') '
                . '  AND M.name IN ('. implode(',', $merchants).') '
                . 'ORDER BY T.`date` DESC ';

        
        return $this->pdo->fetchAssoc($stm, ['from'=> $from->format('Y-m-d'), 'to'=> $to->format('Y-m-d')]);
    }
}
