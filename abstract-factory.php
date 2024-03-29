<?php

// 定義形狀介面
interface Shape {
    public function draw();
}

// 定義顏色介面
interface Color {
    public function fill();
}

// 實現形狀介面的具體形狀類別
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

class Circle implements Shape {
    public function draw() {
        echo "Inside Circle::draw() method.";
    }
}

// 實現顏色介面的具體顏色類別
class Red implements Color {
    public function fill() {
        echo "Inside Red::fill() method.";
    }
}

class Green implements Color {
    public function fill() {
        echo "Inside Green::fill() method.";
    }
}

class Blue implements Color {
    public function fill() {
        echo "Inside Blue::fill() method.";
    }
}

// 定義抽象工廠介面
interface AbstractFactory {
    public function getShape($shapeType);
    public function getColor($colorType);
}

// 實現抽象工廠介面的具體工廠類別
class ShapeFactory implements AbstractFactory {
    public function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        if (strcasecmp($shapeType, "RECTANGLE") == 0) {
            return new Rectangle();
        } elseif (strcasecmp($shapeType, "SQUARE") == 0) {
            return new Square();
        } elseif (strcasecmp($shapeType, "CIRCLE") == 0) {
            return new Circle();
        }
        return null;
    }

    public function getColor($colorType) {
        return null;
    }
}

class ColorFactory implements AbstractFactory {
    public function getShape($shapeType) {
        return null;
    }

    public function getColor($colorType) {
        if ($colorType == null) {
            return null;
        }
        if (strcasecmp($colorType, "RED") == 0) {
            return new Red();
        } elseif (strcasecmp($colorType, "GREEN") == 0) {
            return new Green();
        } elseif (strcasecmp($colorType, "BLUE") == 0) {
            return new Blue();
        }
        return null;
    }
}

// 產生具體工廠
$shapeFactory = new ShapeFactory();
$colorFactory = new ColorFactory();

// 由形狀工廠取得形狀
$rectangle = $shapeFactory->getShape("RECTANGLE");
$rectangle->draw();

// 由顏色工廠取得顏色
$red = $colorFactory->getColor("RED")
