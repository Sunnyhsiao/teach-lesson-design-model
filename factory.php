<?php

// 定義形狀接口
interface Shape {
    public function draw();
}

// 實現形狀接口的不同形狀類別
class Circle implements Shape {
    public function draw() {
        echo "Inside Circle::draw() method.";
    }
}

class Rectangle implements Shape {
    public function draw() {
        echo "Inside Rectangle::draw() method.";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Inside Square::draw() method.";
    }
}

// 定義工廠類別
class ShapeFactory {
    // 根據給定的形狀類型返回對應的形狀物件
    public function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        if (strcasecmp($shapeType, "CIRCLE") == 0) {
            return new Circle();
        } elseif (strcasecmp($shapeType, "RECTANGLE") == 0) {
            return new Rectangle();
        } elseif (strcasecmp($shapeType, "SQUARE") == 0) {
            return new Square();
        }
        return null;
    }
}

// 使用 ShapeFactory 創建不同形狀的物件並調用其方法
$shapeFactory = new ShapeFactory();

// 獲取 Circle 的物件並調用其方法
$circle = $shapeFactory->getShape("CIRCLE");
$circle->draw();

// 獲取 Rectangle 的物件並調用其方法
$rectangle = $shapeFactory->getShape("RECTANGLE");
$rectangle->draw();

// 獲取 Square 的物件並調用其方法
$square = $shapeFactory->getShape("SQUARE");
$square->draw();
