<?php

namespace App;

class TurkeySub extends Sub {

    public function addPrimaryTool()
    {
        var_dump("add turkey");
        return $this;
    }
}
