<?php
// 定義介面
interface Shape {
    public function draw();
}

// 實現介面的具體類別
class Circle implements Shape {
    public function draw() {
        echo "Shape: Circle\n";
    }
}

class Rectangle implements Shape {
    public function draw() {
        echo "Shape: Rectangle\n";
    }
}

// 定義橋接介面
interface Color {
    public function applyColor();
}

// 實現橋接介面的具體類別
class RedColor implements Color {
    public function applyColor() {
        echo " Red";
    }
}

class BlueColor implements Color {
    public function applyColor() {
        echo " Blue";
    }
}

// 將形狀和顏色進行橋接
abstract class ShapeWithColor implements Shape {
    protected $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    public function draw() {
        $this->color->applyColor();
    }
}

// 使用示例
$redCircle = new Circle();
$redCircle->draw(new RedColor());

$blueRectangle = new Rectangle();
$blueRectangle->draw(new BlueColor());
