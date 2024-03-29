<?php

<?php
// 定義介面
interface Shape {
    public function draw();
}

// 實現介面的具體類別
class Rectangle implements Shape {
    public function draw() {
        echo "Shape: Rectangle\n";
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Shape: Circle\n";
    }
}

// 定義裝飾器類別
abstract class ShapeDecorator implements Shape {
    protected $decoratedShape;

    public function __construct(Shape $decoratedShape) {
        $this->decoratedShape = $decoratedShape;
    }

    public function draw() {
        $this->decoratedShape->draw();
    }
}

// 具體的裝飾器類別
class RedShapeDecorator extends ShapeDecorator {
    public function __construct(Shape $decoratedShape) {
        parent::__construct($decoratedShape);
    }

    public function draw() {
        $this->decoratedShape->draw();
        $this->setRedBorder($this->decoratedShape);
    }

    private function setRedBorder(Shape $decoratedShape) {
        echo "Border Color: Red\n";
    }
}

// 使用示例
$circle = new Circle();
$redCircle = new RedShapeDecorator(new Circle());
$redRectangle = new RedShapeDecorator(new Rectangle());

echo "Circle with normal border:\n";
$circle->draw();

echo "\nCircle of red border:\n";
$redCircle->draw();

echo "\nRectangle of red border:\n";
$redRectangle->draw();
