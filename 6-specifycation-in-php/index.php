<?php

class CustomerIsGold {

    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->type == 'gold';
    }
    
}

class Customer {
    
    protected $type;

    public function isGold()
    {
        return $this->type = 'gold';
    }
    
}


$spec = new CustomerIsGold;
$spec->isGold();
