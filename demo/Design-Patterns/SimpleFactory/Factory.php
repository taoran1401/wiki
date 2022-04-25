<?php

/**
 * 简单的工厂模式：建立一个工厂来根据所需来创建对象，这种方式在多态性编程中是很重要的，允许动态替换类，修改配置等。
 *
 * Class Factory
 */
class Factory
{
    //根据参数获取指定的类
    public function getDB($db)
    {
        switch ($db) {
            case "mysql":
                return new MysqlDB();
                break;
            case "redis":
                return new RedisDB();
                break;
            case "memcache":
                return new MemcacheDB();
                break;
        }
    }
}

class MysqlDB {}
class RedisDB {}
class MemcacheDB {}

$dbFactory = new Factory();
var_dump($dbFactory->getDB('mysql'));   //object(MysqlDB)#2 (0) { }
var_dump($dbFactory->getDB('redis'));   //object(RedisDB)#2 (0) { }
var_dump($dbFactory->getDB('memcache'));//object(MemcacheDB)#2 (0) { }