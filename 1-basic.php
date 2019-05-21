<?php

class ClassA
{
    public $var = 'a default value';

    public function aMethod() {
        return 'this is a method';
    }
}


$a = new ClassA();

echo $a->var;

echo "\n";

echo $a->aMethod();




/**
a default value
this is a method
 */