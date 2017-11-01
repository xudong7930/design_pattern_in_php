<?php

namespace Acme;

use Acme\BookInterface;
use Acme\Kindle;

class KindleAdapter implements BookInterface {

    protected $kindle;

    public function __construct (KindleInterface $kindle)
    {
        $this->kindle = $kindle;
    }

    public function open()
    {
        $this->kindle->turnOn();
    }

    public function turnPage()
    {
        $this->kindle->nextButton();
    }
    
}
