## flex布局

flex 是 Flexible Box 的缩写，就是弹性盒子布局的意思

### flex容器

任意一个容易都可以指定为flex布局

```
# 行内元素可以使用inline-flex
.container {
    display: flex | inline-flex;
}
```

注意，设为 Flex 布局以后，子元素的float、clear和vertical-align属性将失效。

### 容器属性

- flex-direction：决定主轴的方向（即项目的排列方向）
- flex-wrap：决定一条轴线排不下后换行的方式
- flex-flow：属性是flex-direction属性和flex-wrap属性的简写形式，默认值为row nowrap
- justify-content：属性定义了项目在主轴上的对齐方式
- align-items：属性定义项目在交叉轴上如何对齐
- align-content：属性定义了多根轴线的对齐方式。如果项目只有一根轴线，该属性不起作用

### 项目属性

- order
- flex-grow
- flex-shrink
- flex-basis
- flex
- align-self