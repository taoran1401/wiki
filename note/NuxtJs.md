## 介绍

Nuxt.js 是一个基于 Vue.js 的通用应用框架。

采用vue开发的应用系统SEO不友好，因此可以使用Nuxt的服务端渲染(SSR)解决SEO问题

Nuxt官网地址：`https://www.nuxtjs.cn/`

Nuxt工作原理简单示意：

![Nuxt工作原理简单示意](../static/images/nuxt_shiyitu.PNG)


## 安装

以下两种安装方式选一即可（npx在npm安装的时候就默认安装了）：
```
npx create-nuxt-app <项目名>

# 或

yarn create nuxt-app <项目名>
```

安装过程会有一些选项比如: 用什么ui框架、渲染模式（ssr/spa）等，根据自己的需求选择

安装完成后进入项目启动:
```
cd <项目名>
npm run dev
```

访问`http//localhost:3000/`:

![](../static/images/001.png)


## 目录结构
```
.nuxt
assets                //用于组织未编译的静态资源如 LESS、SASS 或 JavaScript
components            //用于组织应用的 Vue.js 组件； 注意这里面的组件不能使用asyncData
layouts               //布局目录
middleware            //中间件
pages                 //用于存放页面。Nuxt读取该目录下所有的.vue文件并自动生成对应的路由配置
plugins               //用于存放插件
static                //存放应用的静态文件，该目录下的文件会映射至应用的根路径 / 下
store                 //用于组织应用的 Vuex 状态树 文件
.editorconfig         //开发工具格式配置
nuxt.config.js        //文件用于组织 Nuxt.js 应用的个性化配置，以便覆盖默认配置
package.json          //文件用于描述应用的依赖关系和对外暴露的脚本接口
```

## 页面布局

### .nuxt/views/app.template.html

## 插件


## 配置

### 1.配置ip和端口, 可解决端口冲突问题


在`/package.json`中添加以下内容

```
"config": {
  "nuxt": {
    "host": "127.0.0.1",
    "port": 3002
  }
}
```

### 2.配置全局css

在`/nuxt.config.js`中添加要使用的css资源
```
css: [
  'element-ui/lib/theme-chalk/index.css',
  '~/assets/css/reset.css',
  '~/assets/css/common.css',
  '~/assets/css/normailze.css',
],
```

### 3.环境变量配置
在`/nuxt.config.js`中添加环境变量，
```
env: {
  baseUrl: process.env.BASE_URL || 'http://localhost:3001'
}
```

使用方式：

可以通过`process.env.baseUrl`获取，还可以通过`context`获取，可参考：https://www.nuxtjs.cn/api/configuration-env

### 4.head配置

在`/nuxt.config.js`中修改head配置meta信息
```
head: {
  //title标签内容
  title: 'title',
  //html标签属性
  htmlAttrs: {
    lang: 'zh'
  },
  //meta标签
  meta: [
    { charset: 'utf-8' },
    { name: 'viewport', content: 'width=device-width, initial-scale=1' },
    { hid: 'description', name: 'description', content: '' },
    { name: 'format-detection', content: 'telephone=no' }
  ],
  //link标签
  link: [
    { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
  ]
}
```

## 路由

Nuxt依据pages目录结构自动生成vue-router模块的路由配置

### 基础路由

### 动态路由

### 路由参数校验

### 嵌套路由

## 异步数据

## 插件

## Vuex状态树

## 请求

## 打包/部署