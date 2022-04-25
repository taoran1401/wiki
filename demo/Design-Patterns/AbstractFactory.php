<?php

/**
 * 抽象工厂模式是围绕一个超级工厂创建其他工厂。该超级工厂又称为其他工厂的工厂。这种类型的设计模式属于创建型模式，它提供了一种创建对象的最佳方式。
 * 抽象工厂模式提供一个创建一系统相关或相互依赖对象的接口，而无需指定它们具体的类
 *
    抽象工厂模式的优点:
        1、分离了具体的类
        2、使增加或替换产品族变得容易
        3、有利于产品的一致性
    抽象工厂模式的缺点:
        难以支持新种类的产品。这是因为AbstractFactory接口确定了可以被创建的产品集合。支持新各类的产品就需要扩展访工厂接口，从而导致AbstractFactory类及其所有子类的改变。
 */

//键盘颜色和连接方式
class KeyboardColor{};
class KeyboardConnection{};

//设置Razer品牌的键盘颜色和连接方式
class RazerColor extends KeyboardColor{};
class RazerConnection extends KeyboardConnection{};

//设置Rapoo品牌的键盘颜色和连接方式
class RapooColor extends KeyboardColor{};
class RapooConnection extends KeyboardConnection{};

//抽象工厂
interface AbstractFactory
{
    public function createColor();
    public function createConnection();
}

//Razer品牌的工厂
class RazerFactory implements AbstractFactory
{
    public function createColor()
    {
        return new RazerColor();
    }

    public function createConnection()
    {
        return new RazerConnection();
    }
}


//Rapoo品牌的工厂
class RapooFactory implements AbstractFactory
{
    public function createColor()
    {
        return new RapooColor();
    }

    public function createConnection()
    {
        return new RapooConnection();
    }
}

//创建Rezer工厂
$razer = new RazerFactory();
//创建不同对象
$razerColor = $razer->createColor();
$razerConnection = $razer->createConnection();

//创建Rapoo工厂
$rapoo = new RapooFactory();
//创建不同对象
$rapooColor = $rapoo->createColor();
$rapooConnection = $rapoo->createConnection();

var_dump($razerColor);          //object(RazerColor)#2 (0) {}
var_dump($razerConnection);     //object(RazerConnection)#3 (0) {}
var_dump($rapooColor);          //object(RapooColor)#5 (0) {}
var_dump($rapooConnection);     //object(RapooConnection)#6 (0) {}
