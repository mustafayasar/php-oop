<?php

class SaySomething
{
    public function hello()
    {
        return new class
        {
            public function world() {
                return "Hello World! \n";
            }

            public function universe() {
                return "Hello Universe! \n";
            }
        };
    }
}

$say_something  = new SaySomething();
echo $say_something->hello()->world();
echo $say_something->hello()->universe();
