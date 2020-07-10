<?php
namespace paydoo_test_lib\Filters;
use paydoo_test_lib\DI;

class Filter extends BasicFilter {
    public $merchants;
    
    public function __construct(\DateTimeImmutable $from, \DateTimeImmutable $to
            , array $products, array $merchants) 
    {
        parent::__construct($from, $to, $products);
        
        $this->merchants = [];
        
        foreach ($merchants as $merchant) {
            $this->merchants[] = $merchant;
        }
    }
    
    public function  getTransactions() 
    {
        $tr = DI::getTransactions();
        return $tr->getList($this->from, $this->to, $this->products, $this->merchants);
    }
}