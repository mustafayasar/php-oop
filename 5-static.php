<?php

class ClassF
{
    public static $static_var = 10;

    public static function staticMethod()
    {
        return "this is a static method. ".self::$static_var." \n";
    }

    public function exampleMethod()
    {
        return "this is a non-static method. ".self::$static_var." \n";
    }
}



echo ClassF::staticMethod();

$classF = new ClassF();

echo $classF->exampleMethod();



// Proje içerisinde farklı bir yerde aşağıdaki işlemleri yaptığımızı varsayalım.

ClassF::$static_var = 20;

echo ClassF::staticMethod(); // RAM'de bu metoda ait tek bir alan var hala, bir öncekinin üzerine yazdı.

$classF = new ClassF();

echo $classF->exampleMethod(); // Sınıf yeniden tanımlandığı için RAM'de ikinci bir alana sahip.


/**
this is a static method. 10
this is a non-static method. 10
this is a static method. 20
this is a non-static method. 20
 */