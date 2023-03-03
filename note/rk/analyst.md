# 软件设计师中级笔记

## 计算机组成原理与体系结构

### 1.数据的表示

#### 进制的转换

- R进制转10进制用按权展开法

拆分每个位置上的数， 在用每个位置上的数跟自己的权相乘

进制转换中，权就是“权值”的意思，就是每一位上的单位1代表的数值是多大。例如，生活里的十进制，百位的权值是100，就是百位上的一个1代表100

例子：
```
二进制： 10100.01 = 1*2^4+1*2^2+1*2^-2
七进制： 604.01 = 4*7^0+6*7^2+1^7-2
```

- 10进制转R进制用短除法

例子：
```
数字 5 转换成2进制， 同理转换成 R 进制就除以 R

5/2=2 余 1
2/2=1 余 0 
1/2=0 余 1

对应二进制： 101
```

> 提示： 2进制转8进制和16进制可以通过分段转换，8进制3个成一段，16进制4个成一段，不够就补0

#### 原码,反码,补码,移码

- 原码

(取值范围：-127~+127)

正数的原码是其本身

负数的原码是其本身

- 反码

- 补码

- 移码
