<?php
class SingleObject {
    // 建立靜態私有成員變數$instance，用於保存唯一的實例
    private static $instance;

    // 私有化建構函式，防止從外部實例化
    private function __construct() {}

    // 建立靜態方法getInstance，用於獲取唯一的實例
    public static function getInstance() {
        // 如果$instance未被實例化，則實例化一次，否則返回現有的實例
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // 示範方法
    public function showMessage() {
        echo "Hello, World!";
    }
}

// 從單例類別中取得唯一的實例
$object = SingleObject::getInstance();

// 調用示範方法
$object->showMessage();
