<?php

//錯誤範例：
class Shape {
    public $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function draw() {
        if ($this->type === 'circle') {
            // 畫圓形的方法
        } elseif ($this->type === 'square') {
            // 畫正方形的方法
        }
    }
}

//正確範例：
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        // 畫圓形的方法
    }
}

class Square implements Shape {
    public function draw() {
        // 畫正方形的方法
    }
}

