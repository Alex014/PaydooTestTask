<?php
namespace paydoo_test_lib\Filters;
use paydoo_test_lib\Filters\ValueObjectInterface;
use paydoo_test_lib\Exceptions\ValueObject\InvalidCurrencyValue;

class Currency implements ValueObjectInterface {
    private $value;
    
    public function __construct(string $value) 
    {
        $value = strtoupper($value);

        $this->value = strtoupper($value);
        
        if(!self::checkValue($value)) {
            throw new InvalidCurrencyValue($this);
        }
    }
    
    /**
    * @return array
    */
    public static function getValidValues(): array
    {
        return ['EUR', 'GBP', 'USD'];
    }
    
    public static function checkValue($value): bool
    {
        $value = strtoupper($value);
        return in_array($value, self::getValidValues());
    }
    
    /**
    * @return string
    */
    public function getValue(): string
    {
        return $this->value;
    }
    
    /**
    * @param ValueObjectInterface $valueObject
    *
    * @return bool
    */
    public function equals(ValueObjectInterface $valueObject): bool
    {
        return $this->value == $valueObject->getValue();
    }
}