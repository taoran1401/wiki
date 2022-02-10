# 在github上搭建个人主页

## 前言

如果你想快速搭建自己的个人主页、博客、在线简历而又不想购买云服务器时可以使用这个方法。

示例地址：`https://taoran1401.github.io/`

## 搭建

#### 创建项目
![创建项目](../static/images/WeChatae449aa3fd979e136c570b47cda53fac.png)

#### 更换主题

![更换主题1](../static/images/WeChat1d15dd934ede3d8fe9653296f332e64b.png)
![更换主题2](../static/images/WeChat50b5965cc69390cc460e20a51132098c.png)

更换主题后等个1-5分钟后就可以访问了

## 使用

搭建完成后会有以下两个文件
```
_config.yml     //对index.md进行渲染的配置文件
index.md        //markdown文件
```

#### 编写内容

首页：在`index.md`中添加
![首页列表](../static/images/WeChatd7b02619afabf9252336179ad5713c34.png)

文章页面： 在`articles/create_mypage.md`中添加
![文章](../static/images/WeChatdfa02094ec8d41fbca83d3a0fbc081dc.png)


如果觉得不够美观可以使用html编写，或者使用jekyll来处理

jekyll地址： `http://jekyllcn.com/`

## 自定义域名

这里不详细讲了，用aliyun购买的域名举例

1.首先使用ping命令获取ip地址，一会儿用于域名解析

```
ping 用户名.github.io   
# 结果示例：64 bytes from xxx.xxx.110.153: icmp_seq=0 ttl=54 time=100.292 ms
# `xxx.xxx.110.153`这段就是ip
```

2.进入阿里云控制台域名解析地址到刚才获取的的ip地址即可; 

## 最终效果

首页
![效果1](../static/images/WeChat3fe0cb8dfebfd5ba56305b1c8b8b3775.png)

文章
![效果2](../static/images/WeChatd10dd6c5edf850b838dac7c890df2306.png)