<?php

// use the autoloader provided by composer
// this saves us from having a bunch of include/require lines like in our previous lab
require 'vendor/autoload.php';

// import the fully qualified class name
// more on this later 
use Zend\Crypt\Password\Bcrypt;

// create a new instance of the Bcrypt class
$bcrypt = new Bcrypt();

// access the create method
// it takes a string as a parameter
// and it returns a hash
//echo $argv[1];
$password = $bcrypt->create($argv[1]);


// send the hash to output
// PHP_EOL is just a constant to tag on END OF LINE character, which forces a new line in output
echo $password . PHP_EOL;

