<?php
namespace paydoo_test_lib\Exceptions\ValueObject;
use paydoo_test_lib\Filters\ValueObjectInterface;
use \paydoo_test_lib\Exceptions\ValueObject\AbstractInvalidValueException;

class InvalidCurrencyValue extends \Exception implements AbstractInvalidValueException {
    
    private $obj;
    
    public function __construct(ValueObjectInterface $obj, int $code = 0, \Throwable $previous = null) {
        $this->obj = $obj;
        
        $obj_class = get_class($obj);
        $obj_class = explode('\\', $obj_class);
        $obj_class = $obj_class[count($obj_class) - 1];
        
        $message = '"{{ '.$obj->getValue().' }}" '
                . 'is not a valid value for'
                . ' {{ '.$obj_class.' }}. '
                . 'Valid values: '
                . '{{ '. implode(',', $obj->getValidValues()).' }}';
        
        parent::__construct($message, $code, $previous);
    }
    
    public function getValueObjectClass(): ValueObjectInterface {
        return $this->obj;
    }
}
