<?php

abstract class Vehicle
{
    protected $brand;

    public function setBrand($brand) {
        $this->brand    = $brand;
    }
    
    abstract public function getTitle();
}


class Car extends Vehicle
{
    public function getTitle()
    {
        if ($this->brand != '') {
            return "Bu bir ".$this->brand." marka otomobildir. \n";
        } else {
            return "Bu otomobilin markası girilmemiştir. \n";
        }
    }
}

class Motorcycle extends Vehicle
{
    public function getTitle()
    {
        if ($this->brand != '') {
            return "Bu bir ".$this->brand." marka motorsiklettir. \n";
        } else {
            return "Bu motorsikletin markası girilmemiştir. \n";
        }
    }

    public function getMaxSpeed()
    {
        return 160;
    }
}


$car = new Car();
$car->setBrand('Renault');

echo $car->getTitle();


$motorcycle = new Motorcycle();
$motorcycle->setBrand('Yamaha');

echo $motorcycle->getTitle();