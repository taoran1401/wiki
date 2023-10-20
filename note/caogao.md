```
php spl迭代器
php 使用psr
php 内存管理和垃圾回收机制
  https://www.jb51.net/article/213549.htm
vuex
内存逃逸
```

```
base: [3.7 + 4.4 + 0.3] = 8.4

without： 0.3

base amount(6,7,8,9,10,11,12,1): sum(8) - (eat(1.8) + home(1.6) + life(0.2)) = 4.4

openapi: 
	login: 5 integral
	checkin: 5 integral
	invite: 10 integral


period: 05.19 - 11.00
step 1{
	70vd+wiki/day:
		work: 3h * 4
		rest: 4h * 1
	period: 4week
	end: 6.17
}

step2{
	exercise: 720 num(72/day)
	period: 
		first: 10
		second: 5
		third: 5
	end: 6.27
}

step3{
	practise + thesis
	period: 
		2/week * 8
	end: 8.27
}

step4{
	synthesize: exercise|thesis
	end: 10.27
}

bz: 1.8

```

## mysql: case when语法
```sql
select 
	id,
  sex,
  version_name,
	case
		when `status` = 0 then '正常'
		when `status` = 1 then '封号'
	end as `status`
from `users` 
where 
	sex = 1 
	and create_time >= '2022-06-24 00:00:00' 
	and create_time <= '2022-06-28 23:59:59'
	and version_name = '2.2.0'
```

## 一个临时的ci/cd脚本, 代码打包上传用
```shell
#!/bin/bash

# ########################################
# 一个临时的ci/cd脚本; 保留上次部署代码方便    #
# ########################################

# 文件名
FILENAME='project-'`date +%Y%m%d%H%M%S`
# 压缩包名
FILENAME_ZIP=${FILENAME}'.zip'
# 服务器账户
SERVER_USER=root
# 服务器ip
SERVER_IP=xx.xx.xx.xx
# 端口
SERVER_PORT=22
# 代码存放目录
SERVER_PATH=/home/wwwroot/project/store/testing/api/
# 服务运行目录（这个会通过ln将代码目录映射并启动）
SERVER_RUN_PATH=/home/wwwroot/project/testing/api
# env
ENV=/home/wwwroot/project/store/testing/api.env

echo '>>> 压缩文件： 文件名： '${FILENAME}

# 压缩文件
if [ ! -d ./deploy ]; then
    mkdir ./deploy
fi
# -x 忽略压缩文件或目录
zip -r ./deploy/${FILENAME_ZIP} ./ -x .env deploy-pack-zip.sh deploy-testing.sh deploy-testing-web.sh deploy-online.sh deploy-sit.sh deploy-sit-web.sh deploy/\* runtime/\* .idea/\* .DS_Store/\* .git/\*

echo '>>> 部署代码：目标服务器:'${SERVER_IP}'， 存放代码目录：'${SERVER_PATH}

# 发送到远程服务器
scp -P ${SERVER_PORT} ./deploy/${FILENAME_ZIP} ${SERVER_USER}@${SERVER_IP}:${SERVER_PATH}

echo '>>> 解压和配置'
# 解压和配置
ssh -p ${SERVER_PORT} ${SERVER_USER}@${SERVER_IP} << EOF
cd ${SERVER_PATH}
mkdir ./${FILENAME}
unzip -o ./${FILENAME_ZIP} -d ./${FILENAME}
cp ${ENV} ./${FILENAME}/.env
chmod +x ./${FILENAME}/bin/server.sh
ln -fnbs ${SERVER_PATH}${FILENAME} ${SERVER_RUN_PATH}
EOF

# ln -fbs ${SERVER_PATH}/${FILENAME} ${SERVER_RUN_PATH}

# 安全起见：
# 需要自行到服务器移动项目目录或添加软链接
# 不使用脚本重启服务，到线上检查没问题后手动重启
# 根据打包时间区分版本控制，如有问题可以重新建立软连接重启
# 重启提示端口占用： netstat -tunlp|grep 9502
echo '>>> 部署完成, 安全起见，请确认后手动启动服务'
```

## 前端用,编译后上传
```shell
#!/bin/bash

# ######################
# 一个临时的ci/cd脚本    #
# ######################

# 文件名
FILENAME='project-web-'`date +%Y%m%d%H%M%S`
# 压缩包名
FILENAME_ZIP=${FILENAME}'.zip'
# 服务器账户
SERVER_USER=root
# 服务器ip
SERVER_IP=xx.xx.xx.xx
# 端口
SERVER_PORT=22
# 代码存放目录
SERVER_PATH=/home/project/store/testing/web/
# 服务运行目录（这个会通过ln将代码目录映射并启动）
SERVER_RUN_PATH=/home/project/testing/web
# env
ENV=

# build前端代码
npm run build

if [ ! -d ./${BUILD_DIR} ]; then
  echo '>>> 前端构建失败！'
  exit;
fi

echo '>>> 压缩文件： 文件名： '${FILENAME}

# 压缩文件
if [ ! -d ./deploy ]; then
    mkdir ./deploy
fi
# -x 忽略压缩文件或目录
zip -r ./deploy/${FILENAME_ZIP} ./dist -x .env deploy-pack-zip.sh deploy-testing.sh deploy-online.sh deploy/\* runtime/\* .idea/\* .DS_Store/\* .git/\*

echo '>>> 部署代码：目标服务器:'${SERVER_IP}'， 存放代码目录：'${SERVER_PATH}

# 发送到远程服务器
scp -P ${SERVER_PORT} ./deploy/${FILENAME_ZIP} ${SERVER_USER}@${SERVER_IP}:${SERVER_PATH}

echo '>>> 解压和配置'
# 解压和配置
ssh -p ${SERVER_PORT} ${SERVER_USER}@${SERVER_IP} << EOF
cd ${SERVER_PATH}
mkdir ./${FILENAME}
unzip -o ./${FILENAME_ZIP} -d ./${FILENAME}
ln -fnbs ${SERVER_PATH}${FILENAME} ${SERVER_RUN_PATH}
EOF

# ln -fbs ${SERVER_PATH}${FILENAME} ${SERVER_RUN_PATH}

echo '>>> 部署完成, 安全起见，请确认后手动启动服务'
```



golang使用panic,recover实现错误捕获
```go
func main() {
	fmt.Println("start")
	try(tierCode)
	fmt.Println("end")
}

// base: 1
// ioc: 1
// taogin: gin,viper,zap,gorm,redis,mongodb,rabbitmq,cron,command,plugin,[curl]
// data-view
func tierCode() {
	//var slice []int
	tierTwo()
	//fmt.Println(slice[0])
}

func tierTwo() {
	panic("参数错误:two")
}

func try(entry func()) {
	defer func() {
		fmt.Println("try err")
		err := recover()
		switch err.(type) {
		case runtime.Error:
			fmt.Println("runtime error", err)
			break
		default:
			fmt.Println("error", err)
			break
		}
	}()
	entry()
}
```

```
令牌桶限流
高并发处理(百万级)模拟实践
```

```
vsp
```

```
# goctl: rpc生成
goctl rpc protoc remind.proto --go_out=/disk2/www/gogogo/rbl/go-rbl/app/remind/cmd/rpc --go-grpc_out=/disk2/www/gogogo/rbl/go-rbl/app/remind/cmd/rpc --zrpc_out=/disk2/www/gogogo/rbl/go-rbl/app/remind/cmd/rpc

# goctl: api生成
goctl api go -api desc/remind.api -dir .

# 生成model
goctl model mysql datasource -url="root:mysql1401@tcp(120.78.144.133:3306)/nav" -table="users" -c -dir .

# grpcui
grpcui -plaintext localhost:9002
```

```
linux: tcpdump

网站安全和优化
xss,doss,webshell,sql注入攻击防御

死信队列
```


```
dao: 
start dao: 
contribute: 
scene{ 
	1,2,3: 
	4,5,6: 
	7,8,9: 
}

node{
	1-5 start

}

red pack{
	1: 20 start dao;
	2: 100 start dao;
	3: 500 start dao;
}

collect{
	4 combo 1
}

altar{

}

cj{
	
}

词汇：
时间相关，动物，建筑，水果，颜色，日常用品
```




-- ocr{
	方案一：
		转换成web
		音视频ocr识别使用链接的方式
		添加历史识别记录
		授权后免费使用，每天赠送积分
	方案二：
		转换成浏览器插件
		支持图片和视频识别(bili, youtube)
		支持实时转录
}
-- chatgpt next my control{
	run env: web
	训练相关模型
}
-- ai image
-- ai{
	chatgpt(各种模型)
	ai image;(logo, avatar)
}
-- 答题、问卷、测试系统(待定)
-- 组件{
	google一键授权登录(海外)
	phone(国内)
	多语言：中文，英语
	[翻译api组件]
}

chargpt-next-web

server: php, golang
web: vue3, ts
multi platfrom: uniapp

mysql order by field的使用; 通过字段值自定义排序








