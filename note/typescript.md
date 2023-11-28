## 基础数据类型
- any: 任意类型; 声明为 any 的变量可以赋予任意类型的值。
- number: 数字类型; 双精度 64 位浮点值。它可以用来表示整数和分数。
```js
let binaryLiteral: number = 0b1010; // 二进制
let octalLiteral: number = 0o744;    // 八进制
let decLiteral: number = 6;    // 十进制
let hexLiteral: number = 0xf00d;    // 十六进制
```
- string: 字符串类型; 一个字符系列，使用单引号（'）或双引号（"）来表示字符串类型。反引号（`）来定义多行文本和内嵌表达式。
- boolean: 布尔类型; 表示逻辑值：true 和 false。
- 数组: 声明变量为数组。
```js
// 在元素类型后面加上[]
let arr: number[] = [1, 2];
// 或者使用数组泛型
let arr: Array<number> = [1, 2];
```

- 元组: 元组类型用来表示已知元素数量和类型的数组，各元素的类型不必相同，对应位置的类型需要相同。
```js
let x: [string, number];
x = ['Runoob', 1];    // 运行正常
x = [1, 'Runoob'];    // 报错
console.log(x[0]);    // 输出 Runoob
```
- enum: 枚举; 枚举类型用于定义数值集合。
```js
enum Color {Red, Green, Blue};
let c: Color = Color.Blue;
console.log(c);    // 输出 2
```
- void: 用于标识方法返回值的类型，表示该方法没有返回值。
- null: 表示对象值缺失。
- undefined: 用于初始化变量为一个未定义的值
- never: 是其它类型（包括 null 和 undefined）的子类型，代表从不会出现的值


> 注意：TypeScript 和 JavaScript 没有整数类型。

## 基础语法

### 变量声明

语法：
```js
//声明变量没有设置类型和初始值，类型可以是任意类型，默认初始值为 undefined
var [变量名];
//声明变量的类型，但没有初始值，变量值会设置为 undefined
var [变量名]:[类型];
//声明变量的类型并设置初始值
var [变量名]:[类型] = 值;
```

例子：
```ts
var userNo;
var username:string;
var age:number = 18;
```

### 类型断言

语法：
```
<类型>值
```
或
```
值 as 类型
```

```ts
var str = '1' 
var str2:number = <number> <any> str   //str、str2 是 string 类型
console.log(str2)
```





