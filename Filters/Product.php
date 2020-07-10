<?php
namespace paydoo_test_lib\Filters;
use paydoo_test_lib\Filters\ValueObjectInterface;
use paydoo_test_lib\Exceptions\ValueObject\InvalidProductValue;

class Product implements ValueObjectInterface {
    private $value;
    
    public function __construct(string $value) 
    {
        $this->value = strtoupper($value);
        
        if(!self::checkValue($value)) {
            throw new InvalidProductValue($this);
        }
    }
    
    /**
    * @return array
    */
    public static function getValidValues(): array
    {
        return ['ECOM', 'POS'];
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