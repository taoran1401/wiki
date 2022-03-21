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