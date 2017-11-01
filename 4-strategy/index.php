<?php
// strategy design pattern
// 
interface Logger {
    public function log($data);
}

class LogToFile implements Logger {
    public function log($data)
    {
        var_dump('log to a file');
    }
}

class LogToDatabase implements Logger {

    public function log($data)
    {
        var_dump("log to database");
    }
}

class LogToSass implements Logger {

    public function log($data)
    {
        var_dump('log to Sass');
    }
}

class App {

    public function __construct ()
    {
        
    }

    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

(new App)->log('basic log');
(new App)->log('some info', new LogToFile);
(new App)->log('some info', new LogToDatabase);
(new App)->log('some info', new LogToSass);
