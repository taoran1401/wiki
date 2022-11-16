## 聚合查询

> mongodb中聚合操作用来处理数据并返回计算结果，聚合操作可以将多个文档中的值组合在一起，并可对数据执行各种操作，以返回单个结果，有点类似于 SQL 语句中的 count(*)、group by 等。

### aggregate()方法

语法：
```
db.集合.aggregate(pipeline)
```

参数说明：
- pipeline: 一系列数据聚合操作或阶段

### 操作符

#### 管道操作符

| 操作符 | 描述 | 对应mysql |
| ---- | ---- | ---- |
| $match | 过滤数据，只输出符合结果的文档（也可以对分组的数组做过滤） | where |
| $project | 投射，选择想要的字段或对字段进行重命名 | select |
| $group | 将集合中的文档分组，可用于统计结果 | group by |
| $unwind | 拆分 | - |
| $sort | 排序 | order by |
| $limit | 限制查询条数 | limit |
| $skip | 跳过一些条数 | - |
| $lookup | 多表关联查询 | join |

#### 表达式操作符

| 操作符 | 描述 |
| ---- | ---- |
| $sum | 计算总和，{$sum: 1}表示返回总和×1的值(即总和的数量),使用{$sum: '$制定字段'}也能直接获取制定字段的值的总和 |
| $avg | 求平均值 |
| $min | 求最小值 |
| $max | 求最大值 |
| $push | 将结果文档中插入值到一个数组中 |
| $first | 根据文档的排序获取第一个文档数据 |
| $skip | 跳过一些条数 |
| $alastvg | 同理，获取最后一个数据 |

### 聚合操作

#### 先添加一些测试数据

`users`: 用户表(集合)

| _id | username | user_id | group |
| ---- | ---- | ---- | ---- |
| 62ac58811615617ee69e9466 | zhangsan	| 1	| A |
| 62ac58811615617ee69e9466 | lisi	| 2	| A |
| 62ac58811615617ee69e9466 | wangwu	| 3	| B |
| 62ac58811615617ee69e9466 | mazi	| 4	| B |

`balance`: 资金表(集合)

| _id | user_id | balance |
| ---- | ---- | ---- |
| 62c0082f608c6b37987dc978	| 1 |	10
| 62c0082f608c6b37987dc979	| 2 |	20
| 62c0082f608c6b37987dc97a	| 3 |	30
| 62c0082f608c6b37987dc97b	| 4 |	40

#### 查找A组用户

查询语句：`$match`相当于mysql中的`where`语句
```
db.users.aggregate([
	{
		$match: {
			group: {$eq: 'A'}
		}
	}
])
```

执行结果：
```
{
    "_id": ObjectId("62ac58811615617ee69e9466"),
    "username": "zhangsan",
    "user_id": 1,
    "group": "A"
}

// 2
{
    "_id": ObjectId("62ac589e1615617ee69e9467"),
    "username": "lisi",
    "user_id": 2,
    "group": "A"
}
```

#### 连表查询A,B两组的用户余额之和

`$group`基本语法：分组
```
{ 
  $group: { 
    _id: <expression>, 
    <field1>: { 
      <accumulator1> : <expression1> 
    }, ... } 
  }
```
参数说明：
- _id: 必须存在，可以为null, 可以设置字段,字段表示方式`$字段名`, 如`username`字段则表示为`$username`

`$lookup`基本语法：连表
```
{
   $lookup:
     {
       from: <外部连接数据集>,
       localField: <本文档的关联关键字段>,
       foreignField: <外部关联文档关键连接字段 "from" 集合>,
       as: <输出数组字段d>
     }
}
```

`$unwind`基本语法：可以将数组拆分为单独的文档
```
{ 
	$unwind: 
	{
		path: <要指定字段路径，在字段名称前加上$符并用引号括起来>, 
		includeArrayIndex: <可选,一个新字段的名称用于存放元素的数组索引。该名称不能以$开头>, 
		preserveNullAndEmptyArrays: <可选，default :false，若为true,如果路径为空，缺少或为空数组，则$unwind输出文档> 
	} 
}
```

> 当使用`$lookup`连表后返回的`as`输出是数组，需要转换为文档才能在分组中计算；

详情见下面的使用例子：

例子：连表查询出用户余额，分组后计算两个组的用户余额之和
```
db.users.aggregate([
	{
		//连表
		$lookup: {
			from: "balance",
			localField: "user_id",
			foreignField: "user_id",
			as: "user_balance"
		}
	},
	//数组转文档
	{
		$unwind: {
			path: "$user_balance",
			preserveNullAndEmptyArrays: true
		}
	},
	//分组求和
	{
		$group: {
			_id: '$group',
			total: {$sum: "$user_balance.balance"}
		}
	}
])
```

返回结果：
```
// 1
{
    "_id": "B",
    "total": 70
}

// 2
{
    "_id": "A",
    "total": 30
}
```