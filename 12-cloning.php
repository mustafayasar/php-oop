<?php

class ClassM
{
    public $something = "Hello. \n";
    private $is_clone = false;

    function __clone()
    {
        $this->is_clone = true;
    }

    public function isClone()
    {
        if ($this->is_clone) {
            return "Bu bir klondur.\n";
        }

        return "Bu bir klon değilir.\n";
    }
}


$class1 = new ClassM();
$class2 = $class1;
$class3 = clone $class1;

$class1->something  = "Bye! \n";

echo $class1->something;
echo $class2->something;
echo $class3->something;
echo $class1->isClone();
echo $class2->isClone();
echo $class3->isClone();

