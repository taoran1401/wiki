```
基于hyperf的定时任务管理器(监控执行次数，效率，状态等)
封装一个协程框架
zval
php cli
php spl迭代器
php 使用psr
php扩展
php 内存管理和垃圾回收机制
  https://www.jb51.net/article/213549.htm
swoole gobang
hyperf wap
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


```mongodb
db.getCollection("users").insert( {
    _id: ObjectId("62c006c6608c6b37987dc973"),
    username: "zhangsan",
    tier: 10,
		user_id: 1
} );

db.users.insertOne({
	username: "ls1",
	tier: 1,
	user_id: 1
})

db.balance.insert([
	{
		user_id: 1,
		balance: 10
	},
	{
		user_id: 2,
		balance: 10
	},
		{
		user_id: 3,
		balance: 10
	},
		{
		user_id: 4,
		balance: 10
	},
		{
		user_id: 5,
		balance: 10
	},
		{
		user_id: 6,
		balance: 10
	},
]);

// 投影，limit,skip;  可以通过skip和limit实现分页效果
db.users.find(
	{"username": "name4"},
	{"user_id": 1, "username": 1, "_id": 0}
).skip(1).limit(1);

// sort排序： 1升序，-1降序
db.users.find(
	{"username": "name4"},
	{"user_id": 1, "username": 1, "_id": 0}
).sort({"user_id": 1});


//联表查询
//$lookup
//	from: 同一个数据库下等待被Join的集合
//	localField: 源集合中的match值，如果输入的集合中，某文档没有 localField这个Key（Field），在处理的过程中，会默认为此文档含有 localField：null的键值对。
//	foreignField: 待Join的集合的match值，如果待Join的集合中，文档没有foreignField值，在处理的过程中，会默认为此文档含有 foreignField：null的键值对。
//	as: 为输出文档的新增值命名。如果输入的集合中已存在该值，则会覆盖掉
db.users.aggregate([
	{
		$lookup: {
			from: "balance",
			localField: "user_id",
			foreignField: "user_id",
			as: "child"
		}
	}
])

//mapReduce

//explain
db.users.find(
	{"username": "name4"},
	{"user_id": 1, "username": 1, "_id": 0}
).sort({"user_id": 1}).explain();
```


```sql
-- 连表时添加过滤条件
-- 比如A表和B表连表，B表的status = 0时B表数据才会被查询，否则为空 

-- 示例sql
select a.id,b.id from A as a left join B as b on a.id = b.id and b.status = 0;
```




golang使用panic,recover实现错误捕获
```go
func main() {
	fmt.Println("start")
	try(tierCode)
	fmt.Println("end")
}

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