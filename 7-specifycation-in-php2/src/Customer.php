<?php

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    
    protected $fillable = ['name', 'type'];    

    public function type()
    {
        return $this->type;
    }
}
