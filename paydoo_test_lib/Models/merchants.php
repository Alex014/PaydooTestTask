<?php
namespace paydoo_test_lib\Models;
use paydoo_test_lib\Models\baseModel;

class merchants extends baseModel {
    public function getList() 
    {
        $stm = 'SELECT * from merchants';
        return $this->pdo->fetchAssoc($stm, []);
    }
}
