<?php
class Redit
{
	public function redit($url, $title)
	{
	    var_dump("redit:".$url. ', title:'.$title);
	}
}

class GooglePlus
{
	public function share($url)
	{
	    var_dump("Share on Google Plus". $url);
	}
}

class Twitter
{
	public function tweet($status, $url)
	{
	    var_dump("tweet:".$status. "from:".$url);
	}
}

// 传统的方式:
$url = "http://myBlog.com/post-awsome";
$title = "My greatest post";
$status = "Read my greatest post ever.";
(new Twitter)->tweet($status, $url);
(new GooglePlus)->share($url);
(new Redit)->redit($url, $title);



// Facade门面模式
// 1. It holds references to the classes that it uses 
// 2 It has a method that calls all of the methods that we need
// 		A façade class enables us to call only one method instead of calling to many methods. By doing so, it simplifies the work with the system, and allows us to have a simpler and more convenient interface.
class Facade
{
	public $twitter;
	public $redit;
	public $google;

	public function __construct()
	{
	    $this->twitter = new Twitter;
	    $this->redit = new Redit;
	    $this->google = new GooglePlus;
	}
	
	public function share($url, $status, $title)
	{
	    $this->twitter->tweet($status, $url);
		$this->redit->share($url);
		$this->google->redit($url, $title);
	}
}

(new Facade)->share('http://myBlog.com/post-awsome', 'Read my greatest post ever.', 'My greatest post');