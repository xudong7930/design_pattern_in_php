<?php

use PHPUnit\Framework\TestCase;

class CustomerRepositoryTest extends TestCase {
    
    protected $customers;

    public function setUp()
    {
        $this->customers = new CustomerRepository([
            new Customer('gold'),
            new Customer('bronze'),
            new Customer('silver'),
            new Customer('gold')
        ]);
    }

    /**
     * @test
     */
    public function test_it_can_fetch_all_customers ()
    {
        $results = $this->customers->bySpecification(new CustomerIsGold);
        $this->assertCount(2, $results);
    }
}
