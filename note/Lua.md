
## lua介绍

> Lua 是一种轻量小巧的脚本语言，用标准C语言编写并以源代码形式开放， 其设计目的是为了嵌入应用程序中，从而为应用程序提供灵活的扩展和定制功能。


基础教程地址：https://www.runoob.com/lua/lua-tutorial.html

## lua操作redis

> 通过lua操作redis是一种比较常规的操作，比如在nginx配置中引入lua脚本实现防刷限流来防御ddos攻击，现在先了解一下怎么操作redis

```
-- 引入redis
local redis = require "resty.redis"

-- 获取redis实例
local r = redis.new();

-- 连接redis
local conn, err = r.connect(r, "xxx.xxx.xxx.xxx", 6379);

-- 设置超时
r:set_timeout(1000);

-- 密码认证(没有密码可不用)
r:auth("xxxxxxxxx");

-- 选择库
r:select(16);

if not conn then
    -- 连接失败
    ngx.say("redis connect failed: ", err)
    return
end

-- 写入数据
local ins, err = r:set("a", "a_test");

-- 获取数据
local res, err = r:get("a");

if not res then
    ngx.say("res null: ", err);
    return
end

-- 输出结果
ngx.say(res);

-- 删除(string)
local del, err = r:del("b");

-- 关闭
local col, err = r:close();
```

### 问题: 连接阿里云redis: 报错:no resolver defined to resolve "xxxxxx.com"
解决: 用ping命令获取ip,填入连接
```
local conn, err = r.connect(r, "xxx.xxx.xxx.xxx", 6379);
```

## 防刷限流

原理：通过记录访问者IP的次数和频率到redis判断请求频率是否过高，

- 防刷功能：一秒内访问次数过高将会被封禁一段时间

- 限流功能：超过限流次数将会等待处理请求

### 脚本代码

脚本上传到github,需要的通过github拉取

> github地址: https://github.com/taoran1401/lua-DDOS

以下例子中有详细注释说明(openresty_limit.lua)：
```lua
-- 防刷限流: 禁止高频率访问的ip; 每个接口每秒至多处理10个请求
local function close_redis(red)
    if not red then
        return
    end
    --释放连接(连接池实现)
    local pool_max_idle_time = 10000 --毫秒
    local pool_size = 100 --连接池大小
    local ok, err = red:set_keepalive(pool_max_idle_time, pool_size)

    if not ok then
        ngx_log(ngx_ERR, "set redis keepalive error : ", err)
    end
end

-- 等待
local function wait()
    -- 睡眠
   ngx.sleep(1)
end

-- 加载并配置redis -- 
local redis = require "resty.redis"
local red = redis:new()
red:set_timeout(1000)
-- ip
local ip = "127.0.0.1"
-- 端口
local port = 6379
-- 连接
local ok, err = red:connect(ip,port)
-- 密码认证(没有密码的可以注释掉)
red:auth("******");
-- 选择库
red:select(0);
if not ok then
    return close_redis(red)
end

-- 防刷功能 -- 
-- ngx.req.get_headers: 获取头信息
-- ngx.var.remote_addr: 获取真实ip
local clientIP = ngx.req.get_headers()["X-Real-IP"]
if clientIP == nil then
   clientIP = ngx.req.get_headers()["x_forwarded_for"]
end
if clientIP == nil then
   clientIP = ngx.var.remote_addr
end

local incrKey = "user:"..clientIP..":freq"
local blockKey = "user:"..clientIP..":block"

-- 检测阻塞值
local is_block,err = red:get(blockKey) -- check if ip is blocked
if tonumber(is_block) == 1 then
   -- 结束请求并跳转到403
   -- ngx.print("请求频率过高,请稍后重试!");
   -- ngx.exit(ngx.HTTP_FORBIDDEN)
   ngx.exit(403)
   return close_redis(red)
end

-- 自增, 没有就初始化为0在自增
res, err = red:incr(incrKey)
if res == 1 then
   -- 设置自增键过期时间
   expire_res, err = red:expire(incrKey,1)
end

-- 获取每秒最高访问次数
local limit_max_num,err = red:get('limit_max_num')
if (limit_max_num == nil or limit_max_num == '' or limit_max_num == ngx.null) then
    limit_max_num = 200
end

if res > tonumber(limit_max_num) then
    -- 设置阻塞
    res, err = red:set(blockKey,1)
    -- expire: 设置阻塞过期时间
    res, err = red:expire(blockKey,600)
end

-- 限流功能 -- 
local uri = ngx.var.uri -- 获取当前请求的uri
local uriKey = "req:uri:"..uri

-- 获取限流临界值
local limit_flow_num = red:get('limit_flow_num');
if (limit_flow_num == nil or limit_flow_num == '' or limit_flow_num == ngx.null) then
    limit_flow_num = 10
end
-- 根据uri记录请求次数
--[[
-- 自增
local res, err = redis.call('incr',KEYS[1])
if res == 1 then
    local resexpire, err = redis.call('expire',KEYS[1],KEYS[2])
end
return (res)
]]--
res, err = red:eval("local res, err = redis.call('incr',KEYS[1]) if res == 1 then local resexpire, err = redis.call('expire',KEYS[1],KEYS[2]) end return (res)",2,uriKey,1)
-- 超过限流次等待处理请求
while (res > tonumber(limit_flow_num))
do
   -- red:incr("test");
   -- ngx.thread.spawn: 再生协程
   local twait, err = ngx.thread.spawn(wait)
   -- ngx.thread.wait: 等待协程终止才结束请求
   ok, threadres = ngx.thread.wait(twait)
   if not ok then
      ngx_log(ngx_ERR, "wait sleep error: ", err)
      break;
   end
   --[[
    local res, err = redis.call('incr',KEYS[1])
    if res == 1 then
        local resexpire, err = redis.call('expire',KEYS[1],KEYS[2])
    end
    return (res)
    ]]--
   res, err = red:eval("local res, err = redis.call('incr',KEYS[1]) if res == 1 then local resexpire, err = redis.call('expire',KEYS[1],KEYS[2]) end return (res)",2,uriKey,1)
end
close_redis(red)
```


### 脚本使用方法

> Openresty是什么： 是一个基于 Nginx 与 Lua 的高性能 Web 平台，其内部集成了大量精良的 Lua 库、第三方模块以及大多数的依赖项。用于方便地搭建能够处理超高并发、扩展性极高的动态 Web 应用、Web 服务和动态网关(官网：http://openresty.org/cn/)

这里就当成是集成lua模块的nginx, 如果只使用nginx,那么nginx需要安装lua模块，上面的脚本使用方法如下：

打开脚本`openresty_limit.lua`配置`redis`
```
# IP
local ip = "127.0.0.1"
# 端口
local port = 6379
# 密码
red:auth("*****");
# 选择存储库
red:select(0);
```

`openresty`中加载脚本
```
server {
    listen  80 default;
    listen 443 ssl;
    server_name *.xxxxxx.com;
    root /usr/share/nginx/html/;
    # 加载lua脚本，路径根据自己情况定
    access_by_lua_file /etc/nginx/lua/openresty_limit.lua;
}
```

如何动态防刷限流：以下两个配置是从redis读取，如果没有则使用默认值，所以只要通过程序动态修改以下两个值即可
```
limit_max_num: 每秒最高访问次数,默认200
limit_flow_num: 每秒最高处理请求数，默认10
```


