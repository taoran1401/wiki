
> 注：以下内容以mysql8.0为例

## mysql的用户表

### 查看用户

mysql的用户信息可以通过`mysql`库的`user`表查看，如下

查看所有用户情况： 
```sql
select * from mysql.`user`;
```

查看root用户 :
```sql
select * from mysql.`user` where `User` = "root"\G
```

对应结果
```
*************************** 1. row ***************************
                    Host: %
                    User: root
             Select_priv: Y
             Insert_priv: Y
             Update_priv: Y
             Delete_priv: Y
             Create_priv: Y
               Drop_priv: Y
             Reload_priv: Y
           Shutdown_priv: Y
            Process_priv: Y
               File_priv: Y
              Grant_priv: Y
         References_priv: Y
              Index_priv: Y
              Alter_priv: Y
            Show_db_priv: Y
              Super_priv: Y
   Create_tmp_table_priv: Y
        Lock_tables_priv: Y
            Execute_priv: Y
         Repl_slave_priv: Y
        Repl_client_priv: Y
        Create_view_priv: Y
          Show_view_priv: Y
     Create_routine_priv: Y
      Alter_routine_priv: Y
        Create_user_priv: Y
              Event_priv: Y
            Trigger_priv: Y
  Create_tablespace_priv: Y
                ssl_type:
              ssl_cipher: NULL
             x509_issuer: NULL
            x509_subject: NULL
           max_questions: 0
             max_updates: 0
         max_connections: 0
    max_user_connections: 0
                  plugin: caching_sha2_password
   authentication_string: $A$005$ue&
1wYzUFYczr9KpAtzv5h9ltAeMMlW961vtw9yWPekZVNi3
        password_expired: N
   password_last_changed: 2021-07-08 18:12:57
       password_lifetime: NULL
          account_locked: N
        Create_role_priv: Y
          Drop_role_priv: Y
  Password_reuse_history: NULL
     Password_reuse_time: NULL
Password_require_current: NULL
         User_attributes: NULL
```

字段说明：
```
Host: 授权对象，% 代表所有
User: 用户名
Select_priv：确定用户是否可以通过SELECT命令选择数据 
Insert_priv：确定用户是否可以通过INSERT命令插入数据 
Update_priv：确定用户是否可以通过UPDATE命令修改现有数据 
Delete_priv：确定用户是否可以通过DELETE命令删除现有数据 
Create_priv：确定用户是否可以创建新的数据库和表 
Drop_priv：确定用户是否可以删除现有数据库和表 
Reload_priv：确定用户是否可以执行刷新和重新加载MySQL所用各种内部缓存的特定命令，包括日志、权限、主机、查询和表 
Shutdown_priv：确定用户是否可以关闭MySQL服务器，将此权限提供给root账户之外的任何用户时，都应当非常谨慎 
Process_priv：确定用户是否可以通过SHOW 
File_priv：确定用户是否可以执行SELECT INTO OUTFILE和LOAD DATA INFILE命令 
Grant_priv：确定用户是否可以将已经授予给该用户自己的权限再授予其他用户，例如，如果用户可以插入、选择和删除foo数据库中的信息，并且授予了GRANT权限，则该用户就可以将其任何或全部权限授予系统中的任何其他用户 
References_priv：目前只是某些未来功能的占位符，现在没有作用 
Index_priv：确定用户是否可以创建和删除表索引 
Alter_priv：确定用户是否可以重命名和修改表结构 
Show_db_priv：确定用户是否可以查看服务器上所有数据库的名字，包括用户拥有足够访问权限的数据库，可以考虑对所有用户禁用这个权限，除非有特别不可抗拒的原因 
Super_priv：确定用户是否可以执行某些强大的管理功能，例如通过KILL命令删除用户进程，使用SET GLOBAL修改全局MySQL变量，执行关于复制和日志的各种命令 
Create_tmp_table_priv：确定用户是否可以创建临时表 
Lock_tables_priv：确定用户是否可以使用LOCK 
Execute_priv：确定用户是否可以执行存储过程，此权限只在MySQL 5.0及更高版本中有意义 
Repl_slave_priv：确定用户是否可以读取用于维护复制数据库环境的二进制日志文件，此用户位于主系统中，有利于主机和客户机之间的通信 
Repl_client_priv：确定用户是否可以确定复制从服务器和主服务器的位置 
Create_view_priv：确定用户是否可以创建视图，此权限只在MySQL 5.0及更高版本中有意义 
Show_view_priv：确定用户是否可以查看视图或了解视图如何执行，此权限只在MySQL 5.0及更高版本中有意义 
Create_routine_priv：确定用户是否可以更改或放弃存储过程和函数，此权限是在MySQL 5.0中引入的 
Alter_routine_priv：确定用户是否可以修改或删除存储函数及函数，此权限是在MySQL 5.0中引入的 
Create_user_priv：确定用户是否可以执行CREATE 
Event_priv：确定用户能否创建、修改和删除事件，这个权限是MySQL 5.1.6新增的 
Trigger_priv：确定用户能否创建和删除触发器，这个权限是MySQL 5.1.6新增的
Create_tablespace_priv: 创建表的空间
ssl_type: 用户加密相关
ssl_cipher: 用户加密相关
x509_issuer: 用来标识用户
x509_subject: 用来标识用户
max_questions: 每小时允许执行多少次查询
max_updates: 每小时允许执行多少次更新
max_connections: 每小时允许建立多少连接
max_user_connections: 每小时单个用户可以同时具有的连接数
plugin: 存储于授权相关的插件
authentication_string: 密码
password_expired: 密码过期时间
password_last_changed: 密码最后变更时间
password_lifetime: 密码生存时间(比如设置密码有效30天) 
```

## 权限管理

### 权限列表

> 查看权限列表语法：

```
show privileges;
```

执行结果如下：
| ---- | ---- | ---- |

| 权限 | 权限级别 | 说明 |
| ---- | ---- | ---- |
| Alter | Tables | To alter the table |
| Create | Databases,Tables,Indexes | To create new databases and tables |
| Select | Tables | To retrieve rows from table |
| 更多... | 更多... | 更多... |

 > 更多权限说明执行`show privileges;`查看

### 查看权限

```sql
-- 查看权限(默认当前用户)
show grants;
-- 查看指定用户
show grants for '用户';
```

### 授权语法

> 授权语法：

```sql
GRANT
	[权限]
ON [库.表]
TO [用户名]@[IP]
IDENTIFIED BY [密码]
-- WITH GRANT OPTION;

-- WITH GRANT OPTION: 不希望这个用户给其他用户授权操作时，应去掉这个
```

> 刷新权限

```sql
flush privileges;
```

### 实例：创建只读账号

```sql
-- 创建只读用户
create user 'demo_read'@'%' IDENTIFIED by 'password01';

-- 赋予只读权限
grant
	SELECT
ON demo01.*
TO 'demo_read'@'%';

-- 刷新权限
flush PRIVILEGES;
```

### 实例：创建读写账号

```sql
-- 创建读写用户
create user 'demo_rw'@'%' IDENTIFIED by 'password02';
-- 赋予只读权限
grant
	SELECT,INSERT,UPDATE,DELETE
ON demo01.*
TO 'demo_rw'@'%';
-- 刷新权限
flush PRIVILEGES;
```

### 回收权限

> 语法：
```sql
-- 回收权限
revoke [权限1,权限2,...权限n] on [数据库].[表名] from [用户名]@[地址];
```

> 例子：
```sql
-- 回收用户全部权限
revoke ALL on *.* from 'demo_read'@'%';
-- 回收用户删除权限
revoke INSERT,UPDATE,DELETE on demo01.* from 'demo_rw'@'%';
```

> 验证： 通过`show grants for '用户';`查看权限是否回收成功


## 常用函数

> 数值型函数

|  函数名称  |  作用  |
|  ----  |  ----  |
|  ABS  |  求绝对值  |
|  SQRT  |  求二次方根  |
|  MOD	|  求余数  |
|  CEIL 和 CEILING	|  两个函数功能相同，都是返回不小于参数的最小整数，即向上取整  |
|  FLOOR	|  向下取整，返回值转化为一个BIGINT  |
|  RAND  |  生成一个0~1之间的随机数，传入整数参数是，用来产生重复序列  |
|  ROUND  |  对所传参数进行四舍五入  |
|  SIGN  |  返回参数的符号  |
|  POW 和 POWER  |  两个函数的功能相同，都是所传参数的次方的结果值  |
|  SIN  |  求正弦值  |
|  ASIN  |  求反正弦值，与函数 SIN 互为反函数  |
|  COS  |  求余弦值  |
|  ACOS  |  求反余弦值，与函数 COS 互为反函数  |
|  TAN  |  求正切值  |
|  ATAN  |  求反正切值，与函数 TAN 互为反函数  |
|  COT  |  求余切值  |

> 字符串函数

|  函数名称  |  作用  |
|  ----  |  ----  |
|  LENGTH  |  计算字符串长度函数，返回字符串的字节长度  |
|  CONCAT  |  合并字符串函数，返回结果为连接参数产生的字符串，参数可以使一个或多个  |
|  INSERT  |  替换字符串函数  |
|  LOWER  |  将字符串中的字母转换为小写  |
|  UPPER  |  将字符串中的字母转换为大写  |
|  LEFT  |  从左侧字截取符串，返回字符串左边的若干个字符  |
|  RIGHT  |  从右侧字截取符串，返回字符串右边的若干个字符  |
|  TRIM  |  删除字符串左右两侧的空格  |
|  REPLACE  |  字符串替换函数，返回替换后的新字符串  |
|  SUBSTRING  |  截取字符串，返回从指定位置开始的指定长度的字符换  |
|  REVERSE  |  字符串反转（逆序）函数，返回与原始字符串顺序相反的字符串  |


> 日期和时间函数

|  函数名称  |  作用  |
|  ----  |  ----  |
|  CURDATE 和 CURRENT_DATE  |  两个函数作用相同，返回当前系统的日期值  |
|  CURTIME 和 CURRENT_TIME  |  两个函数作用相同，返回当前系统的时间值  |
|  NOW 和  SYSDATE  |  两个函数作用相同，返回当前系统的日期和时间值  |
|  UNIX_TIMESTAMP  |  获取UNIX时间戳函数，返回一个以 UNIX 时间戳为基础的无符号整数  |
|  FROM_UNIXTIME	将 UNIX  |  时间戳转换为时间格式，与UNIX_TIMESTAMP互为反函数  |
|  MONTH  |  获取指定日期中的月份  |
|  MONTHNAME  |  获取指定日期中的月份英文名称  |
|  DAYNAME  |  获取指定曰期对应的星期几的英文名称  |
|  DAYOFWEEK  |  获取指定日期对应的一周的索引位置值  |
|  WEEK  |  获取指定日期是一年中的第几周，返回值的范围是否为 0〜52 或 1〜53  |
|  DAYOFYEAR  |  获取指定曰期是一年中的第几天，返回值范围是1~366  |
|  DAYOFMONTH  |  获取指定日期是一个月中是第几天，返回值范围是1~31  |
|  YEAR  |  获取年份，返回值范围是 1970〜2069  |
|  TIME_TO_SEC  |  将时间参数转换为秒数  |
|  SEC_TO_TIME  |  将秒数转换为时间，与TIME_TO_SEC 互为反函数  |
|  DATE_ADD 和 ADDDATE  |  两个函数功能相同，都是向日期添加指定的时间间隔  |
|  DATE_SUB 和 SUBDATE  |  两个函数功能相同，都是向日期减去指定的时间间隔  |
|  ADDTIME  |  时间加法运算，在原始时间上添加指定的时间  |
|  SUBTIME  |  时间减法运算，在原始时间上减去指定的时间  |
|  DATEDIFF  |  获取两个日期之间间隔，返回参数 1 减去参数 2 的值  |
|  DATE_FORMAT  |  格式化指定的日期，根据参数返回指定格式的值  |
|  WEEKDAY  |  获取指定日期在一周内的对应的工作日索引  |


> 聚合函数

|  函数名称  |  作用  |
|  ----  |  ----  |
|  MAX  |  查询指定列的最大值  |
|  MIN  |  查询指定列的最小值  |
|  COUNT  |  统计查询结果的行数  |
|  SUM  |  求和，返回指定列的总和  |
|  AVG  |  求平均值，返回指定列数据的平均值  |


> 流程控制函数

|  函数名称  |  作用  |
|  ----  |  ----  |
|  IF  |  判断，流程控制  |
|  IFNULL  |  判断是否为空  |
|  CASE  |  搜索语句  |





## 索引

## 锁

## 事务

## 读写分离

## 调优方案

```
慢查询
```