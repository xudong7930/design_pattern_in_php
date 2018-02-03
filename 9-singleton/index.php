<?php
// session, database, configuration
// object only create once!!!
class Singleton
{
	private static $instance = null;
	private $connection;

	private function __construct()
	{
		// The constructor is private
  		// to prevent initiation with outer code.
		// The expensive process (e.g.,db connection) goes here.
		$this->connection = new PDO;
	}

	public static function getInstance()
	{
		if (null == self::$instance) {
			self::$instance = new static;
		}

	    return self::$instance;
	}
	
	public function connection()
	{
	    return $this->connection;
	}
	
}

$instance = Singleton::getInstance();
$instance2 = Singleton::getInstance();