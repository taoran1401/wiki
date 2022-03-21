# PHP

## 安装

凭自己擅长安装，下面推荐几种安装方式

### 集成环境

phpstudy: https://www.xp.cn/

mamp pro: https://www.mamp.info/en/mamp-pro/mac/

宝塔： https://www.bt.cn/new/index

### docker方式

请确认安装了docker和docker-compose

```
1: 拉取配置脚本
git clone https://github.com/taoran1401/docker-compose-php-server

2:进入php-server文件目录, 或者把php-server移动到其他位置
cd docker-compose-php-server/php-server/

3: 运行
docker-compose up -d
```

### 编译安装

php+ngxin编译安装：https://www.ranblogs.com/web/article?id=10

## 语法

### php标签

php代码包含在`<?php ?>`中：
```php
<?php 
    echo "hello world!";
?>
```
在只有php的代码文件中可以省略闭合标签：
```php
<?php 
    echo "hello world!";
```

### 第一个程序：输出内容
```php
<?php 
    echo "hello world";               //输出字符串
    var_dump(["hello", "world"]);     //输出变量，可以显示变量的结构化信息
    print_f("你好: %s", "world");     //输出普通的字符串，也格式化输出
    print_r(["hello", "world"]);      //用人类容易读取的格式来显示这个变量的信息
    die("error: 403");                //关闭程序并输出内容
```

### 注释
```php
<?php
// 这是行注释

/*
    这是块注释...
    这是块注释...
    这是块注释...
*/
```

## 常量和变量


## 数据类型



## 运算符

## 流程控制

## 循环

## 自定义函数

## 常用系统函数

### 字符串

### 数组

### 日期

### 文件

### json

### 包含

## 面向对象

## MySql操作

## Redis操作

## 异常处理

## 图片处理

## curl

## cookie和session

### cookie

### session

## Jwt

## 迭代器和生成器

## 常见安全问题

### xss攻击

### sql注入
d
## 框架

## web应用框架

[Laravel](https://learnku.com/docs/laravel/9.x)
[ThinkPHP](https://www.thinkphp.cn/)

### 协程框架

[swoole](https://wiki.swoole.com/#/)
[hyperf](https://hyperf.wiki/2.2/#/)

```
设计模式
```