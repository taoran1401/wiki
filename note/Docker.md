## 安装docker

安装教程地址：

> https://www.runoob.com/docker/centos-docker-install.html

启动docker 
```
systemctl start docker 
```

设置开机启动
```
systemctl enable docker
```

## 镜像操作

查找镜像
```
docker search 镜像名称
```

拉取镜像
```
docker pull 镜像[:tag]
```

查看全部本地镜像
```
docker images
```

删除本地镜像
```
docker rmi 镜像ID
```

镜像的导入导出
```
# 将本地镜像导出

docker save -o 导出路径/名称 镜像ID 

# 导入镜像
docker load -i 镜像文件
```

修改镜像名称
```
docker tag 镜像ID 新镜像名称:tag
```

## 容器操作

运行容器
```
# 启动
docker run 镜像ID|镜像名称[:tag]

# 常用参数
docker run -d -p 宿主机端口:容器端口 --name 容器名称 镜像ID|镜像名称[:tag]
# -d: 后台运行
# -p: 映射当期那linux的端口和容器的端口
# -v: 宿主机目录:容器目录
```

查看容器
```
# 默认只查看运行中的容器
docker ps [-qa]
# -a: 查看全部容器
# -q: 只查看容器ID
```

查看日志
```
docker logs -f 容器ID
# -f: 滚动查看日志最后几行（和linux tail -f相同）
```

进入容器
```
docker exec -ti 容器ID bash
# -t: 让docker分配一个伪终端并绑定到容器的标准输入上
# -i: 让容器的标准输入保持打开
```

启动，重启，停止和删除容器
```
# 启动
docker start 容器ID
# 重启
docker restart 容器ID

# 停止指定容器
docker stop 容器ID
# 停止全部容器
docker stop $(docker ps -qa)

# 删除指定容器  
docker rm 容器ID
# 删除全部容器
docker rm $(docker ps -qa)
```

## 数据卷

> 数据卷： 将宿主机中的目录映射到容器目录

创建数据卷
```
docker volume create 数据卷名称
# 数据卷默认目录： /var/lib/docker/volume/数据卷名称/_data
```

查看数据卷
```
# 查看数据卷详细信息
docker volume inspect 数据卷名称

# 查看全部
docker volume ls

删除数据卷
docker volume rm 数据卷名称

应用数据卷
# 映射数据时，数据卷不存在自动创建（会同步容器中自带的文件）
docker run -v 数据卷名称:容器内部路径 镜像ID

# 指定一个路径作为数据卷存放位置（不会同步容器中文件）
docker run -v 路径:容器内部路径 镜像ID 
```

## Dockerfile

### 指令解释

```
FROM: 基于的基础镜像
RUN: 用于执行后面跟着的命令行命令
COPY: 将相对路径下的内容复制到自定义镜像中
WORKDIR: 声明镜像的默认工作目录
CMD: 需要执行的命令（可以多些但只执行最后一个）
ENV: 设置环境变量
ARG: 构建时指定的一些参数
VOLUME: 定义匿名数据卷。在启动容器时忘记挂载数据卷，会自动挂载到匿名卷
EXPOSE: 声明端口
USER: 定执行后续命令的用户和用户组，这边只是切换后续命令执行的用户（用户和用户组必须提前已经存在）
LABEL: 用来给镜像添加一些元数据（metadata），以键值对的形式
MAINTAINER: 镜像维护者姓名或邮箱地址
```

### 实例：基于dockerfile构建php镜像

> 每次搭建php环境安装众多扩展是件头痛的事情，可以利用dockerfile构建并重复使用

编写dockerfile文件

```
# 基础镜像
FROM php:7.4-fpm
# 维护人员
MAINTAINER taoran<taoran0796@163.com>
# 设置当前工作目录
WORKDIR /usr/share/nginx/html
# 拷贝当前目录的文件到镜像中
COPY . .
# 执行命令
RUN  mv /etc/apt/sources.list /etc/apt/sources.list.bak && cp sources.list /etc/apt \
        && apt-get update && apt-get install -y libpng-dev zlib1g-dev libmagickwand-dev libxslt-dev libzip-dev \
        && docker-php-ext-install -j$(nproc) pdo_mysql mysqli opcache sockets gd bcmath gettext xsl calendar pcntl shmop sysvmsg sysvsem sysvshm soap zip \
        # imagick
        && pecl install imagick \
        # redis
        && pecl install redis \
        # xlswriter
        && pecl install xlswriter \
        # swoole4.4
        && pecl install swoole-4.4.18 \
        # && pecl install redis-5.1.1.tgz && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
        # 开启扩展
        && docker-php-ext-enable xlswriter imagick redis swoole \
```

构建镜像

```
# -t: 指定要创建的目标镜像名
# .: dockerfile文件所在目录
docker build -t php:7.4-fpm .
```

## Docker-Compose

### 编写yml

YAML说明： https://www.runoob.com/w3cnote/yaml-intro.html

```
# 版本号
version: '1.0'
services: 
    # 服务名称
    mysql: 
        # 跟随docker启动
        restart: always
        image: 镜像地址
        container_name: 容器名称
        # 指定端口，可多个
        ports: 
          - 3306:3306 
        # 添加环境变量
        environment:
          变量: 值
        # 映射数据卷 
        volumes: 
          - 路径
        # 定时使用的网络
        networks:
          - 网络名称
# 网络
networks:
    网络名称:
        # 自定义驱动，这里bridge标识桥接
        driver: bridge
```

docker-compose命令
```
# 默认会在当前目录下查找docker-compose.yml

# 启动
docker-compose up -d

# 关闭并删除容器
docker-compose down

# 开启|关闭|重启已存在的由docker-compose维护的容器
docker-compose start|stop|restart

# 查看docker-compose管理的容器
docker-compose ps

# 查看日志
docker-compose logs -f 

# 重新构建自定义镜像
docker-compose build 
docker-compose up -d --build
```

docker-compose配置dockerfile
```
# yml文件中通过build指定dockerfile文件
build:
    context: ./
```

### 实例：docker-comopose搭建php + openresty环境

> 使用docker-compose快速搭建环境，下面的实例中映射文件需要需要先在外部存在，通过docker-compose构建时映射到docker内部

> 这里没有展示对应的配置文件，如果需要可以通过下面的github地址拉取完整内容

> https://github.com/taoran1401/docker-compose-php-server

```
version: "3"
services:
    nginx:
        # 镜像
        image: openresty/openresty:stretch-fat
        #容器名称
        container_name: "openresty"
        #映射端口
        ports:
            - "${NGINX_HTTP_PORT}:${NGINX_HTTP_PORT}"
            - "${NGINX_HTTPS_PORT}:${NGINX_HTTPS_PORT}"
        environment:
            - TZ=Asia/Shanghai
        volumes:
            - "./nginx/nginx.conf:/etc/nginx/nginx.conf"
            - "./nginx/config:/etc/nginx/config"
            - "./nginx/vhost:/etc/nginx/conf.d"
            - "./nginx/cert:/etc/nginx/cert"
            - "./nginx/log:/var/log/nginx"
            - "./nginx/lua:/etc/nginx/lua"
            - "/disk2/www:/usr/share/nginx/html"
        restart: always
        networks:
            - net-app
    php:
        image: registry.cn-guangzhou.aliyuncs.com/ranblogs/php:7.4-fpm
        container_name: "php"
        environment:
            - TZ=Asia/Shanghai
        volumes:
            - "/disk2/www:/usr/share/nginx/html"
            - "./php/php.ini:/usr/local/etc/php/php.ini"
            - "./php-fpm/www.conf:/usr/local/etc/php-fpm.d/www.conf"
        restart: always
        networks:
            - net-app
networks:
    net-app:
        driver: bridge
```

进入到`docker-compose.yml`目录后使用构建命令：
```
# -d: 后台运行
docker-compose up -d
```