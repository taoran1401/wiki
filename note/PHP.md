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