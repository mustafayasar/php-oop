<?php

trait Hello {
    public function sayHello() {
        return 'Hello';
    }
}

trait World {
    public function sayWorld() {
        return 'World';
    }
}

trait Universe {
    public function sayUniverse() {
        return 'Universe';
    }
}

class SaySomething {
    use Hello, World, Universe;

    public function sayHelloWorld() {
        return $this->sayHello().' '.$this->sayWorld()."\n";
    }

    public function sayHelloUniverse() {
        return $this->sayHello().' '.$this->sayUniverse()."\n";
    }
}


$say_something  = new SaySomething();

echo $say_something->sayHelloWorld();
echo $say_something->sayHelloUniverse();
echo $say_something->sayHello();