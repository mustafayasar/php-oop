<?php

interface VehicleInterface
{
    public function getTitle($brand);
}

class Car implements VehicleInterface
{
    public function getTitle($brand)
    {
        return "Bu bir $brand marka arabadır. \n";
    }
}

class Motorcycle implements VehicleInterface
{
    public function getTitle($brand)
    {
        return "Bu bir $brand marka motorsiklettir. \n";
    }

    public function getMaxSpeed()
    {
        return 160;
    }
}