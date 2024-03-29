<?php
// 定義實現介面
interface DrawAPI {
    public function drawCircle($radius, $x, $y);
}

// 實現介面的具體類別
class RedCircle implements DrawAPI {
    public function drawCircle($radius, $x, $y) {
        echo "Drawing Circle[ color: red, radius: $radius, x: $x, y: $y ]\n";
    }
}

class GreenCircle implements DrawAPI {
    public function drawCircle($radius, $x, $y) {
        echo "Drawing Circle[ color: green, radius: $radius, x: $x, y: $y ]\n";
    }
}

// 定義抽象類別
abstract class Shape {
    protected $drawAPI;

    protected function __construct(DrawAPI $drawAPI) {
        $this->drawAPI = $drawAPI;
    }

    public abstract function draw();
}

// 實現抽象類別的具體類別
class Circle extends Shape {
    private $x, $y, $radius;

    public function __construct($x, $y, $radius, DrawAPI $drawAPI) {
        parent::__construct($drawAPI);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw() {
        $this->drawAPI->drawCircle($this->radius, $this->x, $this->y);
    }
}

// 使用示例
$redCircle = new Circle(100, 100, 10, new RedCircle());
$greenCircle = new Circle(100, 100, 10, new GreenCircle());

$redCircle->draw();
$greenCircle->draw();
