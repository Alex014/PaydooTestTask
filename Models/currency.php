<?php
namespace paydoo_test_lib\Models;
use paydoo_test_lib\Models\baseModel;

class currency extends baseModel {
    public function getList() 
    {
        $stm = 'SELECT * from currency';
        return $this->pdo->fetchAssoc($stm, []);
    }
    
    public function  saveRate($from_cur, $to_cur, $rate) 
    {
        $stm = 'INSERT INTO `rate` ( base_currency_id, currency_id, rate) '
                . 'VALUES (:curr_to, :curr_from, :rate )';
        return $this->pdo->perform($stm, ['curr_from'=> $from_cur, 'curr_to'=> $to_cur]);
    }
    
    public function getRate($from_cur, $to_cur) 
    {
        $stm = 'SELECT `rate`, `date` FROM `rate` WHERE '
                . ' base_currency_id = (SELECT id FROM currency WHERE name = :curr_to) AND  '
                . ' currency_id = (SELECT id FROM currency WHERE name = :curr_from) AND'
                . ' `date` < NOW() '
                . 'ORDER BY `date` DESC '
                . 'LIMIT 1';
        return $this->pdo->fetchOne($stm, ['curr_from'=> $from_cur, 'curr_to'=> $to_cur]);
    }
}
