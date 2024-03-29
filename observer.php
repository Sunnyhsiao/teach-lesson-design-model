<?php

// 定義主題介面
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// 實現主題的具體類別
class ConcreteSubject implements Subject {
    private $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

// 定義觀察者介面
interface Observer {
    public function update();
}

// 實現觀察者的具體類別
class ConcreteObserver implements Observer {
    public function update() {
        echo "Observer is notified.\n";
    }
}

// 使用示例
$subject = new ConcreteSubject();
$observer1 = new ConcreteObserver();
$observer2 = new ConcreteObserver();

$subject->attach($observer1);
$subject->attach($observer2);

$subject->notify();

$subject->detach($observer2);

$subject->notify();
