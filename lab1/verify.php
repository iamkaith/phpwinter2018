<?php

require 'vendor/autoload.php';
use Zend\Crypt\Password\Bcrypt;

$bcrypt = new Bcrypt();

//var_dump($argv);

if($bcrypt->verify($argv[1], $argv[2])) {
    echo "valid".PHP_EOL;
} else {
    echo "invalid".PHP_EOL;
}

