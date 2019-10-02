<?php
class MethodOverloading
{
    public function __call($name, $arguments)
    {
        if ($name == 'sayHello') {
            echo 'Hello, ' .implode(', ', $arguments). "\n";
        } elseif ($name == 'sayBye') {
            echo 'Goodbye ' .implode(', ', $arguments). "\n";
        } else {
            echo "Method Bulunamadı.\n";
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name == 'sayHello') {
            echo 'Hello, ' .implode(', ', $arguments). "\n";
        } elseif ($name == 'sayBye') {
            echo 'Goodbye ' .implode(', ', $arguments). "\n";
        } else {
            echo "Method Bulunamadı.\n";
        }
    }
}



$obj = new MethodOverloading;
$obj->saySomething('Mustafa');

$obj->sayHello('Mustafa');

MethodOverloading::sayBye('Mustafa');