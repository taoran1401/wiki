## flex布局

flex 是 Flexible Box 的缩写，就是弹性盒子布局的意思

> 特别注意：下面示例的代码通过`f12`查看即可

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

#### flex-direction

> 决定主轴的方向（即项目的排列方向）

> { flex-direction: row | row-reverse | column | column-reverse; }

`display: flex`设置后默认`flex-direction: row`, 主轴为水平方向，起点在左端; 效果展示：
<div style="display: flex; background-color: #f8f8f8; margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`flex-direction: row-reverse`, 主轴为水平方向，起点在右端; 效果展示：
<div style="display: flex; flex-direction: row-reverse; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`flex-direction: column`, 主轴为垂直方向，起点在上沿; 效果展示：
<div style="display: flex; flex-direction: column; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`flex-direction: column-reverse`, 主轴为垂直方向，起点在下沿; 效果展示：
<div style="display: flex; flex-direction: column-reverse; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

#### flex-wrap

> 决定一条轴线排不下后换行的方式

> { flex-wrap: nowrap | wrap | wrap-reverse; }

`flex-wrap: nowrap`默认，不换行; 效果展示：
<div style="display: flex; flex-wrap: nowrap; width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`flex-wrap: wrap`换行，第一行在上方; 效果展示：
<div style="display: flex; flex-wrap: wrap; width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`flex-wrap: wrap-reverse`换行，第一行在下方; 效果展示：
<div style="display: flex; flex-wrap: wrap-reverse; width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

#### flex-flow

> flex-flow属性是flex-direction属性和flex-wrap属性的简写形式，默认值为row nowrap


> { flex-flow: \<flex-direction\> || \<flex-wrap\>; }

#### justify-content

> 定义了项目在主轴上的对齐方式

> { justify-content: flex-start | flex-end | center | space-between | space-around; }

`justify-content: flex-start`默认； 左对齐, 效果展示：
<div style="display: flex;justify-content: flex-start; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`justify-content: flex-end` 右对齐, 效果展示：
<div style="display: flex;justify-content: flex-end;  width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`justify-content: center` 居中, 效果展示：
<div style="display: flex;justify-content: center;  width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

`justify-content: space-betweent` 两端对齐，项目之间的间隔都相等, 效果展示：
<div style="display: flex; justify-content: space-between;  width: 500px; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
</div>

`justify-content: space-around` 每个项目两侧的间隔相等。所以，项目之间的间隔比项目与边框的间隔大一倍, 效果展示：
<div style="display: flex; justify-content: space-around; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
</div>

#### align-items

> 定义项目在交叉轴上如何对齐

> { align-items: flex-start | flex-end | center | baseline | stretch; }

`align-items: stretch`：如果项目未设置高度或设为auto，将占满整个容器的高度, 效果展示：
<div style="display: flex;align-items: stretch; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 300px;line-height: 300px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px;line-height: 200px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; line-height: 160px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
</div>

`align-items: flex-start` 交叉轴的起点对齐, 效果展示：
<div style="display: flex;align-items: flex-start; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 300px;line-height: 300px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 200px;line-height: 200px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 160px;line-height: 160px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
</div>

`align-items: flex-end` 交叉轴的终点对齐, 效果展示：
<div style="display: flex;align-items: flex-end; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 300px;line-height: 300px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 200px;line-height: 200px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 160px;line-height: 160px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
</div>

`align-items: center`：交叉轴的中点对齐, 效果展示：
<div style="display: flex;align-items: center; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 300px;line-height: 300px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 200px;line-height: 200px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 160px;line-height: 160px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
</div>

`align-items: baseline`项目的第一行文字的基线对齐, 效果展示：
<div style="display: flex;align-items: baseline; background-color: #f8f8f8;margin: 0 0 55px;">
    <div style="width: 100px; height: 120px;vertical-align: middle;	background-color: #3075b9;font-size: 100px;color: white;text-align: center;text-decoration: underline;">1</div>
    <div style="width: 100px; height: 200px;line-height: initial; vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;text-decoration: underline;">2</div>
    <div style="width: 100px; height: 180px;line-height: 180px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;text-decoration: underline;">3</div>
    <div style="width: 100px; height: 150px;line-height: initial;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;text-decoration: underline;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;text-decoration: underline;">5</div>
</div>

#### align-content

> 定义了多根轴线的对齐方式。如果项目只有一根轴线，该属性不起作用。

> { align-content: flex-start | flex-end | center | space-between | space-around | stretch; }

`align-content: stretch` 默认； 轴线占满整个交叉轴, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: stretch; width: 500px; height: 600px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`align-content: flex-start` 交叉轴的起点对齐, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: flex-start; width: 500px; height: 600px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`align-content: flex-end` 与交叉轴的终点对齐, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: flex-end; width: 500px; height: 600px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`align-content: center` 与交叉轴的中点对齐, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: center; width: 500px; height: 600px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

`align-content: space-between` 与交叉轴两端对齐，轴线之间的间隔平均分布, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: space-between; width: 500px; height: 600px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>


`align-content: space-around` 每根轴线两侧的间隔都相等。所以，轴线之间的间隔比轴线与边框的间隔大一倍, 效果展示：
<div style="display: flex; flex-wrap: wrap; align-content: space-around; width: 500px; height: 800px; background-color: #f8f8f8;">
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">1</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">2</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">3</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">4</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">5</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">6</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">7</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">8</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">9</div>
    <div style="width: 100px; height: 100px;line-height: 100px;vertical-align: middle;	margin: 5px;background-color: #3075b9;font-size: 100px;color: white;text-align: center;">10</div>
</div>

### 项目属性

- order: 定义项目的排列顺序。数值越小，排列越靠前，默认为0。
- flex-grow: 定义项目的放大比例，默认为0，即如果存在剩余空间，也不放大
- flex-shrink: 定义了项目的缩小比例，默认为1，即如果空间不足，该项目将缩小
- flex-basis: 定义了在分配多余空间之前，项目占据的主轴空间（main size）。浏览器根据这个属性，计算主轴是否有多余空间。它的默认值为auto，即项目的本来大小。
- flex: 是flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto。后两个属性可选
- align-self: 允许单个项目有与其他项目不一样的对齐方式，可覆盖align-items属性。默认值为auto，表示继承父元素的align-items属性，如果没有父元素，则等同于stretch

#### order

> 定义项目的排列顺序。数值越小，排列越靠前，默认为0

> { order: \<integer\>; }

效果展示：
<div style="display: flex; width: 500px; background-color: #f8f8f8;">
    <div style="order: 0; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">1<div style="font-size: 14px;position: relative;top: -70px;">(order:0)</div></div>
    <div style="order: 3; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">2<div style="font-size: 14px;position: relative;top: -70px;">(order:3)</div></div>
    <div style="order: 2; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">3<div style="font-size: 14px;position: relative;top: -70px;">(order:2)</div></div>
    <div style="order: 1; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">4<div style="font-size: 14px;position: relative;top: -70px;">(order:1)</div></div>
</div>

#### flex-grow

> 定义项目的放大比例，默认为0，即如果存在剩余空间，也不放大

> 如果所有项目的flex-grow属性都为1，则它们将等分剩余空间（如果有的话）。如果一个项目的flex-grow属性为2，其他项目都为1，则前者占据的剩余空间将比其他项多一倍

> { flex-grow: \<number\>; /* default 0 */ }

效果展示
<div style="display: flex; width: 500px; background-color: #f8f8f8;">
    <div style="flex-grow: 0; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">1<div style="font-size: 14px;position: relative;top: -70px;">(flex-grow:0)</div></div>
    <div style="flex-grow: 2; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">2<div style="font-size: 14px;position: relative;top: -70px;">(flex-grow:2)</div></div>
    <div style="flex-grow: 1; width: 100px; height: 100px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">3<div style="font-size: 14px;position: relative;top: -70px;">(flex-grow:1)</div></div>
</div>

#### flex-shrink

> 定义了项目的缩小比例，默认为1，即如果空间不足，该项目将缩小

> 如果所有项目的flex-shrink属性都为1，当空间不足时，都将等比例缩小。如果一个项目的flex-shrink属性为0，其他项目都为1，则空间不足时，前者不缩小。
负值对该属性无效

> { flex-shrink: <number>; /* default 1 */ }

效果展示：
<div style="display: flex; background-color: #f8f8f8;">
    <div style="flex-shrink: 0; width: 400px; height: 200px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">1<div style="font-size: 14px;position: relative;top: -70px;">(flex-shrink:0)</div></div>
    <div style="flex-shrink: 1; width: 400px; height: 200px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">2<div style="font-size: 14px;position: relative;top: -70px;">(flex-shrink:1)</div></div>
    <div style="flex-shrink: 1; width: 400px; height: 200px;line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">3<div style="font-size: 14px;position: relative;top: -70px;">(flex-shrink:1)</div></div>
</div>

#### flex-basis

> 定义了在分配多余空间之前，项目占据的主轴空间（main size）。浏览器根据这个属性，计算主轴是否有多余空间。它的默认值为auto，即项目的本来大小。

> { flex-basis: \<length\>; | auto; /* default auto */ }

效果展示：
<div style="display: flex; background-color: #f8f8f8;">
    <div style="flex-basis: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">1</div>
    <div style="flex-basis: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">2</div>
    <div style="flex-basis: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">3</div>
</div>

#### flex

> 是flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto。后两个属性可选

>  { flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'> ] }

#### align-self

> 允许单个项目有与其他项目不一样的对齐方式，可覆盖align-items属性。默认值为auto，表示继承父元素的align-items属性，如果没有父元素，则等同于stretch

> 该属性可能取6个值，除了auto，其他都与align-items属性完全一致

> { align-self: auto | flex-start | flex-end | center | baseline | stretch; }

<div style="display: flex; background-color: #f8f8f8; height: 200px;">
    <div style="width: 100px; height: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">1</div>
    <div style="align-self: flex-end; width: 100px; height: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 24px;color: white;text-align: center;">flex-end</div>
    <div style="width: 100px; height: 100px; line-height: 100px;vertical-align: middle;margin: 5px;background-color: #3075b9;font-size: 50px;color: white;text-align: center;">3</div>
</div>

## css变量

### 声明变量

- `--`声明变量,如：`--header`
- 变量名区分大小写；`--header`和`--Header`是两个变量

`:root`是一个伪类选择器，用于选择HTML文档的根元素。在每个HTML文档中，只有一个根元素，通常是标签;

用`:root`选择器来定义一个CSS变量（--foo）并将其设置为red。这个变量可以在整个文档中使用。

```css
:root{
  --foo:red
}
```

### 使用变量

使用变量用`var(变量名, 默认值)`函数

```vue
<template>
  <div class="content">content</div>
</template>

<style>
:root{
  --foo-red:red
}
.content{
  /* 当没有变量时，使用第二个参数作为默认值 */
  color: var(--foo-red, blue);
}
</style>
```

### 全局变量和局部变量

- 全局变量
- 局部变量:定义某元素下的变量。只能在某元素身上，以及这个元素的内部的所有的标签去使用

示例：
```vue
<template>
  <div class="content">
    content
    <div>date</div>
  </div>
  <div class="floor">floor</div>
</template>

<style>
:root{
  /* 全局变量：在这里定义的css变量，叫做全局css变量。在任何选择器中，都可以去使用。 */
  --foo-red:red
}
.content{
  /* 使用全局变量 */
  color: var(--foo-red);
  /* 局部变量：只能在某元素身上，以及这个元素的内部的所有的标签去使用 */
  --content-color: blue;
}
.content div{
  /* 使用局部变量 */
  color: var(--content-color);
}
</style>
```

## 动画

### 定义动画
```css
@keyframes 动画名称 {
    from {
        background-color: red;
    }
    to {
        background-color: blue;
    }
}
```

- `@keyframes`: 关键帧，通过在动画序列中定义关键帧的样式来控制 `CSS` 动画序列中的中间步骤。和转换`transition`相比，关键帧`keyframes`可以控制动画序列的中间步骤。
- from: 动画的开始， 等同于`0%`
- to: 动画的结束，等同于`100%`

> 可以任意个变化： 通过`%`添加变话点， 如`25%`时的变化，`50%`时的变化

### 定义动画时长
```css
div{
    animation: 动画名称 5s;
}
```

上面示例：将动画绑定到`div`选择器，时长为5秒


### 动画属性

|属性|描述|
|-|-|
|@keyframes|规定动画。|
|animation|所有动画属性的简写属性。|
|animation-name|规定 @keyframes 动画的名称。|
|animation-duration|规定动画完成一个周期所花费的秒或毫秒。默认是 0。|
|animation-timing-function|规定动画的速度曲线。默认是 "ease"。|
|animation-fill-mode|规定当动画不播放时（当动画完成时，或当动画有一个延迟未开始播放时），要应用到元素的样式。|
|animation-delay|规定动画何时开始。默认是 0。|
|animation-iteration-count|规定动画被播放的次数。默认是 1。|
|animation-direction|规定动画是否在下一周期逆向地播放。默认是 "normal"。|
|animation-play-state|规定动画是否正在运行或暂停。默认是 "running"。|

### 案例：果冻按钮
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    html body{
      padding: 0;
      margin: 0;
    }
    /* 定义动画 */
    @keyframes jelly {
      0%, 100% {
        transform: scale(1, 1)
      }
      25% {
        transform: scale(0.9, 1.1)
      }
      50% {
        transform: scale(1.1, 0.9)
      }
      75% {
        transform: scale(0.95 1.05)
      }
    }
    button{
      animation: ani 5s;
      border: none;
      padding: 0.5rem 1rem;
      color: #fff;
      background-color: black;
    }
    button:hover{
      cursor: pointer;
      /* 动画 */
      animation: jelly 0.5s;
    }
  </style>
</head>
<body>
  <div style="width: 100px;height: 100px;text-align: center;line-height: 100px;background-color: rgb(192, 192, 192);">
    <!-- 按钮 -->
    <button>Jelly</button>
  </div>
</body>
</html>


代码：
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    html body{
      padding: 0;
      margin: 0;
    }
    /* 定义动画 */
    @keyframes jelly {
      0%, 100% {
        transform: scale(1, 1)
      }
      25% {
        transform: scale(0.9, 1.1)
      }
      50% {
        transform: scale(1.1, 0.9)
      }
      75% {
        transform: scale(0.95 1.05)
      }
    }
    button{
      animation: ani 5s;
      border: none;
      padding: 0.5rem 1rem;
      color: #fff;
      background-color: black;
    }
    button:hover{
      cursor: pointer;
      /* 动画 */
      animation: jelly 0.5s;
    }
  </style>
</head>
<body>
  <div style="width: 100px;height: 100px;text-align: center;line-height: 100px;background-color: rgb(192, 192, 192);">
    <!-- 按钮 -->
    <button>Jelly</button>
  </div>
</body>
</html>
```

### 案例：翻转飞机

<div class="box">
  <div class="plane"></div>
</div>
<style>
html,body {
  padding: 0;
  margin: 0;
}
.box {
  background-color: rgb(192, 192, 192);
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.plane {
  width: 2em;
  height: 2em;
  background-color: #fc2f70;
  transform: rotate(0);
  animation: flip 1s infinite;
}
@keyframes flip {
  50% {
    transform: rotateY(180deg);
  }
  100% {
    transform: rotateY(180deg) rotateX(180deg);
  }
}
</style>

代码：
```html
<div class="box">
  <div class="plane"></div>
</div>
<style>
html,body {
  padding: 0;
  margin: 0;
}
.box {
  background-color: rgb(192, 192, 192);
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.plane {
  width: 2em;
  height: 2em;
  background-color: #fc2f70;
  transform: rotate(0);
  animation: flip 1s infinite;
}
@keyframes flip {
  50% {
    transform: rotateY(180deg);
  }
  100% {
    transform: rotateY(180deg) rotateX(180deg);
  }
}
</style>
```


<!-- 
### calc()

`calc()`函数用于动态计算长度值
- 需要注意的是，运算符前后都需要保留一个空格，例如：width: calc(100% - 10px)；
- 任何长度值都可以使用calc()函数进行计算；
- calc()函数支持 "+", "-", "*", "/" 运算；
- calc()函数使用标准的数学运算优先级规则；

display:flex属性 justify-content: space-between和flex-flow:wrap一起使用的问题
https://blog.csdn.net/qq_38032300/article/details/89151490


after: 的使用
 -->


