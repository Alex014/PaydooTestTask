<?php

spl_autoload_register(function ($class) {
    if(strpos($class, 'paydoo_test_lib') !== false) {
        require __DIR__.'/'.str_replace(array('paydoo_test_lib', '\\'), array('', '/'), $class).'.php';
    }
});