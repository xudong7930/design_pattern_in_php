<?php
// 1 the decorator pattern.

interface CarService {
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService {

    public function getCost()
    {
        return 19;
    }

    public function getDescription()
    {
        return 'basic descripiton';
    }
}

class OilChange implements CarService {

    protected $carservice;

    public function __construct (CarService $service)
    {
        
        $this->carservice = $service;
    }

    public function getCost()
    {
        return 25 + $this->carservice->getCost();
    }

    public function getDescription()
    {
        return $this->carservice->getDescription() . ' and oil change';
    }
}

class TireRotation implements CarService {

    protected $carservice;

    public function __construct (CarService $service)
    {
        
        $this->carservice = $service;
    }

    public function getCost()
    {
        return 37 + $this->carservice->getCost();
    }

    public function getDescription()
    {
        return $this->carservice->getDescription() . ' and tire rotation';
    }
}

echo (new BasicInspection)->getCost().PHP_EOL;
echo (new OilChange(new BasicInspection))->getCost().PHP_EOL;
echo (new TireRotation(new OilChange(new BasicInspection)))->getCost().PHP_EOL;
