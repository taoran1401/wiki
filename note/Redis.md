## 基础操作

### 连接redis

语法：

> redis-cli -h ip地址 -p 端口

例：
```
redis-cli -h 127.0.0.1 -p 6379
```

当设置了密码需要验证密码

> 语法： auth 密码

例：
```
auth 123456
```

选择数据库

> 语法：select 库索引

例：
```
select 1
```

### key操作

查看所有key

> keys *

指定key设置过期时间

> expire 键名 秒

查看key的过期时间

> ttl 键名

删除key

> del 键名

判断key是否存在

> exists 键名

### string类型操作

将字符串值 value 关联到 key； 如果 key 已经持有其他值， SET 就覆写旧值， 无视类型

> set 键名 值

只在键 key 不存在的情况下， 将键 key 的值设置为 value; 若键 key 已经存在， 则 SETNX 命令不做任何动作

> setnx 键名 值

返回与键 key 相关联的字符串值

> get 键名

将键 key 的值设为 value ， 并返回键 key 在被设置之前的旧值

> getset 键名 值

返回键 key 储存的字符串值的长度

> strlen 键名

示例：
```
127.0.0.1:6379[1]> strlen k2
(integer) 3
```

自增

> incr 键名

自减

> desc 键名

同时为多个键设置值

> mset 键名 值 键名1 值1 ... 键名n 值n

返回给定的一个或多个字符串键的值

> mget 键名 键名1 ... 键名n

### hash类型操作

设置hash表中的字段和值

> hset 键名 字段 值

查询hash表中的字段的值

> hget 键名 字段

查询hash表中所有字段和值

> hgetall 键名

检查字段是否存在于hash表中

> hexists 键名 字段

删除hash表中一个或多个字段

> hdel 键名 字段 字段1 ... 字段n

获取hash表中字段数量

> hlen 键名

获取hash表中所有字段

> hkeys 键名

获取hash表中所有值

> hvals 键名

### 列表操作

将一个或多个值插入到列表表头

> lpush 键名 值1 值2 ... 值n 

将一个或多个值插入到列表末尾

> rpush 键名 值1 值2 ... 值n 

移除并返回列表的头元素

> lpop 键名

移除并返回列表的末尾元素

> rpop 键名

获取列表长度

> llen 键名

获取指点下标的元素

> lindex 键名 索引

### 集合操作

将一个或多个元素加入到集合中

> sadd 键名 值1 值2 ... 值n

返回集合中全部成员

> smembers 键名

判断元素是否集合成员

> sismember 键名 值

移除并返回集合中的一个随机元素

> spop 键名

### 有序集合操作

将一个或多个元素和score添加到有序集合中

> zadd 键名 score 值 ... 键名1 score1 值1 ... 键名n scoren 值n

返回有序集合中成员对应的score

> zscore 键名 值(成员) 

返回有序集合中元素的数量

> zcard 键名

返回有序集合中指定区间内的成员; 通过WITHSCORES显示score

> zrange 键名 开始索引 结束索引 WITHSCORES

```
# 显示全部元素
zrange z1 0 -1 withscores
1) "zz1"
2) "10"
3) "zz2"
4) "11"
5) "zz3"
6) "12"

# 显示下标1和2的元素
zrange z1 1 2 withsocres
1) "zz2"
2) "11"
3) "zz3"
4) "12"

# 下标超出的情况
1) "zz1"
2) "10"
3) "zz2"
4) "11"
5) "zz3"
6) "12"

# 下标区间不存在的情况
(empty array)
```

### 更多命令

> redis命令参考： http://redisdoc.com/

## redis持久化

### 什么是持久化

都知道Redis内存数据库，所以当一些意外发生，比如进程被终止、服务器宕机等等，Redis中存储的这些数据也都会随之消失，为了解决这个问题，Redis提供了RDB持久化功能

redis提供了两种持久化方式：
RDB持久化
AOF持久化

这两种方式可以同时使用

### RDB持久化

RDB是Redis默认支持的持久化方式,该机制是指在指定时间间隔内将内存中的数据集快照写入磁盘

RDB原理
```
Redis在触发持久化后，会fork一个子进程，此时父进程和子进程同在
子进程将目前Redis进程的全部数据写入到一个临时文件RDB中
当子进程完成对新RDB文件的写入时，Redis用新的RDB的文件覆盖旧的RDB文件
```

查看redis持久化配置
```
CONFIG GET save
```

结果展示：
```
 1)  "save"
 2)  "900 1 300 10 60 10000"
```

其中`900 1 300 10 60 10000`表示：
```
900 1: 每900秒钟里有1条数据修改则触发RDB
300 10: 每300秒钟里有10条数据修改则触发RDB
60 10000：每60秒钟里有10000条数据修改则触发RDB
```

手动触发RDB命令：
```
# redis cmd
save
```

修改持久化配置
```
CONFIG SET save "800 1 150 5 30 5000"
```



优点：
- 备份文件只有一个，灾难恢复的时候可以很方便的压缩在转移到其他存储介质上
- 相比于AOF机制，如果数据集很大，RDB的启动效率会更高
- 通过fork子进程来实现数据的持久化，所以对主进程影响比较小

缺点：
- RDB按时间间隔来触发持久化，如果在一段时间内未触发持久化就宕机了，那么这一小段时间内的数据会丢失
- 由于每次持久化都是整个redis中全部数据，如果当时数据量比较大时会对客户端提供的服务暂停数毫秒甚至是数秒

### AOF持久化

AOF持久化就是以独立的日志来记录每次的写命令，然后Redis重启的时候 ，重新执行AOF的命令来完成Redis数据的恢复，这里的日志记录是每次的写命令而不是二进制数据流

AOF原理
```
所有的命令都会被追加到aof_buf这个缓冲区中
接着AOF缓冲区根据对应的同步策略想磁盘中做同步操作，此处的同步策略可以通过redis.conf中的appendfsync进行配置
随着AOF文件变大，可以通过rewrite机制来压缩Redis中的数据
Redis服务器重启会加载AOF文件用来恢复数据
```

查看AOF开启状态：
```
CONFIG GET appendonly
```

结果展示：
```
 1)  "appendonly"
 2)  "no"
```

`no`表示未开启，`no`是默认值，AOF必须手动开启,在redis.conf中设置以下参数：
```
## 开启AOF持久化，默认关闭
appendonly yes

## AOF文件名称（默认）
appendfilename "appendonly.aof"

## AOF持久化策略 有三个值 always、everysec和no 默认是everysec 建议设置成everysec
# no:表示等操作系统进行数据缓存同步到磁盘（快）
# always:表示每次更新操作后手动调用fsync()将数据写到磁盘（慢，安全）
# everysec:表示每秒同步一次（折衷，默认值）
appendfsync everysec

## AOF自动重写的文件大小跟上一次重写的文件的百分比
auto-aof-rewrite-percentage 100

## AOF自动重写的文件的最小值
auto-aof-rewrite-min-size 64mb
```

配置好后重启redis(下面这个命令是docker搭建的redis重启命令)
```
docker restart redis
```

图中`dump.rdb`是RDB的存储文件， `appendonly.aof`是AOP的存储文件

![](../static/images/WeChatbc51904b2b89b1728b8f697f1af5e501.png)

#### AOF重写

随着命令不断写入AOF，文件会越来越大，为了解决这个问题，Redis引入了AOF重写机制压缩文件体积。AOF文件重 写是将Redis进程内的数据转化为写命令同步到新AOF文件的过程。简单说就是将对同一个数据的若干个条命令执行结 果转化成最终结果数据对应的指令进行记录。

重写规则
```
- 进程内已超时的数据不再写入文件
- 忽略无效指令，重写时使用进程内数据直接生成，这样新的AOF文件只保留最终数据的写入命令
  > 如del key1、 hdel key2、srem key3、set key4 111、set key4 222等
- 对同一数据的多条写命令合并为一条命令
  > 如lpush list1 a、lpush list1 b、 lpush list1 c 可以转化为：lpush list1 a b c。为防止数据量过大造成客户端缓冲区溢出，对list、set、hash、zset等类型，每条指令最多写入64个元素
```

#### 手动重写和自动重写

[手动重写和自动重写可参考](https://www.cnblogs.com/the-undeveloped-procedural-ape/articles/14133345.html)