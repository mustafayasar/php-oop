<?php

class ClassC
{
    public $name = '';

    function __construct($name) {
        $this->name = $name;

        echo "ClassC is created \n";
    }

    function hello() {
        echo "Hello, ".$this->name."! \n";
    }

    function __destruct() {
        echo "ClassC is removing from RAM. \n";
    }
}


$c = new ClassC('Mustafa');

$c->hello();




/**
ClassC is created
Hello, Mustafa!
ClassC is removing from RAM.
 */