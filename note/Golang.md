# Golang

## 类型转换

> 在必要以及可行的情况下，一个类型的值可以被转换成另一种类型的值。由于Go语言不存在隐式类型转换，因此所有的类型转换都必须显式的声明：

### 方法一

> 语法： type_name(expression)
> type_name: 类型
> expression: 表达式

实例：
```go
var a int8 = 10
var b int16 = 20
var c int

c = int(int16(a) + b)                       //不进行类型转换直接相加会报错
fmt.Printf("值：%v; 类型： %T\n", c, c)     //结果： 值：30; 类型： int
```

### 方法二（fmt.Sprintf()）

示例：
```go
//把以下转换成string类型
var i int = 10
var f float64 = 10.123
var c byte = 'a'

//int转换string用%d
stri := fmt.Sprintf("%d", i)
fmt.Printf("值：%v; 类型： %T\n", stri, stri) //值：10; 类型： string

//浮点型转换string用%f
strf := fmt.Sprintf("%f", f)
fmt.Printf("值：%v; 类型： %T\n", strf, strf) //值：10.123000; 类型： string

//byte转换string用%c
strc := fmt.Sprintf("%c", c)
fmt.Printf("值：%v; 类型： %T\n", strc, strc) //值：a; 类型： string
```

### 方法三（strconv）

> strconv包实现了基本数据类型和其字符串表示的相互转换

示例：
```go
// 方法：FormatInt
// 参数一：要转换的值
// 参数二：传值int类型的进制
stri := strconv.FormatInt(int64(i), 10)
fmt.Printf("值：%v; 类型： %T\n", stri, stri) //值：10; 类型： string

// 方法：FormatFloat
// 参数一：要转换的值
// 参数二：格式化类型
// 		'b' (-ddddp±ddd, 一个二进制指数),
// 		'e' (-d.dddde±dd, 一个十进制指数),
// 		'E' (-d.ddddE±dd, 一个十进制指数),
// 		'f' (-ddd.dddd, 非指数),
// 		'g' (指数很大时用‘e’，否则为'f'),
// 		'G' (指数很大时用‘E’，否则为'f'),
// 		'x' (-0xd.ddddp±ddd, 一个十六进制分数和二进制指数), or
// 		'X' (-0Xd.ddddP±ddd, 一个十六进制分数和二进制指数).
// 参数三：保留的小数点，-1不对小数点格式化
// 参数四：格式化的类型
strf := strconv.FormatFloat(f, 'f', 2, 64)
fmt.Printf("值：%v; 类型： %T\n", strf, strf) //值：10.12; 类型： string
```

> 更多strconv用法：http://word.topgoer.com/pkg/strconv.htm

## 切片

> Go 数组的长度不可改变，在特定场景中这样的集合就不太适用，Go 中提供了一种灵活，功能强悍的内置类型切片("动态数组")，与数组相比切片的长度是不固定的，可以追加元素，在追加时可能使切片的容量增大。

### 声明切片

#### 直接声明

> 声明切片(指定长度时为数组，不指定长度即为切片)

示例：
```go
//声明空切片
var slice []int
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", slice, slice, len(slice)) //值：[]; 类型：[]int; 长度: 0

//声明一个带默认值的切片
var slice1 = []int{1, 2, 3}
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", slice1, slice1, len(slice1)) //值：[1 2 3]; 类型：[]int; 长度: 3

//声明带默认值并且指定索引的切片
var slice2 = []int{1: 1, 4: 1, 5: 1}
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", slice2, slice2, len(slice2)) //值：[0 1 0 0 1 1]; 类型：[]int; 长度: 6
```

#### 使用make构造切片

语法如下:

> make( []Type, size, cap )
> 其中 Type 是指切片的元素类型，size 指的是为这个类型分配多少个元素，cap 为预分配的元素数量，这个值设定后不影响 size，只是能提前分配空间，降低多次分配空间造成的性能问题

示例：
```go
a := make([]int, 2)
b := make([]int, 2, 10)

fmt.Println(a, b)
fmt.Println(len(a), len(b))
```

> 使用 make() 函数生成的切片一定发生了内存分配操作，但给定开始与结束位置（包括切片复位）的切片只是将新的切片结构指向已经分配好的内存区域，设定开始与结束位置，不会发生内存分配操作。

#### 基于数组定义切片

示例：
```go
a := [5]int{1, 2, 3, 4, 5}
b := a[:]                                         //获取数组里面所有值
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", b, b, len(b)) //值：[1 2 3 4 5]; 类型：[]int; 长度: 5
c := a[1:4]                                       //获取数组中部分值
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", c, c, len(c)) //值：[2 3 4]; 类型：[]int; 长度: 3
```

### append()

#### 追加元素
```go
//声明切片
var sliceA []int
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", sliceA, sliceA, len(sliceA)) //值：[]; 类型：[]int; 长度: 0

//追加元素
sliceA = append(sliceA, 1, 2, 3)
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", sliceA, sliceA, len(sliceA)) //值：[1 2 3]; 类型：[]int; 长度: 3
```

#### 合并切片
示例：
```go
sliceA := []int{1, 2}
sliceB := []int{3, 4}
sliceA = append(sliceA, sliceB...)      //sliceB...(其中...为固定语法)
fmt.Printf("值：%v; 类型：%T; 长度: %v\n", sliceA, sliceA, len(sliceA)) //值：[1 2 3 4]; 类型：[]int; 长度: 4
```

#### 扩容策略

> 切片在扩容时，容量的扩展规律是按容量的 2 倍数进行扩充，例如 1、2、4、8、16……

实例：
```go
sliceD := []int{}
for i := 1; i <= 10; i++ {
    sliceD = append(sliceD, i)
    fmt.Printf("值：%v; 类型：%T; 长度: %v; 容量：%v\n", sliceD, sliceD, len(sliceD), cap(sliceD))
}
```

执行结果：
```
值：[1]; 类型：[]int; 长度: 1; 容量：1
值：[1 2]; 类型：[]int; 长度: 2; 容量：2
值：[1 2 3]; 类型：[]int; 长度: 3; 容量：4
值：[1 2 3 4]; 类型：[]int; 长度: 4; 容量：4
值：[1 2 3 4 5]; 类型：[]int; 长度: 5; 容量：8
值：[1 2 3 4 5 6]; 类型：[]int; 长度: 6; 容量：8
值：[1 2 3 4 5 6 7]; 类型：[]int; 长度: 7; 容量：8
值：[1 2 3 4 5 6 7 8]; 类型：[]int; 长度: 8; 容量：8
值：[1 2 3 4 5 6 7 8 9]; 类型：[]int; 长度: 9; 容量：16
值：[1 2 3 4 5 6 7 8 9 10]; 类型：[]int; 长度: 10; 容量：16
```

### copy()

> Go语言的内置函数 copy() 可以将一个数组切片复制到另一个数组切片中，如果加入的两个数组切片不一样大，就会按照其中较小的那个数组切片的元素个数进行复制。

为什么使用copy复制而不是直接赋值的原因，看下方示例：
```go
sliceA := []int{1, 2, 3, 4}
sliceB := sliceA
sliceB[0] = 5
fmt.Printf("值：%v; \n", sliceA) //值：[5 2 3 4];
fmt.Printf("值：%v; \n", sliceB) //值：[5 2 3 4];
```

切片是引用传递，当赋值后的值被修改后源数据也会变化，上例子中sliceA赋值给了sliceB，修改sliceB[0]后可以看到sliceA也发生了变化

现在来试试copy() :
```go
sliceA := []int{1, 2, 3, 4}
//创建切片
sliceB := make([]int, 4, 4)
//copy
copy(sliceB, sliceA)
//修改0索引的值
sliceB[0] = 11
fmt.Printf("值：%v; \n", sliceA) //值：[1 2 3 4];
fmt.Printf("值：%v; \n", sliceB) //值：[11 2 3 4];
```

可以看到修改sliceB[0]后可以看到sliceA没有发生变化

### 切片中删除元素

> Go语言并没有对删除切片元素提供专用的语法或者接口，需要使用切片本身的特性来删除元素，根据要删除元素的位置有三种情况，分别是从开头位置删除、从中间位置删除和从尾部删除，其中删除切片尾部的元素速度最快。

例子：
```go
//删除值为4的元素（通过获取4前面和4后面的元素合并实现）
sliceA := []int{1, 2, 3, 4, 5, 6, 7, 8}
sliceB := append(sliceA[:3], sliceA[4:]...)
fmt.Printf("值：%v; \n", sliceB) //值：[1 2 3 5 6 7 8];
```

## Map

> Go语言中 map 是一种特殊的数据结构，一种元素对（pair）的无序集合，pair 对应一个 key（索引）和一个 value（值），所以这个结构也称为关联数组或字典，这是一种能够快速寻找值的理想结构，给定 key，就可以迅速找到对应的 value; map 是引用类型。

```
var mapname map[keytype]valuetype
```
- mapname 为 map 的变量名。
- keytype 为键类型。
- valuetype 是键对应的值类型。


### 创建map类型数据

#### 直接声明

```go
//goods := map[string]string{
var goods = map[string]string{
    "title": "蓝牙耳机",
    "price": "500",
    "color": "red",
}
fmt.Printf("值：%v; \n", goods)          //获取全部： 值：map[color:red price:500 title:蓝牙耳机];
fmt.Printf("值：%v; \n", goods["title"]) //获取指定元素：值：蓝牙耳机;
```

#### 通过make创建map类型数据
```go
var goods = make(map[string]string)
goods["title"] = "蓝牙耳机"
goods["price"] = "500"
goods["color"] = "red"
fmt.Printf("值：%v; \n", goods)          //获取全部： 值：map[color:red price:500 title:蓝牙耳机];
fmt.Printf("值：%v; \n", goods["title"]) //获取指定元素：值：蓝牙耳机;
```

#### 定义map类型的切片

```go
//定义map类型的切片
var goods = make([]map[string]string, 3)
if goods[0] == nil {
    goods[0] = map[string]string{
        "title": "蓝牙耳机",
        "price": "500",
        "color": "red",
    }
}

if goods[1] == nil {
    goods[1] = map[string]string{
        "title": "有线耳机",
        "price": "200",
        "color": "blue",
    }
}

fmt.Printf("%v \n", goods) //结果： [map[color:red price:500 title:蓝牙耳机] map[color:blue price:200 title:有线耳机] map[]]
```

#### map类型的值可以是切片

```go
var goods = make(map[string][]string)
goods["tags"] = []string{
    "小吃",
    "便宜",
    "靓丽",
}

fmt.Printf("%v \n", goods)         //结果：map[tags:[小吃 便宜 靓丽]]
fmt.Printf("%v \n", goods["tags"]) //结果：[小吃 便宜 靓丽]
```

### 操作Map

#### 
> 通过for range遍历
```go
var goods = map[string]string{
    "title": "蓝牙耳机",
    "price": "500",
    "color": "red",
}
for v, k := range goods {
    fmt.Printf("key：%v; value:%v \n", k, v)
}

//结果：
//key：500; value:price
//key：red; value:color
```

#### 判断元素是否存在

```go
var goods = map[string]string{
    "title": "蓝牙耳机",
    "price": "500",
    "color": "red",
}
_, ok := goods["desc"]
fmt.Printf("%v\n", ok) //false
```

当ok返回false时表示不存在

#### 删除元素

> delete(map, 键): 其中 map 为要删除的 map 实例，键为要删除的 map 中键值对的键

```go
var goods = map[string]string{
    "title": "蓝牙耳机",
    "price": "500",
    "color": "red",
}
delete(goods, "color")
fmt.Printf("%v \n", goods)  //结果：map[price:500 title:蓝牙耳机]
```

## 结构体

> Go 语言通过用自定义的方式形成新的类型，结构体是类型中带有成员的复合类型。Go 语言使用结构体和结构体成员来描述真实世界的实体和实体对应的各种属性
> 结构体属于值传递

> 结构体成员是由一系列的成员变量构成，这些成员变量也被称为“字段”。字段有以下特性：
- 字段拥有自己的类型和值。
- 字段名必须唯一。
- 字段的类型也可以是结构体，甚至是字段所在结构体的类型。

> 关于go的面向对象
- Go支持面向对象(OOP)，并不是纯粹的面向对象语言；
- Go没有类的概念，结构体(struct)相当于其它编程语言的类(class)；
- Go面向对象编程非常简洁，通过接口(interface)关联，耦合性低，也非常灵活；


### 定义结构体

使用type struct来定义
```go
//定义一个结构体
type Goods struct {
	Name  string
	Price int
	Spec  string
}
```

### 实例化结构体

> 注意以下方式实例出来的类型

#### 基本方式

```go
var goods Goods
goods.Name = "蓝牙耳机"
goods.Price = 500
goods.Spec = "红色"

fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：{蓝牙耳机 500 红色}； 类型：main.Goods;
```

或：
```go
var goods = Goods{
    Name:  "蓝牙耳机",
    Price: 500,
    Spec:  "红色",
}
fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：{蓝牙耳机 500 红色}； 类型：main.Goods;
```

#### 创建指针类型结构体

```go
var goods = new(Goods)
goods.Name = "蓝牙耳机"
goods.Price = 500
goods.Spec = "红色"
fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：&{蓝牙耳机 500 红色}； 类型：*main.Goods;
```

#### 取地址实例化

```go
var goods = &Goods{}
goods.Name = "蓝牙耳机"
goods.Price = 500
goods.Spec = "红色"
fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：&{蓝牙耳机 500 红色}； 类型：*main.Goods;
```

或：
```go
var goods = &Goods{
    Name:  "蓝牙耳机",
    Price: 500,
    Spec:  "红色",
}
fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：&{蓝牙耳机 500 红色}； 类型：*main.Goods;
```

### 结构体方法

> 结构体方法通过在函数名前面声明，如下：

```go
package main

import "fmt"

//定义一个结构体
type Goods struct {
	Name  string
	Price int
	Spec  string
}

//获取goods信息
//结构体方法
func (g Goods) GetGoodsInfo() {
	fmt.Printf("值：%v； 类型：%T;\n", g, g)
}

//修改goods信息
//结构体方法,这里声明指针类型,否则修改不会成功
func (g *Goods) SetGoodsInfo(name string, price int) {
	g.Name = name
	g.Price = price
}

func main() {
	var goods = Goods{
		Name:  "蓝牙耳机",
		Price: 500,
		Spec:  "白色",
	}
	//调用结构体方法
	goods.GetGoodsInfo() //值：{蓝牙耳机 500 白色}； 类型：main.Goods;
	//调用修改
	goods.SetGoodsInfo("有线耳机", 200)
	//查看修改结果
	goods.GetGoodsInfo() //值：{有线耳机 200 白色}； 类型：main.Goods;
}
```

> 注意：结构体方法首字母大写表示公有，小写表示私有

### 结构体嵌套（继承）

> 结构体的字段类型可以是：基本数据类型、切片、Map以及结构体

#### 嵌套

```go
//定义一个结构体
type Goods struct {
	Name string
	Num  int
	Sku  Sku //表示Goods结构体嵌套Sku结构体
}

type Sku struct {
	Spec  string
	Price int
}
```

给Goods结构体中的Sku结构体设置值
```go
var goods Goods
goods.Name = "蓝牙耳机"
goods.Num = 100
//给Sku结构体设置值
goods.Sku.Spec = "红色降噪"
goods.Sku.Price = 500
fmt.Printf("值：%v； 类型：%T;\n", goods, goods) //值：{蓝牙耳机 100 {红色降噪 500}}； 类型：main.Goods;
```

#### 继承

> 通过嵌套的方式实现继承， 如下

```go
package main

import "fmt"

//大类别商品：存放公共属性
type Goods struct {
	Name  string
	Price int
}

//商品下的手机类别: 存放特有属性，颜色重量等，将Goods结构体嵌套进来实现继承，相当于Phone也拥有了商品的属性
type Phone struct {
	Color  string
	Weight string
	Goods  //继承Goods
}

//获取goods信息
//Goods的结构体方法
func (g Goods) GetGoodsInfo() {
	fmt.Printf("值：%v； 类型：%T;\n", g, g)
}

//获取phon信息
//Phone的结构体方法
func (p Phone) GetPhoneInfo() {
	fmt.Printf("值：%v； 类型：%T;\n", p, p)
}

func main() {
	//初始化Phone
	phone := Phone{
		Color:  "red",
		Weight: "1kg",
		Goods: Goods{
			Name:  "iphone 18",
			Price: 10000,
		},
	}
	//调用继承的Goods结构方法
	phone.GetGoodsInfo() //值：{iphone 18 10000}； 类型：main.Goods;
	//调用自己的方法
	phone.GetPhoneInfo() //值：{red 1kg {iphone 18 10000}}； 类型：main.Phone;
}
```

可以看到实现了继承，实例出来的`phone`可以调用父类的方法


## Zap

### 简介

Zap是非常快的、结构化的，分日志级别的Go日志库

Zap提供了两种类型的日志记录器—Sugared Logger和Logger

在性能很好但不是很关键的上下文中，使用SugaredLogger。它比其他结构化日志记录包快4-10倍，并且支持结构化和printf风格的日志记录。

在每一微秒和每一次内存分配都很重要的上下文中，使用Logger。它甚至比SugaredLogger更快，内存分配次数也更少，但它只支持强类型的结构化日志记录。

### 使用

#### 安装

```
go get -u go.uber.org/zap
```

#### 打印日志

通过zap.NewProduction()、zap.NewDevelopment()、zap.NewExample()创建一个Logger

然后通过Debug()、Info()、Error()、Warn()来打印日志

> zap.NewProduction()
```go
logger, _ := zap.NewProduction()
logger.Info("info---")

//结果：{"level":"info","ts":1657854511.705913,"caller":"core/zap.go:9","msg":"info---"}
```

> zap.NewDevelopment()
```go
logger, _ := zap.NewDevelopment()
logger.Info("info---")

//结果：2022-07-15T11:09:17.586+0800    INFO    core/zap.go:10  info---
```

> zap.NewExample()
```go
logger := zap.NewExample()
logger.Info("info---")

// {"level":"info","msg":"info---"}
```

> 构造新的字段打印
```go
logger, _ := zap.NewProduction()
logger.Info("info---", zap.String("client", "app"), zap.String("loggerId", "1"))

//结果：{"level":"info","ts":1657856193.171507,"caller":"core/zap.go:16","msg":"info---","client":"app","loggerId":"1"}
```

> Zap Sync

TODO ~

### Sugared Logge

TODO ~


## viper

