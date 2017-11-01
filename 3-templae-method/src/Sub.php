<?php

namespace App;

abstract class Sub {

    public function make()
    {
        return $this->layBread()
            ->addLecture()
            ->addPrimaryTool()
            ->addSauces();
    }

    abstract protected function addPrimaryTool();

    protected function addSauces()
    {
        var_dump("add sauces");
        return $this;
    }

    protected function addLecture()
    {
        var_dump("add some lecture");
        return $this;
    }

    protected function layBread()
    {
        var_dump("laying down some bread");
        return $this;
    }
    
}
