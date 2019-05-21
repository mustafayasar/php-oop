<?php

class ClassB
{
    public $property    = 'Hello, bro!';

    const CONSTANT      = 'How are you?';
}


$b = new ClassB();

echo $b->property;

echo "\n";

$b->property    = 'Hello, sis!';

echo $b->property;

echo "\n";

// You can't do this => ClassB::CONSTANT = 'What\'s up?';

echo ClassB::CONSTANT;




/**
Hello, bro!
Hello, sis!
How are you?
*/