<?php
namespace paydoo_test_lib\Filters;
use paydoo_test_lib\Filters\ValueObjectInterface;
use paydoo_test_lib\DI;

class CurrencyRate {
    public $targetCurrency;
    public $baseCurrency;
    public $exchangeRate;
    
    public function __construct(ValueObjectInterface $baseCurrency, 
            ValueObjectInterface $targetCurrency,
            float $exchangeRate) 
    {
        $this->baseCurrency = $baseCurrency;
        $this->targetCurrency = $targetCurrency;
        $this->exchangeRate = (float)$exchangeRate;
    }
    
    public function  saveRate() 
    {
        $cr = DI::getCurrency();
        $cr->saveRate($this->targetCurrency->getValue(), $this->baseCurrency->getValue(), $this->exchangeRate);
    }
    
    public function  getRate() 
    {
        if($this->baseCurrency->equals($this->targetCurrency)) {
            return 1;
        } else {
            $cr = DI::getCurrency();
            return $cr->getRate($this->targetCurrency->getValue(), $this->baseCurrency->getValue());
        }
    }
}
