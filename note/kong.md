
### kong网关

Kong 是在客户端和（微）服务间转发API通信的API网关；基于openresty的高性能Api网关; 支持动态上游、动态 SSL 证书和动态限流限速等运行时的动态功能;

github地址： `https://github.com/Kong/kong`
文档地址：`https://docs.konghq.com/`

#### 安装

这里使用docker方式安装

##### 创建kong-net网络
```
docker network create kong-net 
```

##### 先安装数据库,kong支持postgres数据库
```
docker run -d --name kong-database \
  --network=kong-net \
  -p 5432:5432 \
  -e "POSTGRES_USER=kong" \
  -e "POSTGRES_DB=kong" \
  -e "POSTGRES_PASSWORD=kong" \
  postgres:9.6
```

##### 安装网关
```
docker run --rm \
  --network=kong-net \
  -e "KONG_DATABASE=postgres" \
  -e "KONG_PG_HOST=kong-database" \
  -e "KONG_PG_PASSWORD=kong" \
  -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" \
  kong:latest kong migrations bootstrap
```

启动:
```
docker run -d --name kong \
  --network=kong-net \
  -e "KONG_DATABASE=postgres" \
  -e "KONG_PG_HOST=kong-database" \
  -e "KONG_PG_PASSWORD=kong" \
  -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" \
  -e "KONG_PROXY_ACCESS_LOG=/dev/stdout" \
  -e "KONG_ADMIN_ACCESS_LOG=/dev/stdout" \
  -e "KONG_PROXY_ERROR_LOG=/dev/stderr" \
  -e "KONG_ADMIN_ERROR_LOG=/dev/stderr" \
  -e "KONG_ADMIN_LISTEN=0.0.0.0:8001, 0.0.0.0:8444 ssl" \
  -p 8000:8000 \
  -p 8443:8443 \
  -p 8001:8001 \
  -p 8444:8444 \
  kong:latest
```

访问`http://127.0.0.1:8001/`有结果表示成功


##### 安装kong的Web管理工具`konga`

创建konga数据库
```
# 进入postgres的docker容器
docker exec -it kong-database /bin/bash
# 进入postgres数据库命令行操作,输入密码konga
psql -U kong -W
# 创建用户
create user konga with password 'konga';
# 创建数据库
create database konga owner konga;
# 授权
grant all privileges on database konga to konga;
```

github地址：`https://github.com/pantsel/konga`

~参考： https://www.cnblogs.com/gilbertbright/p/14506195.html
```
# 初始化konga数据库(红色部分为上一步中创建的konga数据库的用户,密码和数据库实例,蓝色部分为postgres的IP地址)
docker run --rm pantsel/konga:latest -c prepare -a postgres -u postgresql://konga:konga@192.168.0.154:5432/konga
```

```
docker run -d --name konga \
  --network=kong-net \
  -e "DB_ADAPTER=postgres" \
  -e "DB_HOST=192.168.0.154" \
  -e "DB_PORT=5432" \
  -e "DB_USER=konga" \
  -e "DB_PASSWORD=konga" \
  -e "DB_DATABASE=konga" \
  -e "DB_PG_SCHEMA=public"\
  -e "NODE_ENV=production" \
  -p 1337:1337 \
  pantsel/konga
```

访问：`http://127.0.0.1:1337/`

#### 配置详解

https://www.jianshu.com/p/f3b1699777d6
https://blog.csdn.net/qism007/article/details/89842130