```go
//打印response内容
content, err := ioutil.ReadAll(resp.Body)
respBody := string(content)
```

```go
//定义一个map, 键的类型为string， 值的类型为任意
//interface{}可以标识任意类型
var c map[string]interface{}
```

```go
// get方式获取json数据
func Get() {
    var c map[string]interface{}
    url := "https://baidu.com/test"
    client := &http.Client{}
    req, err := http.NewRequest("GET", url, nil)
    checkErr(err)
    req.Header.Add("Content-Type", "application/json;charset=UTF-8")
    resp, err := client.Do(req)
    checkErr(err)
    defer resp.Body.Close()
    body, err := ioutil.ReadAll(resp.Body)
    checkErr(err)
    err = json.Unmarshal(body, &c)
    checkErr(err)
    fmt.Println(c)
}

func Post(value1, value2, value3 int)  {
    var c map[string]interface{}
    // 提交数据的url
    url := "https://baidu.com/test"
    client := &http.Client{}
    data := fmt.Sprintf("{\"key1\":%v,\"key2\":%v,\"key3\":%v}", value1, value2, value3)
    req, err := http.NewRequest("POST", url, bytes.NewBuffer([]byte(data)))
    checkErr(err)
    req.Header.Add("Content-Type", "application/json;charset=UTF-8")
    resp, err := client.Do(req)
    checkErr(err)
    defer resp.Body.Close()
    body, err := ioutil.ReadAll(resp.Body)
    checkErr(err)
    err = json.Unmarshal(body, &c)
    checkErr(err)
    fmt.Println(c)
}

//打印结构体
func printStruct() {
    
}
```


```go
//go自带工具go:generate, 会先扫描出该内容执行

//go:generate go env -w GO111MODULE=on
//go:generate go env -w GOPROXY=https://goproxy.cn,direct
//go:generate go mod tidy
//go:generate go mod download


go mod tidy
// 作用
// 引用项目需要的依赖增加到go.mod文件
// 去掉go.mod文件中项目不需要的依赖


// 拉取新包
go get xxxx
// 注意：使用新包后go mod vendor才会把包拉到本项目底下
go mod vendor
```

```
go管理包命令(mod)
viper使用
fsnotify: 文件监控
casbin
mysql/gorm
zap
rabbitmq
mongodb
redis
atom
```