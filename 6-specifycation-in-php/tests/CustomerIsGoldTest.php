<?php

use PHPUnit\Framework\TestCase;

class CustomerIsGoldTest extends TestCase {
    
    /**
     * @test
     */
    public function a_customer_is_gold_type ()
    {
        $specification = new CustomerIsGold;
        $goldCustomer = new Customer('gold');
        $silverCustomer = new Customer('silver');

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }
}
