<?php


use Illuminate\Database\Capsule\Manager as DB;
use PHPUnit\Framework\TestCase;

class CustomerRepositoryTest extends TestCase {
    
    protected $customers;

    public function setUp()
    {
        $this->setUpDatabase();
        $this->migrateTables();
        
        $this->customers = new CustomerRepository;
    }

    public function setUpDatabase()
    {
        $database = new DB;
        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
        $database->bootEloquent();
        $database->setAsGlobal();
    }

    public function migrateTables()
    {
        DB::schema()->create('customers', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Talor', 'type' => 'silver']);
    }

    /**
     * @test
     */
    public function test_it_can_fetch_all_customers ()
    {
        $results = $this->customers->all();
        $this->assertCount(2, $results);
    }
}
