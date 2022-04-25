<?php
ini_set("display_errors", "On");//打开错误提示
// ini_set("error_reporting",E_ALL);//显示所有错误
error_reporting(E_ALL);//显示所有错误### 两种写法作用是一样的看个人喜好我一般用下面这种

class Obj implements ArrayAccess
{
    public function name()
    {
        var_dump('name');
    }

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

//$obj = new Obj;
//$obj['name'] = 1;                   //调用了：offsetSet
//$obj['name'];                       //调用了：offsetGet
//isset($obj['name']);                //调用了：offsetExists
//unset($obj['name']);                //调用了：offsetUnset


class Goods
{
    public function getPrice()
    {
        try {
            var_dump();
        } catch (Error $e) {
            var_dump($e->getMessage());
        }
    }
}

