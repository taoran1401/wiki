## 动态菜单

处理思路：通过查看代码找到加载路由的地方，将后端返回的数据拼装成对应格式让其加载

在`src/permission.js`可以看到以下代码,了解vuex的小伙伴已经知道是`store`的`modules`下的`permission.js`中的`generateRoutes`方法加载了路由
```
// generate accessible routes map based on roles
const accessRoutes = await store.dispatch('permission/generateRoutes', roles)

// dynamically add accessible routes
router.addRoutes(accessRoutes)
```

修改`src/store/modules/permission.js`,下面有中文注释的地方是新增或修改的内容
```
import { asyncRoutes, constantRoutes } from '@/router'
// 获取菜单接口
import { getInfo } from '@/api/user'
import Layout from '@/layout'

/**
 * 静态路由懒加载
 * @param view
 * @returns
 */
export const loadView = (view) => {
  return (resolve) => require([`@/views${view}`], resolve)
}

/**
 * 将后端获取的数据拼装(这里根据后端格式自行更改)
 * @param routes
 * @param data
 */
export function generaMenu(routes, data) {
  data.forEach(item => {
    const menu = {
      path: item.path === '#' ? item.menu_id + '_key' : item.path,
      component: item.component === '#' ? Layout : loadView(item.component),
      // hidden: true,
      children: [],
      name: 'menu_' + item.id,
      // meta: { title: item.name, id: item.id, roles: ['admin'] }
      meta: { title: item.name, id: item.id }
    }
    if (item.children) {
      generaMenu(menu.children, item.children)
    }
    routes.push(menu)
  })
}

/**
 * Use meta.role to determine if the current user has permission
 * @param roles
 * @param route
 */
function hasPermission(roles, route) {
  if (route.meta && route.meta.roles) {
    return roles.some(role => route.meta.roles.includes(role))
  } else {
    return true
  }
}

const state = {
  routes: [],
  addRoutes: []
}

const mutations = {
  SET_ROUTES: (state, routes) => {
    state.addRoutes = routes
    state.routes = constantRoutes.concat(routes)
  }
}

const actions = {
  generateRoutes({ commit }, roles) {
    return new Promise(resolve => {
      const loadMenuData = []
      // 先查询后台并返回左侧菜单数据并把数据添加到路由
      getInfo(state.token).then(response => {
        const data = response.data.menu
        Object.assign(loadMenuData, data)
        // 将后端获取的数据拼装
        generaMenu(asyncRoutes, loadMenuData)
        commit('SET_ROUTES', asyncRoutes)
        resolve(asyncRoutes)
      }).catch(error => {
        console.log(error)
      })
    })
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
```

后端返回数据格式
```
{
    "code": 200,
    "message": "OK",
    "data": {
        "id": 1,
        "account": "admin",
        "name": "超级管理员",
        "menu": [
            {
                "id": 67,
                "name": "文章管理",
                "p_id": 0,
                "path": "/article",
                "component": "#",
                "icon": "",
                "children": [
                    {
                        "id": 68,
                        "name": "文章列表",
                        "p_id": 67,
                        "path": "/article/lists",
                        "component": "/article/lists/lists",
                        "icon": ""
                    },
                    {
                        "id": 69,
                        "name": "文章分类列表",
                        "p_id": 67,
                        "path": "/article/categorys",
                        "component": "/article/categorys/lists",
                        "icon": ""
                    }
                ]
            },
            {
                "id": 77,
                "name": "系统管理",
                "p_id": 0,
                "path": "/config",
                "component": "#",
                "icon": "",
                "children": [
                    {
                        "id": 78,
                        "name": "网站设置",
                        "p_id": 77,
                        "path": "/configs",
                        "component": null,
                        "icon": ""
                    }
                ]
            }
        ],
        "roles": [
            "admin"
        ]
    }
}
```
