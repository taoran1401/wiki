## minio使用

> 中文文档地址：http://docs.minio.org.cn/
> 项目地址：https://github.com/minio/minio

## 安装

docker方式：
```
docker run -p 9000:9000 -p 9001:9001 minio/minio server /data --console-address ":9001"
```
? 可能无法长期存储数据
？分布式存储操作

## 