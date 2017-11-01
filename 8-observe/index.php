<?php
/**
 * 观察者模式 Observe design pattern.
 */

// publisher - 发布者
interface Subject {
    public function attach($observer);
    public function detach($observer);
    public function notify();
}

// subscriber - 订阅者
interface Observer {
    public function handle();
}

// 发布者
class Login implements Subject {

    protected $observers;

    // 附属事件
    public function attach($observers)
    {
        if (is_array($observers)) {
            return $this->attachObservers($observers);
        }

        $this->observers[] = $observers;

        return $this;
    }

    // 通知订阅者
    public function fire()
    {
        $this->notify();
    }

    protected function attachObservers($observers)
    {
        foreach ($observers as $observer) {
            if (! $observer instanceof Observer) {
                throw new Exception;
            }

            $this->attach($observer);
        }
    }


    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        // 遍历每个订阅者处理事件
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }
    
}


// 订阅者1
class EmailNotifer implements Observer {

    public function handle()
    {
        echo 'email notify some important things.'.PHP_EOL;
    }

}

// step1: 构建发布者
$login = new Login;

// step2: 附属订阅者
$login->attach([
    new EmailNotifer,
]);

// step3: 当发生了某事的时候通知订阅者处理事情
$login->fire();
