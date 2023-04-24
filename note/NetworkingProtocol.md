
## 前言



### 文件描述符

```
少的触发系统调用，减少浪费

VFS树，FD(文件描述符), inode id, pagecache 4k, dirty 脏, flush(书写到磁盘中去)

？脏读，脏页

lsof -p $$ 
exec
read

FD描述符
  cwd: 工作目录
  rtd: 根目录
  txt: 文本域（进程加载成功后的可执行程序的代码段）
  mem: 分配的内存空间
  0u: 输入
  1u: 输出
  2u: 报错输出
  255u: 
```

### pipeline

### pagecache 

### 磁盘io

### tcp/ip

#### BIO

阻塞io

> 借助工具： linux strace 

#### NIO

非阻塞io


问题： 每次循环系统调用时可能只有个别回应，这样会有很多无意义的调用


多路复用：

```
? [异]同步IO模型
select
poll
epoll
```

#### AIO


## http,https

## TCP/IP

### 应用层协议

协议： 双方约定

### 传输控制层

tcp: 面向连接的可靠传输协议

三次握手：

keepalive: 当3次握手完成后，服务器宕机或断网，客户端会依旧保持链接， 这时keepalive（心跳）会检测是否继续连接

可靠的：


资源：d

fd:

socket:

插座/套接字：

四元组：
  源：ip+port 目标：ip+port
  具备唯一性

port: 端口
  可分配的数量： 65535

## IO

什么是IO: 

### 程序的运行方式

```
cpu - 代码段中读取指令
调用: 方法的内存地址(FC)
保护模式

晶振： 
  时钟中断
IDT(中断向量表 or ?)
进程调度
```
```
进程,线程,协程
同步/异步
阻塞,非阻塞
并发,并行

```