<?php


class ClassD
{
    public $public_var = "this variable is public \n";
    protected $protected_var = "this variable is protected \n";
    private $private_variable = "this variable is private \n";

    public function publicMethod()
    {
        return "this method is public \n";
    }

    protected function protectedMethod()
    {
        return "this method is protected \n";
    }

    private function privateMethod()
    {
        return "this method is private \n";
    }


    public function test()
    {
        echo $this->public_var; // çağırılabilir.
        echo $this->protected_var; // çağırılabilir.
        echo $this->private_variable; // çağırılabilir.

        echo $this->publicMethod(); // çağırılabilir.
        echo $this->protectedMethod(); // çağırılabilir.
        echo $this->privateMethod(); // çağırılabilir.
    }
}

class ClassE extends ClassD
{
    public function test()
    {
        echo $this->public_var; // çağırılabilir.
        echo $this->protected_var; // çağırılabilir.
        // echo $this->private_variable; // çağrılamaz, betik hata verir.

        echo $this->publicMethod(); // çağırılabilir.
        echo $this->protectedMethod(); // çağırılabilir.
        // echo $this->privateMethod(); // çağrılamaz, betik hata verir.
    }
}


$classA = new ClassA();

$classA->public_var; // çağırılabilir.
// $classA->protected_var; // çağrılamaz, betik hata verir.
// $classA->private_variable; // çağrılamaz, betik hata verir.

$classA->publicMethod(); // çağırılabilir.
// $classA->protectedMethod(); // çağrılamaz, betik hata verir.
// $classA->privateMethod(); // çağrılamaz, betik hata verir..


$classB = new ClassB();

$classB->public_var; // çağırılabilir.
// $classB->protected_var; // çağrılamaz, betik hata verir.
// $classB->private_variable; // çağrılamaz, betik hata verir.

$classB->publicMethod(); // çağırılabilir.
// $classB->protectedMethod(); // çağrılamaz, betik hata verir.
// $classB->privateMethod(); // çağrılamaz, betik hata verir.


echo "classA results; \n";

$classA->test();

echo "\n \n";

echo "classB results; \n";

$classB->test();