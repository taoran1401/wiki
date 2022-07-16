# Golang

## Zap

### 简介

Zap是非常快的、结构化的，分日志级别的Go日志库

Zap提供了两种类型的日志记录器—Sugared Logger和Logger

在性能很好但不是很关键的上下文中，使用SugaredLogger。它比其他结构化日志记录包快4-10倍，并且支持结构化和printf风格的日志记录。

在每一微秒和每一次内存分配都很重要的上下文中，使用Logger。它甚至比SugaredLogger更快，内存分配次数也更少，但它只支持强类型的结构化日志记录。

### 使用

#### 安装

```
go get -u go.uber.org/zap
```

#### 打印日志

通过zap.NewProduction()、zap.NewDevelopment()、zap.NewExample()创建一个Logger

然后通过Debug()、Info()、Error()、Warn()来打印日志

> zap.NewProduction()
```go
logger, _ := zap.NewProduction()
logger.Info("info---")

//结果：{"level":"info","ts":1657854511.705913,"caller":"core/zap.go:9","msg":"info---"}
```

> zap.NewDevelopment()
```go
logger, _ := zap.NewDevelopment()
logger.Info("info---")

//结果：2022-07-15T11:09:17.586+0800    INFO    core/zap.go:10  info---
```

> zap.NewExample()
```go
logger := zap.NewExample()
logger.Info("info---")

// {"level":"info","msg":"info---"}
```

> 构造新的字段打印
```go
logger, _ := zap.NewProduction()
logger.Info("info---", zap.String("client", "app"), zap.String("loggerId", "1"))

//结果：{"level":"info","ts":1657856193.171507,"caller":"core/zap.go:16","msg":"info---","client":"app","loggerId":"1"}
```

> Zap Sync

TODO ~

### Sugared Logge

TODO ~


## viper

