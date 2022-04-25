# PHP基础入门

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
    printf("你好: %s", "world");     //输出普通的字符串，也格式化输出
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
## 常量

> 常量值被定义后，在脚本的其他任何地方都不能被改变。

> 常量是全局的，可在整个运行的脚本的任何地方使用

### 定义常量

> 常量一般用全部大写来表示

- define(): 一个函数，可通过第三个参数指定是否区分大小写，`true`表示不区分大小写,不能在类中使用

```php
define("PI", 3.14);
var_dump(PI);
```

- const: 一个语言结构，简单易读，可在类中使用，用于类成员常量定义，定义后无法修改

```php
const PI = 3.14;
var_dump(PI);
```

> 注意： const是在编译时定义，因此必须处于最顶端的作用区域，不能在函数，循环及if条件中使用；而define是函数，也就是能调用函数的地方都可以使用

### 检查常量是否存在

- defined(): 检查常量是否存在, 返回`true`或`false`

```php
const PI = 3.14;
echo defined("PI");
```

## 变量

> 变量是用于存储数据的容器, 程序中使用的数值是可以变化的量，与常量（一旦被定义，就无法改变）相反。

变量根据作用域不同可分为一下几种：
- 局部变量(local)
- 全局变量(global)
- 静态变量(static)
- 参数变量(parameter): 参数是通过调用代码将值传递给函数的局部变量

### 定义变量
PHP 变量规则：
- 变量以 $ 符号开始，后面跟着变量的名称
- 变量名必须以字母或者下划线字符开始
- 变量名只能包含字母、数字以及下划线（A-z、0-9 和 _ ）
- 变量名不能包含空格
- 变量名是区分大小写的（$y 和 $Y 是两个不同的变量）

```php
//普通定义
$val = 'val';
echo $val;  //输出: val

//可变变量
$$val = 'hello world!';
echo $val; //输出： hello world!
```

### 局部变量和全局变量

- 局部变量(local): 函数内部声明的变量是局部变量，仅能在函数内部访问
- 全局变量(global): 函数外部定义的变量，拥有全局作用域

```php
//全局变量
$hello = 'hello ';

function foo()
{
    //全局变量需要用global关键字
    global $hello;
    //局部变量
    $world = 'world';
    echo $hello . $world;
}

//执行函数
foo();
```

### 静态变量

- 静态变量(static): 当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除时可使用`static`关键字

```php
function foo()
{
    //静态变量
    static $x = 0;
    //输出当前$x的值
    echo $x;
    //自增1
    $x++;
    //换行符
    echo PHP_EOL;
}

foo();  // 0
foo();  // 1
foo();  // 2
```

可以看到用`static`定义后每次执行`foo()`后`$x`的值没有被删除


### 参数变量

- 参数变量(parameter): 参数是通过调用代码将值传递给函数的局部变量

```php
function foo($str)
{
    echo $str;
}

foo('hello world;');    // hello world; 
```

```php
const STATUS_SUCCESS = 1;
```

```php
$name = "zhangsan";
echo $name;     // zhangsan

$name = "lisi"; 
echo $name;     // lisi
```

## 数据类型

### String（字符串）
> 一个字符串是一串字符的序列

```php
$str = "这是一个字符串";
echo $str;
```

### Integer（整型）
> 整数是一个没有小数的数字

```php
$int = 123;     //整数
var_dump($int);
$int = -123;    //负数
var_dump($int);
$int = 0x7B;    //16进制
var_dump($int);
```

### Float（浮点型）
> 浮点数是带小数部分的数字，或是指数形式

```php
$float = 10.123;    //小数
var_dump($float);
$float = 1.1e5;     //指数形式
var_dump($float);
```

### Boolean（布尔型）
> 布尔型可以是 TRUE 或 FALSE, 通常用于条件判断

```php
$flag = true;
$flag = false;
```

### Array（数组）
> 数组可以在一个变量中存储多个值

```php
$arr = ['张三', '男', '30'];
var_dump($arr);
```

### Object（对象）
> 对象数据类型也可以用于存储数据

通过`class`声明类对象，然后实例化该类获得对象数据，对象更多内容：[面向对象](#面向对象)
```php
// 创建对象
class Goods
{
    public $name;

    public function __construct() {}

    public function get() {}

    public function set() {}
}
//实例化
$obj = new Goods();
var_dump($obj);
```

### NULL（空值）
> NULL 值表示变量没有值。NULL 是数据类型为 NULL 的值

用`NULL`清空变量数据
```php
$str = '字符串';
$str = null;
var_dump($str); //NULL
```

### Resource（资源类型）
> 一种特殊变量，保存了到外部资源的一个引用; 常见资源数据类型有打开文件、数据库连接、图形画布区域等

```php
$ch = curl_init();
var_dump($ch);  // resource(4) of type (curl)
```

## 运算符

PHP 中的运算符分为：

### 算术运算符

| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| -x | 取反 | x 取反 |
| x + y | 加 | x 和 y 的和 |
| x - y | 减 | x 和 y 的差 |
| x * y | 乘 | 	x 和 y 的积 |
| x / y | 除 | x 和 y 的商 |
| x % y | 模（除法的余数） | x 除以 y 的余数 |
| x ** y | 求幂 | 	x 的 y 次方 |

例子：
```php
$x = 3;
$y = 10;

var_dump($x + $y);    //int(13)
var_dump($x - $y);    //int(-7)
var_dump($x * $y);    //int(30)
var_dump($x / $y);    //float(0.3)
var_dump($x % $y);    //int(3)
var_dump($x ** $y);   //int(59049)
```

### 赋值运算符

| 运算符 | 等同于 | 描述 |
| ---- | ---- | ---- |
| x = y | x = y | 左操作数被设置为右侧表达式的值 |
| x += y | x = x + y | 加 |
| x -= y | x = x - y | 减 |
| x *= y | x = x * y | 乘 |
| x /= y | x = x / y | 除 |
| x %= y | x = x % y | 模（除法的余数） |
| x .= y | x = x . y | 连接两个字符串 |

### 位运算符
> 位运算符允许对整型数中指定的位进行求值和操作

| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| x & y | And（按位与） | 将把 x 和 y 中都为 1 的位设为 1 |
| x \| y | 	Or（按位或） | 将把 x 和 y 中任何一个为 1 的位设为 1 |
| x ^ y | 	Xor（按位异或） | 将把 x 和 y 中一个为 1 另一个为 0 的位设为 1 |
| ~x | Not（按位取反） | 将 x 中为 0 的位设为 1，反之亦然 |
| x << y | 	Shift left（左移） | 将 x 中的位向左移动 y 次（每一次移动都表示“乘以 2”） |
| x >> y | Shift right（右移） | 将 x 中的位向右移动 y 次（每一次移动都表示“除以 2”） |

### 递增/递减运算符、比较运算符

| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| ++x | 预递增 | x 加 1，然后返回 x |
| x++ | 后递增 | 返回 x，然后 x 加 1 |
| --x | 预递减 | x 减 1，然后返回 x |
| x-- | 后递减 | 返回 x，然后 x 减 1 |

```php
$x=1;
echo ++$x; // 输出: 2

$y=1;
echo $y++; // 输出: 1

$z=1;
echo --$z; // 输出: 0

$i=1;
echo $i--; // 输出: 1
```

### 比较运算符
| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| x == y | 等于 | 如果 x 等于 y，则返回 true|
| x === y | 恒等于 | 如果 x 等于 y，且它们类型相同，则返回 true|
| x != y | 不等于 | 如果 x 不等于 y，则返回 true |
| x <> y | 不等于 | 如果 x 不等于 y，则返回 true |
| x !== y | 不恒等于 | 如果 x 不等于 y，或它们类型不相同，则返回 true |
| x > y | 大于 | 如果 x 大于 y，则返回 true |
| x < y | 小于 | 如果 x 小于 y，则返回 true |
| x >= y | 大于等于 | 如果 x 大于或者等于 y，则返回 true |
| x <= y | 小于等于 | 如果 x 小于或者等于 y，则返回 true |

### 逻辑运算符

| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| x and y | And（逻辑与） | 如果 x 和 y 都为 true，则返回 true |
| x or y | Or（逻辑或） | 如果 x 和 y 至少有一个为 true，则返回 true |
| x xor y | Xor（逻辑异或） | 如果 x 和 y 有且仅有一个为 true，则返回 true |
| x && y | And（逻辑与） | 如果 x 和 y 都为 true，则返回 true |
| x \|\| y | Or（逻辑或） | 如果 x 和 y 至少有一个为 true，则返回 true |
| !x | Not（逻辑非） | 如果 x 不为 true，则返回 true |

### 数组运算符 

| 运算符 | 名称 | 描述 |
| ---- | ---- | ---- |
| x + y | 集合 | x 和 y 的集合 |
| x == y | 相等 | 如果 x 和 y 具有相同的键/值对，则返回 true |
| x === y | 恒等 | 如果 x 和 y 具有相同的键/值对，且顺序相同类型相同，则返回 true |
| x != y | 不相等 | 如果 x 不等于 y，则返回 true |
| x <> y | 不相等 | 如果 x 不等于 y，则返回 true |
| x !== y | 不恒等 | 如果 x 不等于 y，则返回 true |

### 三元运算符等

> 语法格式： (expr1) ? (expr2) : (expr3) 
> 表达式 (expr1) ? (expr2) : (expr3) 在 expr1 求值为 true 时的值为 expr2，在 expr1 求值为 false 时的值为 expr3
```php
$age = 18;
// 如果age >= 18时flag位成年，否则未成年
$flag = $age >= 18 ? "成年" : '未成年';
```
### NULL 合并运算符
> 语法格式： (expr1) ?? (expr2)
> 表达式 (expr1) ?? (expr2) 等同于 expr2，否则为 expr1

```php
//如果没有设置age时值为18
$flag = $age ?? 18;
```

### 错误控制运算符

> 将`@`放置在一个 PHP 表达式之前，该表达式可能产生的任何错误诊断都被抑制

```
$arr = [];
@unlink($arr[0]);   // 添加`@`后错误信息将被抑制
```

### 执行运算符

> 将反引号中的内容作为 shell 命令来执行，并将其输出信息返回; 效果与函数 shell_exec() 相同

```php
$cmd = `ls -lh`;
echo $cmd;
```

结果：
```
total 0
-rwxrwxrwx    1 root     root          45 Mar 27 08:13 base.php
```

注意： 关闭了 shell_exec() 时反引号运算符是无效的。

## 流程控制

### if

> 按照条件执行代码片段

语法：
```
if (条件) {
    // 符合条件执行代码块
} elseif (条件) {
    // 不符合if条件，符合当前条件时执行代码块
    // elseif 可以有很多个
} else {
    // 没有符合条件时执行代码块
}
```

例子：
```php
$age = 18;

if ($age >= 50) {
    echo '老年';
} elseif ($age >= 18 && $age < 50) {
    echo '青年';
} else {
    echo '未成年';
}
```

### switch
> 类似`if语句`，用于根据多个不同条件执行不同动作，代码执行后，使用 break 来阻止代码跳入下一个 case 中继续执行

语法：
```
switch(变量或表达式)
{
    case 值1:
        // 符合条件代码块
        break;
    case 值2:
        // 符合条件代码块
        break;
    default:
        // 不符合条件代码块
        break;
}
```

例子：
```php
$action = 1;
switch ($action) {
    case 1:
        echo '下单';
        break;
    case 2:
        echo '退货';
        break;
    default:
        echo "操作异常";
        break;
}
```



### for

> 用于预先知道脚本需要运行的次数的情况

语法：
```
for (初始值; 条件; 增量) {
    // 代码块
}
```

例子：
```php
// 循环5次
for ($i=1; $i<=5; $i++) {
    var_dump($i);
}
```

结果：
```
int(1)
int(2)
int(3)
int(4)
int(5)
```

### foreach

> 遍历数组的简单方式

语法：
```
foreach (数组 as 元素索引 => 元素变量) {
    //代码块
}
```

例子：
```php
$colorful = ['red', 'pink', 'gray'];
foreach ($colorful as $key => $val) {
    printf("索引: %d; 值: %s;" . PHP_EOL, $key, $val);
}
```

结果：
```
索引: 0; 值: red;
索引: 1; 值: pink;
索引: 2; 值: gray;
```
### while

> 循环将重复执行代码块，直到指定的条件不成立

语法：
```
while (条件) {
    // 代码块
}
```

例子：
```
$i = 0;
while ($i < 5) {
    var_dump($i);
    $i++;
}
```
结果：
```
int(0)
int(1)
int(2)
int(3)
int(4)
```
### do...while
> 会至少执行一次代码，然后检查条件，只要条件成立，就会重复进行循环

语法：
```
do {
    // 代码块; 限执行代码块再判断条件
} while (条件);
```

例子：
```
$i = 6;
do {
    var_dump($i);
    $i++;
} while ($i < 5);
```

可以看到不满足条件也执行了一次

结果： 
```
int(6)
```
### break
> break 结束执行当前的 for、foreach、while、do-while、switch 结构, 可以接受一个数字的可选参数，决定跳出几重循环。 默认值是 1，仅仅跳出最近一层嵌套结构

示例见[switch](#switch)

### continue
> 循环结构用用来跳过本次循环中剩余的代码并在条件求值为真时开始执行下一次循环,  接受一个可选的数字参数来决定跳过几重循环到循环结尾

示例： 跳出索引为 1 的元素
```php
$colorful = ['red', 'pink', 'gray'];
foreach ($colorful as $key => $val) {
    if ($key == 1) {
        continue;
    }
    var_dump($val);
}
```

结果：
```
string(3) "red"
string(4) "gray"
```


### goto

> 可以用来跳转到程序中的另一位置; 目标位置只能位于同一个文件和作用域，也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。也无法跳入到任何循环或者 switch 结构中; 但是可以用 goto 代替多层的 break

语法：
```
goto 目标;

目标位置:
// 代码块
```

例子：
```
goto flag;
echo "one" . PHP_EOL;

flag:
echo "two" . PHP_EOL;
```

以上只会输出`two`

## 函数

函数分为内置函数和自定义函数

### 自定义函数

#### 创建函数

关于函数名：
- 函数名应该语义化，根据函数名就能知道这个函数的功能
- 函数名应以字母或下划线打头，后面跟字母，数字或下划线

示例：
```
function foo()
{
    //代码
}
```

#### 函数参数

##### 定义参数


- 不指定类型定义参数`$args_1, $args_2`
- 也可以指定类型定义参数`string $args_1, array $args_2`

例子：
```
function foo(string $args_1, array $args_2)
{
    //代码
}
```

##### 参数默认值

可以给函数参数设置默认值，这样在不传参数的时候将使用这个默认值

例子：
```
function foo($args_1, $args_2 = '默认值')
{
    //代码
}
```

##### 可变参数

在有的时候并不知道需要传递几个参数时可以使用可变参数，由`...`语法实现

例子：
```php
function foo(...$args)
{
    foreach ($args as $val) {
        var_dump($val); 
    }
}
```
##### 返回值

函数执行后和通过`return`将结果返回到外部接收

例子：
```php
function foo()
{
    $name = 'foo';
    return $name;
}
```

##### 值传递，引用传递

- 值传递：
- 引用传递：

函数是局部作用域，在函数内修改传入的变量，在外部并不会发生变化,这里可以使用引用传递来解决

例子:
```php
$name = 'zhangsan';
function resetName(&$name)
{
    $name = 'lisi';
}

var_dump($name);    //结果：lisi
```

##### 匿名函数

// TODO: 闭包

例子：
```php
$getName = function () {
    return 'zhangsan';
}

var_dump($getName());   //zhangsan
```

### 常用内置函数

> 见php文档: `https://www.php.net/download-docs.php`

## MySql操作

### mysqld

### PDO

### 执行sql

## 面向对象

### 作用 

### 特性

#### 封装

#### 继承

#### 多态

## 预定义接口

### ArrayAccess

> 提供像访问数组一样访问对象的能力的接口

一个例子就能明白：
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
$obj['name'] = 1;                   //调用了：offsetSet
$obj['name'];                       //调用了：offsetGet
isset($obj['name']);                //调用了：offsetExists
unset($obj['name']);                //调用了：offsetUnset
```




