<?php

namespace Acme;

class Kindle implements KindleInterface {

    public function turnOn()
    {
        var_dump('turn the kindle on');
    }

    public function nextButton()
    {
        var_dump('press next page on the kindle');
    }    
}
