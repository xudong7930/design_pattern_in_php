<?php

class CustomerRepository {
    protected $customers;

    public function bySpecification($specification)
    {
        /*
        $matches = [];
        foreach ($this->all() as $customer) {
            if ($specification->isSatisfiedBy($customer)) {
                $matches[] = $customer;
            }
        }
        return $matches;
        */
        
        $costomers = Customer::query();
        $customers = $specification->asScope($customers);
        return $customers->get();
    }

    public function all()
    {
        return Customer::all();
    }
}
