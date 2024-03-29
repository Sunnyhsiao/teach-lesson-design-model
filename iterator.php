<?php

// 定義迭代器介面
interface IteratorInterface {
    public function hasNext();
    public function next();
}

// 實現迭代器的具體類別
class NameIterator implements IteratorInterface {
    private $names;
    private $index;

    public function __construct($names) {
        $this->names = $names;
        $this->index = 0;
    }

    public function hasNext() {
        return $this->index < count($this->names);
    }

    public function next() {
        if ($this->hasNext()) {
            return $this->names[$this->index++];
        }
        return null;
    }
}

// 定義聚合物件介面
interface ContainerInterface {
    public function getIterator();
}

// 實現聚合物件的具體類別
class NameRepository implements ContainerInterface {
    private $names;

    public function __construct() {
        $this->names = ["Robert", "John", "Julie", "Lora"];
    }

    public function getIterator() {
        return new NameIterator($this->names);
    }
}

// 使用示例
$nameRepository = new NameRepository();
for ($iterator = $nameRepository->getIterator(); $iterator->hasNext();) {
    echo "Name: " . $iterator->next() . "\n";
}
