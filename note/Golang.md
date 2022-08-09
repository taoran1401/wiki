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

## 接口

### 简介

> 在golang中接口(interface)是一种类型，一种抽象的类型。接口(interface)是一组函数method的集合，golang中的接口不能包含任何变量。

> golang中的接口也是一种数据类型，不需要显示实现。只需要一个变量含有接口类型中的所有方法，那么这个变量就实现了这个接口

### 定义和实现

定义格式如下：
```go
type 接口类型名 interface{
    方法名1( 参数列表1 ) 返回值列表1
    方法名2( 参数列表2 ) 返回值列表2
    …
}
```

示例：
```go
//定义商品接口
type GoodsInterface interface {
	GetPrice() int
	ShelfGoods(status int) bool
}
```

接口被实现的条件：
- 接口的方法与实现接口的类型方法格式一致
- 接口中所有方法均被实现

```go
package main

import "fmt"

//定义商品接口
type GoodsInterface interface {
	GetPrice() int
	ShelfGoods(status int) bool
}

//定义优惠券结构体
type Coupon struct {
	Price  int
	status int
}

//实现商品接口中的GetPrice方法
func (this *Coupon) GetPrice() int {
	return this.Price
}

//实现商品接口中的ShelfGoods方法
func (this *Coupon) ShelfGoods(status int) bool {
	this.status = status
	return true
}

func main() {
	coupon := &Coupon{
		Price:  100,
		status: 0,
	}
	//创建GoodsInterface类型的变量
	var goods GoodsInterface
	//表示优惠券实现了商品接口
	goods = coupon
	//调用GetPrice
	fmt.Println(goods.GetPrice())	//结果：100
}
```

### 空接口

> 空接口是接口类型的特殊形式，空接口没有任何方法，因此任何类型都无须实现空接口。从实现的角度看，任何值都满足这个接口的需求。因此空接口类型可以保存任何值，也可以从空接口中取出原值。

> 空接口赋值：空接口类型可以保存任何值

```go
//定义空接口
type A interface{}

func main() {
	var a A
	var str = "hello go"
	a = str
	fmt.Printf("类型：%T 值：%v\n", a, a) //类型：string 值：hello go

	var num = 10
	a = num
	fmt.Printf("类型：%T 值：%v\n", a, a) //类型：int 值：10
}
```

> 空接口作为函数参数： 表示这个函数可以接收任意参数

```go
//接收任意参数类型
func GetInfo(a interface{}) {
	fmt.Printf("类型：%T 值：%v\n", a, a)
}

func main() {
	GetInfo("hello go") //传入string类型参数
	GetInfo(10)         //传入int类型参数
	GetInfo(true)       //传入bool类型参数
	slice := []int{1, 2, 3}
	GetInfo(slice) //传入切片类型参数
}
```

结果：
```
类型：string 值：hello go
类型：int 值：10
类型：bool 值：true
类型：[]int 值：[1 2 3]
```

> map值为空接口（切片同理）

```go
func main() {
	var mapList = make(map[string]interface{})
	mapList["name"] = "蓝牙耳机"
	mapList["price"] = 1000
	mapList["status"] = false
	fmt.Printf("类型：%T 值：%v\n", mapList, mapList) 
	//结果： 类型：map[string]interface {} 值：map[name:蓝牙耳机 price:1000 status:false]
}
```

### 类型断言

> 类型断言（Type Assertion）是一个使用在接口值上的操作，用于检查接口类型变量所持有的值是否实现了期望的接口或者具体的类型。

语法：
```go
x.(T)
```
- x: 表示interface{}的变量
- T: 表示断言x可能的类型

示例：当获取空接口不知道什么类型的时候可以使用
```go
func main() {
	//定义一个空间赋值
	var a interface{}
	a = "hello go"
	//断言是否string类型，如果是ok返回true,v表示类型
	v, ok := a.(string)
	fmt.Printf("类型：%T 断言结果：%v\n", v, ok)	//类型：string 断言结果：true

}
```

> 结合`switch`使用

```go
func GetType(x interface{}) {
	switch x.(type) {
	case int:
		fmt.Println("断言结果：int")
	case string:
		fmt.Println("断言结果：string")
	case bool:
		fmt.Println("断言结果：bool")
	default:
		fmt.Println("断言结果：无")
	}
}

func main() {
	//定义一个空间赋值
	var x interface{}
	GetType(x)
	x = "hello go"
	GetType(x)
	x = 10
	GetType(x)
	x = false
	GetType(x)
}
```

结果：
```
断言结果：无
断言结果：string
断言结果：int
断言结果：bool
```

### 接口的嵌套组合

> 一个接口可以包含一个或多个其他的接口，这相当于直接将这些内嵌接口的方法列举在外层接口中一样。只要接口的所有方法被实现，则这个接口中的所有嵌套接口的方法均可以被调用。


```go
package main

import "fmt"

//定义接口A
type Ainterface interface {
	SetName(string)
}

//定义接口B
type Binterface interface {
	GetName() string
}

type AnimalInterface interface {
	//嵌套接口A和B
	Ainterface
	Binterface
}

type Dog struct {
	Name string
}
type Cat struct {
	Name string
}

func (this *Dog) GetName() string {
	return this.Name
}

func (this *Dog) SetName(name string) {
	this.Name = name
}

func (this *Cat) GetName() string {
	return this.Name
}

func (this *Cat) SetName(name string) {
	this.Name = name
}

func main() {
	var animaler AnimalInterface
	//dog实现接口
	animaler = &Dog{
		Name: "狗狗A",
	}
	fmt.Println(animaler.GetName())	//狗狗A
	//cat实现接口
	animaler = &Cat{
		Name: "猫猫A",
	}
	fmt.Println(animaler.GetName())	//猫猫A
}
```

### 获取切片或者结构体赋值给空接口后的值

> 如果把切片或者结构体直接赋值给空接口，那么是无法直接获取切片或结构体里面的值

> 要访问需要结合类型断言，示例如下：

```go
package main

import "fmt"

type Goods struct {
	Id    int
	Name  string
	Price int
}

func main() {
	//定义map,值为空接口类型
	var orderInfo = make(map[string]interface{})
	orderInfo["sn"] = "sn123456"
	orderInfo["num"] = 5
	orderInfo["goodsIds"] = []int{1, 2}

	//定义orderInfo["goodsIds"]的值为切片，然后访问切片中的值

	//不可以访问：异常： invalid operation: cannot index GoodsInfo["spec"] (map index expression of type interface{})
	//fmt.Println(orderInfo["goodsIds"][0])

	//正确的获取方式： 通过断言获取类型在读取
	ids, _ := orderInfo["goodsIds"].([]int)
	fmt.Println(ids[1]) //2

	//实例结构体，并将结构体加入到map
	var goods = &Goods{
		Id:    1,
		Name:  "蓝牙耳机",
		Price: 500,
	}
	orderInfo["goods"] = goods

	//不可以访问； 异常：orderInfo["goods"].Name undefined (type interface{} has no field or method Name)
	//fmt.Println(orderInfo["goods"].Name)

	//正确的获取方式： 通过断言获取类型在读取
	goodsNew, _ := orderInfo["goods"].(Goods)
	fmt.Println(goodsNew.Name) //蓝牙耳机
}
```

## channel

## goroutine

## go mod常用命令

### 什么是go mod

```
模块是相关Go包的集合。modules是源代码交换和版本控制的单元。
go命令直接支持使用modules，包括记录和解析对其他模块的依赖性。modules替换旧的基于GOPATH的方法来指定在给定构建中使用哪些源文件。
```
### init

> go mod init

生成 go.mod 文件，此命令会在当前目录中初始化和创建一个新的go.mod文件，手动创建go.mod文件再包含一些module声明也等同该命令，而go mod init命令便是帮我们简便操作，可以帮助我们自动创建。

### download

> go mod download

下载 go.mod 文件中指明的所有依赖，使用此命令来下载指定的模块，模块的格式可以根据主模块依赖的形式或者path@version形式指定。

### tidy

> go mod tidy

整理现有的依赖，使用此命令来下载指定的模块，并删除已经不用的模块

### graph

> go mod graph

查看现有的依赖结构，生成项目所有依赖的报告，但可读性太差，图形化更方便。

### edit

> go mod edit

编辑 go.mod 文件，之后通过 download 或 edit 进行下载

### vendor

> go mod vendor

导出项目所有的依赖到vendor目录，从mod中拷贝到项目的vendor目录下，IDE可以识别这样的目录。

### verify

> go mod verify

校验一个模块是否被篡改过，查询某个常见的模块出错是否已被篡改

### why

> go mod why

查看为什么需要依赖某模块，查询某个不常见的模块是否是哪个模块的引用

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

#### 日志打印到文件

要将日志写入到文件需要使用`zap.New()`来构造一个`logger`

> func New(core zapcore.Core, options ...Option) *Logger
- 参数： zapcore.Core用来构建配置（详细参数如下）
- 参数：...Option设置其他配置，比如 zap.AddCaller(): 输出文件名和行号

> func NewCore(enc Encoder, ws WriteSyncer, enab LevelEnabler) Core
- 参数 Encoder： 编码器，可自定义时间格式，是否显示行号，以及字段名字等等
- 参数 WriteSyncer：指定日志将写到哪里去。我们使用zapcore.AddSync()函数并且将打开的文件句柄传进去
- 参数 LevelEnabler： 日志等级

> 示例：
```go
func Zap(logFile string) *zap.SugaredLogger {
	//创建core,设置基本参数
	coreInfo := CoreInfo(logFile)   //会打印除debug的其他日志
	coreDebug := CoreDebug(logFile) //全量日志
	coreWarn := CoreWarn(logFile)   //会打印err和warn
	coreError := CoreError(logFile) //错误日志
	//合并core
	core := zapcore.NewTee(coreInfo, coreDebug, coreWarn, coreError)
	//zap.AddCaller(): 输出文件名和行号
	logger := zap.New(core, zap.AddCaller(), zap.WithCaller(true)).Sugar()
	return logger
}

func CoreDebug(logFile string) zapcore.Core {
	writerSyncer := zapcore.AddSync(logFile)
	return zapcore.NewCore(zapcore.NewJSONEncoder(CustomEncodeConfig()), writerSyncer, zapcore.DebugLevel)
}

func CoreError(logFile string) zapcore.Core {
	writerSyncer := zapcore.AddSync(logFile)
	return zapcore.NewCore(zapcore.NewJSONEncoder(CustomEncodeConfig()), writerSyncer, zapcore.ErrorLevel)
}

//自定义日志输出格式
func CustomEncodeConfig() zapcore.EncoderConfig {
	return zapcore.EncoderConfig{
		TimeKey:        "ts",
		LevelKey:       "level",
		NameKey:        "logger",
		CallerKey:      "caller",
		FunctionKey:    zapcore.OmitKey,
		MessageKey:     "msg",
		StacktraceKey:  "stacktrace",
		LineEnding:     zapcore.DefaultLineEnding,
		EncodeLevel:    zapcore.LowercaseLevelEncoder,
		EncodeTime:     zapcore.ISO8601TimeEncoder,
		EncodeDuration: zapcore.SecondsDurationEncoder,
		//EncodeCaller:   zapcore.FullCallerEncoder,
		EncodeCaller: zapcore.ShortCallerEncoder,
	}
}
```

执行打印：
```go
Zap().Error("错误信息")
```

`error.log`文件：
```
{"level":"error","ts":"2022-08-04T18:26:35.358+0800","caller":"command/test.go:26","msg":"错误信息"}
```



## Sync包

### 简介

> 提供了基础的异步操作方法，包括互斥锁Mutex，执行一次Once和并发等待组WaitGroup

### Mutex: 互斥锁
### RWMutex：读写锁
### WaitGroup：并发等待组
### Once：执行一次
### Cond：信号量
### Pool：临时对象池
### Map：自带锁的map



## gorm

> gorm框架是go的一个数据库连接及交互框架，一般用于连接关系型数据库

### 概览
- 全功能 ORM (无限接近)
- 关联 (Has One, Has Many, Belongs To, Many To Many, 多态)
- 钩子 (在创建/保存/更新/删除/查找之前或之后)
- 预加载
- 事务
- 复合主键
- SQL 生成器
- 数据库自动迁移
- 自定义日志
- 可扩展性, 可基于 GORM 回调编写插件
- 所有功能都被测试覆盖
- 开发者友好

### gorm文档地址

> https://v1.gorm.io/zh_CN/docs/index.html


## 优雅的实现重启服务

###  怎样算优雅

- 不关闭现有连接（正在运行中的程序）
- 新的进程启动并替代旧进程
- 新的进程接管新的连接
- 连接要随时响应用户的请求，当用户仍在请求旧进程时要保持连接，新用户应请求新进程，不可以出现拒绝请求的情况

### 流程

1. 替换可执行文件或修改配置文件
2. 发送信号量 SIGHUP
3. 拒绝新连接请求旧进程，但要保证已有连接正常
4. 启动新的子进程
5. 新的子进程开始 Accet
6. 系统将新的请求转交新的子进程
7. 旧进程处理完所有旧连接后正常结束

### 信号

> 信号是事件发生时对进程的通知机制。有时也称之为软件中断。信号与硬件中断的相似之处在于打断了程序执行的正常流程，大多数情况下，无法预测信号到达的精确时间。

> 因为一个具有合适权限的进程可以向另一个进程发送信号，这可以称为进程间的一种同步技术。当然，进程也可以向自身发送信号。然而，发往进程的诸多信号，通常都是源于内核。引发内核为进程产生信号的各类事件如下。

- 硬件发生异常，即硬件检测到一个错误条件并通知内核，随即再由内核发送相应信号给相关进程。比如执行一条异常的机器语言指令（除 0，引用无法访问的内存区域）。
- 用户键入了能够产生信号的终端特殊字符。如中断字符（通常是 Control-C）、暂停字符（通常是 Control-Z）。
- 发生了软件事件。如调整了终端窗口大小，定时器到期等。

> 针对每个信号，都定义了一个唯一的（小）整数，从 1 开始顺序展开。系统会用相应常量表示。Linux 中，1-31 为标准信号；32-64 为实时信号（通过 kill -l 可以查看）。

> 信号达到后，进程视具体信号执行如下默认操作之一。

- 忽略信号，也就是内核将信号丢弃，信号对进程不产生任何影响。
- 终止（杀死）进程。
- 产生 coredump 文件，同时进程终止。
- 暂停（Stop）进程的执行。
- 恢复进程执行。

当然，对于有些信号，程序是可以改变默认行为的，这也就是 os/signal 包的用途


> 因此在终端执行特定的组合键可以使系统发送特定的信号给此进程，完成一系列的动作时:

- 我们执行的`ctrl + c`关闭gin服务端，会强制进程结束，导致正在访问的用户等出现问题
- 常见的 kill -9 pid 会发送 SIGKILL 信号给进程，也是类似的结果


### 使用endless包实现

安装：

> go get -u github.com/fvbock/endless

示例：
```go
package main

import (
	"fmt"
	"github.com/gin-gonic/gin"
	"log"
	"syscall"
	"time"

	"github.com/fvbock/endless"
)

func main() {
	//引入gin
	routers := gin.Default()
	//创建路由
	routers.GET("/ping", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"code": 200,
			"msg":  "内容",	//一会儿从新build后修改："msg":  "内容11111",
		})
	})
	//设置端口
	address := fmt.Sprintf(":%d", 8889)
	//获取endless实例
	srv := endless.NewServer(address, routers)
	//参数配置
	srv.ReadHeaderTimeout = 10 * time.Second
	srv.WriteTimeout = 10 * time.Second
	srv.MaxHeaderBytes = 1 << 14 //左移：相当于1*2^14； 16k左右
	//启动前打印pid
	srv.BeforeBegin = func(add string) {
		log.Printf("pid %d", syscall.Getpid())
	}
	//启动服务
	err := srv.ListenAndServe()
	if err != nil {
		log.Printf("Server err: %v", err)
	}
}
```


验证：
```
//编译
go build main.go

//运行
./main.go

//访问接口
curl 127.0.0.1:8889/ping	

//输出结果
{"code":200,"msg":"内容"}

//代码中修改输出： 内容 > 内容1111

//重新编译
go build main.go

//使用已经打印出来的pid重载
kill -1 14384

//访问接口
curl 127.0.0.1:8889/ping

//输出结果(可以看到更改的代码已经生效)
{"code":200,"msg":"内容1111"}
```


### 参考

> https://blog.csdn.net/weixin_39704066/article/details/110641987
> https://blog.csdn.net/whatday/article/details/118657417