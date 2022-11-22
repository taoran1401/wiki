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

## PHP 开启或关闭错误提示

两种方式修改

在文件中添加以下代码
```
ini_set("display_errors", "On"); 
error_reporting(E_ALL | E_STRICT);
```

通过php.ini实现
```
# 开发错误提示
display_errors = On

# 修改错误级别
error_reporting = E_ALL
```

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

### 可参考

> https://blog.csdn.net/weixin_43885417/article/details/100990106
> https://www.php.cn/php-ask-453781.html

## golang开发php扩展

环境：
```
ubuntu 20.04
php 7.4.33
golang 1.18
```

> mac上编译可能会有问题, 我换到linux才成功

### ext_skel脚本

PHP 扩展由几个文件组成，这些文件对所有扩展来说都是通用的。不同扩展之间，这些文件的很多细节是相似的，只是要费力去复制每个文件的内容。幸运的是，有脚本可以做所有的初始化工作，名为 `ext_skel`，自 PHP 4.0 起与其一起分发。

不带参数运行 `ext_skel` 在 PHP 7.4 中会产生以下输出：


> 该脚本存放目录：`php源码包/etc/ext_skel.php`

```
php ext_skel.php --ext <name> [--experimental] [--author <name>]
                   [--dir <path>] [--std] [--onlyunix]
                   [--onlywindows] [--help]

  --ext <name>          The name of the extension defined as <name>
  --experimental        Passed if this extension is experimental, this creates
                        the EXPERIMENTAL file in the root of the extension
  --author <name>       Your name, this is used if --std is passed and for the
                        CREDITS file
  --dir <path>          Path to the directory for where extension should be
                        created. Defaults to the directory of where this script
                        lives
  --std                 If passed, the standard header used in extensions that
                        is included in the core, will be used
  --onlyunix            Only generate configure scripts for Unix
  --onlywindows         Only generate configure scripts for Windows
  --help                This help
```

参数说明如上，主要用`--ext`来定义扩展名称，`--onlyunix`和`--onlywindows`设置为什么环境生成配置脚本

### 生成config.m4

进入php源码包的`ext`目录,执行命令：
```
php ./ext_skel.php --ext phpextgo
```

返回结果：
```
Copying config scripts... done
Copying sources... done
Copying tests... done

Success. The extension is now ready to be compiled. To do so, use the
following steps:

cd /path/to/php-src/phpextgo
phpize
./configure
make

Don't forget to run tests once the compilation is done:
make test

Thank you for using PHP!
```

执行完成后可以看到php源码包目录下的`ext`下生成刚才指定名字目录`phpextgo`

### 编写golang代码

进入通过`ext_skel.php`生成的目录(`{php源码目录}/ext/phpextgo`)中编写`golang`代码

#### main.go
`main.go`格式如下：
```go
package main
/*
    php扩展.c文件内容
*/
import "C"

func main() {}
```

`main.go`示例代码：
```go
package main

//#cgo CFLAGS: -g -I /disk2/soft/php-7.4.33 -I /disk2/soft/php-7.4.33/main -I /disk2/soft/php-7.4.33/TSRM -I /disk2/soft/php-7.4.33/Zend  -I /disk2/soft/php-7.4.33/ext -I /disk2/soft/php-7.4.33/ext/date/lib -DHAVE_CONFIG_H
//#cgo LDFLAGS: -Wl,--export-dynamic -Wl,--unresolved-symbols=ignore-all
/*
#ifdef HAVE_CONFIG_H
# include "config.h"
#endif

#include "php.h"
#include "ext/standard/info.h"
#include "php_phpextgo.h"

#ifndef ZEND_PARSE_PARAMETERS_NONE
#define ZEND_PARSE_PARAMETERS_NONE() \
ZEND_PARSE_PARAMETERS_START(0, 0) \
ZEND_PARSE_PARAMETERS_END()
#endif

PHP_FUNCTION(phpextgo_test1)
{
ZEND_PARSE_PARAMETERS_NONE();

php_printf("The extension %s is loaded and working!\r\n", "phpextgo");
}

PHP_FUNCTION(phpextgo_test2)
{
char *var = "World";
size_t var_len = sizeof("World") - 1;
zend_string *retval;

ZEND_PARSE_PARAMETERS_START(0, 1)
Z_PARAM_OPTIONAL
Z_PARAM_STRING(var, var_len)
ZEND_PARSE_PARAMETERS_END();

retval = strpprintf(0, "Hello %s", var);

RETURN_STR(retval);
}

PHP_RINIT_FUNCTION(phpextgo)
{
#if defined(ZTS) && defined(COMPILE_DL_PHPEXTGO)
ZEND_TSRMLS_CACHE_UPDATE();
#endif

return SUCCESS;
}

PHP_MINFO_FUNCTION(phpextgo)
{
php_info_print_table_start();
php_info_print_table_header(2, "phpextgo support", "enabled");
php_info_print_table_end();
}

ZEND_BEGIN_ARG_INFO(arginfo_phpextgo_test1, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_INFO(arginfo_phpextgo_test2, 0)
ZEND_ARG_INFO(0, str)
ZEND_END_ARG_INFO()

static const zend_function_entry phpextgo_functions[] = {
PHP_FE(phpextgo_test1,		arginfo_phpextgo_test1)
PHP_FE(phpextgo_test2,		arginfo_phpextgo_test2)
PHP_FE_END
};

zend_module_entry phpextgo_module_entry = {
STANDARD_MODULE_HEADER,
"phpextgo",
phpextgo_functions,
NULL,
NULL,
PHP_RINIT(phpextgo),
NULL,
PHP_MINFO(phpextgo),
PHP_PHPEXTGO_VERSION,
STANDARD_MODULE_PROPERTIES
};


#ifdef COMPILE_DL_PHPEXTGO
# ifdef ZTS
ZEND_TSRMLS_CACHE_DEFINE()
# endif
ZEND_GET_MODULE(phpextgo)
#endif
*/
import "C"

func main() {}
```

- CFLAGS -g -I说明：-g是支持gdb调试，-I是导入头文件路径,主要是防止编译时找不到文件，比如上面`include "php.h"`，因为`php.h`在`main`目录下，如果没有设置路径就会在当前路径下面找`php.h`，那就会报错; 上面示例的路径`/disk2/soft/php-7.4.33`需要根据自己的路径替换

#### function.go

通过`golang`语法写`c`语言接口函数，通过`export`关键字导出为`c`函数

`function.go`示例代码：
```go
package main

import "C"

//export phpextPrint
func phpextPrint() int {
	return 100
}
```

示例很简单，打印数字`100`

### 编译安装

进入`{php源码目录}/ext/phpextgo`下,然后就和安装php的扩展流程相同

- 执行`{php安装目录}/bin/phpize`, 这个脚本可以检测php环境并且在特定目录生成相应的`configure`文件

- 通过生成出来的`configure`来进行编译配置, 操作如下：

```
./configure --with-php-config=/usr/local/php/bin/php-config
```

- 生成动态库连接`.so`文件，并移动到扩展安装目录(扩展安装目录示例：`/usr/local/php/lib/php/extensions/no-debug-non-zts-20190902`)
```
go build -gcflags "-l" -buildmode=c-shared -o phpextgo.so *.go
```

- 在`php.ini`添加配置

```
extension=phpextgo.so
```

然后通过`php -m`查看扩展是否安装

### 调用自定义的函数

现在用在php调用一下内置的测试函数

```php
php -r "echo phpextgo_test2();";  //输出：Hello World
```

内置的函数可以调用，但是现在还不能调用我们自定义的函数，现在我们来对`main.go`改造一下

`main.go`改造:

- 引入`phpextgo.h`文件，不引入会找不到`function.go`定义的函数
- 这里主要改造的模块是通过`PHP_FUNCTION(phpextgo_print)`来添加我们的函数调用,括号里面的字符串就是php可以调用的函数名字
- 并将函数注册进模块`static const zend_function_entry phpextgo_functions[]`
- 添加宏定义`ZEND_BEGIN_ARG_INFO`

```go
package main

//#cgo CFLAGS: -g -I /disk2/soft/php-7.4.33 -I /disk2/soft/php-7.4.33/main -I /disk2/soft/php-7.4.33/TSRM -I /disk2/soft/php-7.4.33/Zend  -I /disk2/soft/php-7.4.33/ext -I /disk2/soft/php-7.4.33/ext/date/lib -DHAVE_CONFIG_H
//#cgo LDFLAGS: -Wl,--export-dynamic -Wl,--unresolved-symbols=ignore-all
/*
#ifdef HAVE_CONFIG_H
# include "config.h"
#endif

#include "php.h"
#include "ext/standard/info.h"
#include "phpextgo.h"
#include "php_phpextgo.h"

#ifndef ZEND_PARSE_PARAMETERS_NONE
#define ZEND_PARSE_PARAMETERS_NONE() \
ZEND_PARSE_PARAMETERS_START(0, 0) \
ZEND_PARSE_PARAMETERS_END()
#endif

PHP_FUNCTION(phpextgo_print)
{
zend_long res;
res = phpextPrint();
RETURN_LONG(res);
}

PHP_FUNCTION(phpextgo_test1)
{
ZEND_PARSE_PARAMETERS_NONE();

php_printf("The extension %s is loaded and working!\r\n", "phpextgo");
}

PHP_FUNCTION(phpextgo_test2)
{
char *var = "World";
size_t var_len = sizeof("World") - 1;
zend_string *retval;

ZEND_PARSE_PARAMETERS_START(0, 1)
Z_PARAM_OPTIONAL
Z_PARAM_STRING(var, var_len)
ZEND_PARSE_PARAMETERS_END();

retval = strpprintf(0, "Hello %s", var);

RETURN_STR(retval);
}

PHP_RINIT_FUNCTION(phpextgo)
{
#if defined(ZTS) && defined(COMPILE_DL_PHPEXTGO)
ZEND_TSRMLS_CACHE_UPDATE();
#endif

return SUCCESS;
}

PHP_MINFO_FUNCTION(phpextgo)
{
php_info_print_table_start();
php_info_print_table_header(2, "phpextgo support", "enabled");
php_info_print_table_end();
}

ZEND_BEGIN_ARG_INFO(arginfo_phpextgo_test1, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_INFO(arginfo_phpextgo_test2, 0)
ZEND_ARG_INFO(0, str)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_INFO(arginfo_phpextgo_print, 0)
ZEND_END_ARG_INFO()

static const zend_function_entry phpextgo_functions[] = {
PHP_FE(phpextgo_test1,		arginfo_phpextgo_test1)
PHP_FE(phpextgo_test2,		arginfo_phpextgo_test2)
PHP_FE(phpextgo_print,		arginfo_phpextgo_print)
PHP_FE_END
};

zend_module_entry phpextgo_module_entry = {
STANDARD_MODULE_HEADER,
"phpextgo",
phpextgo_functions,
NULL,
NULL,
PHP_RINIT(phpextgo),
NULL,
PHP_MINFO(phpextgo),
PHP_PHPEXTGO_VERSION,
STANDARD_MODULE_PROPERTIES
};


#ifdef COMPILE_DL_PHPEXTGO
# ifdef ZTS
ZEND_TSRMLS_CACHE_DEFINE()
# endif
ZEND_GET_MODULE(phpextgo)
#endif
*/
import "C"

func main() {}
```

然后现在再重复编译流程，替换扩展文件(`phpextgo.so`)即可

测试一下：
```
php -r "echo phpextgo_print();" //输出： 100
```

> 注意： 如果更改了`function.go`里面的函数，那么需要用上面最初的`main.go`来编译出`phpextgo.h`文件，再修改成改造后的`main.go`重新编译


