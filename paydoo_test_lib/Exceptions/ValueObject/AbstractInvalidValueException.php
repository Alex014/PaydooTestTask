<?php
namespace paydoo_test_lib\Exceptions\ValueObject;
use paydoo_test_lib\Filters\ValueObjectInterface;

interface AbstractInvalidValueException {
    
    public function __construct(ValueObjectInterface $obj, int $code = 0, \Throwable $previous = null);
    
    public function getValueObjectClass(): ValueObjectInterface;
}
