<?php

class ClassC
{
    function __construct() {
        print "ClassC is created \n";
    }

    function hello() {
        echo "Hello\n";
    }

    function __destruct() {
        echo "ClassC is removing from RAM.\n";
    }
}


$c = new ClassC();

$c->hello();




/**
ClassC is created
Hello
ClassC is removing from RAM.
 */