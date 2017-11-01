<?php

abstract class HomeChecker {
    protected $successor;

    abstract public function check(HomeStatus $home);

    public function successorWith(HomeChecker $successor)
    {
        $this->successor = $successor; 
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker{
    public function check(HomeStatus $home)
    {
        if (! $home->locked) {
            throw new Exception('The door not locked!! Abort'); 
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker {
    public function check(HomeStatus $home) {
        if (! $home->lightsOff) {
            throw new Exception('The lights still on!! Abort');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker {
    public function check(HomeStatus $home) {
        if (! $home->alarmOn) {
            throw new Exception('The Alarm does not set!! Abort');
        }

        $this->next($home);
    }
}

class HomeStatus {
    public $locked = false;
    public $lightsOff = false;
    public $alarmOn = false;
}



$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->successorWith($lights);
$lights->successorWith($alarm);

$locks->check(new HomeStatus);
