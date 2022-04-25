<?php

/**
 * 单例模式：保证一个类只有一个对象，并提供访问它的全局访问点
 *
 * Class Singleton
 */
class Singleton
{
    /** @var 实例 */
    private static $instance;

    /**
     * 私有构造方法，防止创建多个实例
     */
    private function __construct() {}

    /**
     * 私有克隆方法，防止克隆多个实例
     */
    private function __clone() {}

    /**
     * 获取实例
     *
     * @return Singleton|实例
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$singleton = Singleton::getInstance();
$singleton1 = Singleton::getInstance();
var_dump($singleton, $singleton1);

