<?php
namespace paydoo_test_lib\Exceptions;

class MissingQueryParameterException extends \LogicException
{
    private $misingParam;
    
    public function __construct(string $missingParam, int $code = 0, \Throwable $previous = null)
    {
        $this->misingParam = $misingParam;
        $message = 'Parameter "{{ ' + $missingParam + ' }}" is missing in the query';
        parent::__construct($message, $code, $previous);
    }
    
    public function getMissingParam(): string
    {
        return $this->misingParam;
    }
}
