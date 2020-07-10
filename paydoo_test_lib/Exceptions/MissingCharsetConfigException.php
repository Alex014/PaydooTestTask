<?php
namespace paydoo_test_lib\Exceptions;

class MissingCharsetConfigException extends \LogicException
{
    public function __construct(string $dns, int $code = 0, \Throwable $previous = null)
    {
        $message = 'Parameter "charset" is missing in the dns: "{{ ' + $dns + ' }}"';
        parent::__construct($message, $code, $previous);
    }
}
