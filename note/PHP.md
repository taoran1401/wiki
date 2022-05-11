# php

## PHP导航

### 学习资源

[PHP官方文档](https://www.php.net/manual/zh/)

[PHP中文网](https://www.php.cn/)

[菜鸟教程](https://www.runoob.com/php/php-tutorial.html)

[w3cschool](https://www.w3cschool.cn/php/)

[Composer](https://www.phpcomposer.com/)

[书栈网](https://www.bookstack.cn/)

### 热门框架

[laravel](https://laravel.com/)

[thinkphp](https://www.thinkphp.cn/)

[swoole](https://www.swoole.com/)

[hyperf](https://hyperf.wiki/2.2/#/)

[swoft](https://www.swoft.org/)

[easeswoole](https://www.easyswoole.com/)

[workerman](https://www.workerman.net/)

[symfony](http://symfony.p2hp.com/)

[yaf](https://github.com/laruence/yaf)

### 社区论坛

[LearnKu](https://learnku.com/php)

[博客园](https://www.cnblogs.com/)

[segmentfault](https://segmentfault.com/)

### 知名博客

[风雪之隅](https://www.laruence.com/)

[黑夜路人](https://blog.csdn.net/heiyeshuwu/category_193911_1.html)

[韩天峰](http://rango.swoole.com/)

[斯人博客](https://blog.csdn.net/siren0203/article/list/)

### 资源

[PECL](http://pecl.php.net/)

[Packagist](https://packagist.org/)

[github](https://github.com/)

## Phar打包

> Phar 是在 PHP5 之后提供的一种类似于将代码打包的工具。本质上是想依照 Java 的 Jar 文件那种形式的代码包，不过本身由于 PHP 是不编译的，所以这个 Phar 实际上就是将代码原样的进行打包，不会进行编译。但是我们可以对打包的 Phar 包进行压缩操作。

执行`build.php`将`src`中的代码打包到`build`目录; 

目录结构：
```
- bin
  build.php   
- build
- src
  Worker.php
```

`build.php`代码：
```php
//设置路径
$src = "../src/";
$build = "../build/";
$filename = 'PharDemo.phar';

//创建phar对象
$phar = new Phar($build . $filename, FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, $filename);

//设置需要构建的文件目录归档
$phar->buildFromDirectory($src);

//压缩当前归档的目录中所有文件
$phar->compressFiles(\Phar::GZ);

//setStub: 创建stub文件，stub文件用来告诉Phar在被加载时干什么
//createDefaultStub: 创建默认stub
$phar->setStub($phar->createDefaultStub());
```

执行`build.php`
```
php build.php
```

执行后会看到`build`目录下多了个`.phar`文件

## 预定义接口

### ArrayAccess

> 提供像访问数组一样访问对象的能力的接口

`ArrayAccess`接口代码
```php
interface ArrayAccess {
    public function offsetExists($offset);
    public function offsetGet($offset);
    public function offsetSet($offset, $value);
    public function offsetUnset($offset);
}
```

定义个类实现`ArrayAccess`的方法：
```php
class Obj implements ArrayAccess
{
    public function offsetExists($offset)
    {
        var_dump('offsetExists');
    }

    public function offsetSet($offset, $value)
    {
        var_dump('offsetSet');
    }

    public function offsetGet($offset)
    {
        var_dump('offsetGet');
    }

    public function offsetUnset($offset)
    {
        var_dump('offsetUnset');
    }
}

$obj = new Obj;
$obj['name'] = 1;                   //当设置元素值时调用了：offsetSet
$obj['name'];                       //当获取元素时调用了：offsetGet
isset($obj['name']);                //当isset元素时调用了：offsetExists
unset($obj['name']);                //当unset元素时调用了：offsetUnset
```

## 迭代器和生成器

### 迭代器

> 迭代器是一种设计模式，提供一种方法顺序访问一个聚合对象中各个元素，而又不暴露该对象的内部显示

`Iterator`接口代码
```php
interface Iterator extends Traversable {

    public function current();

    public function next();

    public function key();

    public function valid();

    public function rewind();
}
```

> 当实现了`Iterator`的对象被遍历时，会自动调用这些方法； 调用的循序是：`rewind() -> valid() -> current() -> key() -> next()`

示例：
```php
class MyIterator implements Iterator
{
    private $position = 0;

    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

$myIterator = new MyIterator();
foreach ($myIterator as $key => $value) {
    var_dump($key, $value);
}
```

结果：
```
string(18) "MyIterator::rewind"
string(17) "MyIterator::valid"
string(19) "MyIterator::current"
string(15) "MyIterator::key"
int(0)
string(12) "firstelement"
string(16) "MyIterator::next"
string(17) "MyIterator::valid"
string(19) "MyIterator::current"
string(15) "MyIterator::key"
int(1)
string(13) "secondelement"
string(16) "MyIterator::next"
string(17) "MyIterator::valid"
string(19) "MyIterator::current"
string(15) "MyIterator::key"
int(2)
string(11) "lastelement"
string(16) "MyIterator::next"
string(17) "MyIterator::valid"
```

优点：
 - 支持多种遍历方式。比如有序列表，我们根据需要提供正序遍历、倒序遍历两种迭代器。
 - 简化了聚合类。由于引入了迭代器，原有的集合对象不需要自行遍历集合元素了
 - 增加新的聚合类和迭代器类很方便，两个维度上可各自独立变化
 - 为不同的集合结构提供一个统一的接口，从而支持同样的算法在不同的集合结构上操作。

缺点:
 - 迭代器模式将存储数据和遍历数据的职责分离增加新的集合对象时需要增加对应的迭代器类，类的个数成对增加，在一定程度上增加系统复杂度。

实际场景： 
 - 参考php的SPL迭代器
 - 以及参考需要处理大量数据时PDO和mysqli的内存变化

### 生成器

> 生成器是在 PHP 5.5 版本中添加的，它提供了一种简单的方法来遍历数据，而不需要在内存中构建数组
> 解决运行内存的瓶颈，当读取很大的文件(比如10G)无法一次加载或者不想让这些数据全部加载到内存中
> 注意： 生成器只能在函数中使用

1：举个例子, 不使用yield, 内存使用45m(这个结果根据csv内容而定)：
```php
$startMemory = memory_get_usage();

function readCsv()
{
    $file = fopen('./demo.csv', 'r');
    $data = [];
    while (feof($file) === false) {
        $data[] =  fgetcsv($file);
    }
    fclose($file);
    return $data;
}
$data = readCsv();
$endMemory = memory_get_usage();
$useMemory = round(($endMemory - $startMemory) / 1024 / 1024, 3) . 'M' . PHP_EOL;
var_dump($useMemory);
```

2：使用yield, 内存使用0.xM：
```php
$startMemory = memory_get_usage();

function readCsv()
{
    $file = fopen('./demo.csv', 'r');
    while (feof($file) === false) {
        yield fgetcsv($file);
    }
    fclose($file);
}
// yield是一个一个消耗
foreach (readCsv() as $key => $value) {
    var_dump($value);
}
$endMemory = memory_get_usage();
$useMemory = round(($endMemory - $startMemory) / 1024 / 1024, 3) . 'M' . PHP_EOL;
var_dump($useMemory);
```

## zval

### 什么是zval

> Zval是zend中另一个非常重要的数据结构，用来标识并实现PHP变量。包含了PHP中的变量值和类型的相关信息

### 

> https://blog.csdn.net/weixin_43885417/article/details/100990106
> https://www.php.cn/php-ask-453781.html