函数：
递归，值传递饮用传递


可以给函数参数设置默认值，这样在不传参数的时候将使用这个默认值，由`...`语法实现

例子：
```php
function foo(...$args)
{
    foreach ($args as $val) {
        var_dump($val); 
    }
}
```