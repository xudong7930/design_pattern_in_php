<?php

namespace Acme;

class Nook implements KindleInterface {

    public function turnOn()
    {
        var_dump('turn nook on');
    }

    public function nextButton()
    {
        var_dump('press next button on nook');
    }
}
