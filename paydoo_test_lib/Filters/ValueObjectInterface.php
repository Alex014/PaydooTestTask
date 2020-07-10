<?php
namespace paydoo_test_lib\Filters;

interface ValueObjectInterface {
    /**
    * @return array
    */
    public static function getValidValues(): array;
    /**
    * @return string
    */
    public function getValue(): string;
    /**
    * @param ValueObjectInterface $valueObject
    *
    * @return bool
    */
    public function equals(ValueObjectInterface $valueObject): bool;
}