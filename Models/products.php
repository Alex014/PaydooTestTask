<?php
namespace paydoo_test_lib\Models;
use paydoo_test_lib\Models\baseModel;

class products extends baseModel {
    public function getList() 
    {
        $stm = 'SELECT * from products';
        return $this->pdo->fetchAssoc($stm, []);
    }
}
