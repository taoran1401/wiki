## 软件架构的概念

![](../../static/images/sa_001.png)

软件架构风格是描述某一特定应用领域中系统组织方式的惯用模式。架构风格定义一个系统家族，即一个体系结构定义一个词汇表和一组约束。词汇表中包含一些构件和连接件类型，而这组约束指出系统是如何将这些构件和连接件组合起来的。

软件架构为软件系统提供了一个结构、行为和属性的高级抽象，由构成系统的元素的描述、这些元素的相互作用、指导元素集成的模式以及这些模式的约束组成。

软件架构是项目干系人进行交流的手段，明确了对系统实现的约束条件，决定了开发和维护组织的组织结构，制约着系统的质量属性

软件架构使推理和控制的更改更加简单，有助于循序渐进的原型设计，可以作为培训的基础 

软件架构是<b>可传递和可复用的模型</b>，通过研究软件架构可能预测软件的质量 

> 架构设计就是需求分配，即将满足需求的职责分配到组件上

## 软件架构的建模

结构模型：以架构的构件、连接件和其他概念来刻画结构

框架模型：不太侧重描述结构的细节而更侧重于整体的结构

动态模型：系统的“大颗粒”的行为性质

过程模型：构建系统的步骤和过程

功能模型：由一组功能构件按层次组成，下层向上层提供服务

## 架构描述语言（ADL）

![](../../static/images/sa_033.png)

![](../../static/images/sa_034.png)

## 4+1模型

> 详细：[4+1模型](/note/rk/SE?id=uml41视图)

![](../../static/images/se_008.png)


## 软件架构风格

架构设计的一个核心问题是能否达到架构级的软件复用

架构风格反映了领域中众多系统所共有的结构和语义特性，并指导如何将各个构件有效地组织成一个完整的系统

架构风格定义了用于描述系统的术语表和一组指导构建系统的规则

Garlan和Shaw对通用软件架构风格进行了分类，他们将软件架构分为数据流风格、调用/返回风格、独立构件风格、虚拟机风格和仓库风格。
1. 数据流风格：数据流风格包括批处理序列和管道/过滤器两种风格。
2. 调用/返回风格：调用/返回风格包括主程序和子程序、数据抽象和面向对象，以及层次结构。
3. 独立构件风格：独立构件风格包括进程通信和事件驱动的系统。
4. 虚拟机风格：虚拟机风格包括解释器和基于规则的系统。
5. 仓库风格：仓库风格包括数据库系统、黑板系统和超文本系统。
6. 过程控制：闭环控制

### 数据流风格

![](../../static/images/sa_003.png)


### 调用/返回风格

![](../../static/images/sa_004.png)

![](../../static/images/sa_005.png)


#### 层次架构风格

上面已经对层次系统架构风格进行了初步介绍，下面将对几种经典的层次风格进行详细说明

![](../../static/images/sa_010.png)

- CS架构：架构是客户端和服务器架构，通过充分利用两端硬件环境的优势，将任务合理分配到Client端和Server端来实现。
- BS架构：架构是浏览器和服务器架构，用户工作界面是通过浏览器来实现，极少部分事务逻辑在前端（Browser）实现，但是主要事务逻辑在服务器端（Server）实现。

![](../../static/images/sa_011.png)

##### 两层C/S架构

![](../../static/images/sa_012.png)

##### 三层C/S架构

![](../../static/images/sa_013.png)

##### 三层B/S架构

![](../../static/images/sa_014.png)

##### MVC架构风格

![](../../static/images/sa_90.png)

##### MVP架构风格

> TODO

##### 混合架构风格

![](../../static/images/sa_015.png)

##### 富互联网应用(RIA)

![](../../static/images/sa_016.png)

### 独立构件风格

![](../../static/images/sa_006.png)

### 虚拟机风格

虚拟机风格的基本思想是人为构建一个运行环境，在这个环境之上，可以解析与运行自定义的一些语言，这样来增加架构的灵活性，虚拟机风格主要包括解释器和规则为中心两种架构风格。

1. 解释器：一个解释器通常包括完成解释工作的解释引擎，一个包含将被解释的代码的存储区，一个记录解释引擎当前工作状态的数据结构，以及一个记录源代码被解释执行进度的数据结构。具有解释器风格的软件中含有一个虚拟机，可以仿真硬件的执行过程和一些关键应用。解释器通常被用来建立一种虚拟机以弥合程序语义与硬件语义之间的差异。其缺点执行效率较低。典型的例子是专家系统。

2. 规则为中心：基于规则的系统包括规则集、规则解释器、规则/数据选择器及工作内存。

### 仓库风格(以数据为中心的风格)

![](../../static/images/sa_007.png)

仓库风格中构件分两种：
- 一种是中央数据结构，保存系统的当前状态；
- 另一种是独立构件，对中央数据存储进行操作。

### 闭环控制架构(过程控制)

![](../../static/images/sa_008.png)

### C2风格

![](../../static/images/sa_009.png)

## 基于服务的架构(SOA)

![](../../static/images/sa_017.png)

### 特点

![](../../static/images/sa_018.png)

### SOA的实现方式 - Web Service

![](../../static/images/sa_019.png)

### SOA的实现方式 - ESB

![](../../static/images/sa_020.png)

### SOA的实现方式 - 服务注册表

![](../../static/images/sa_021.png)

### SOA - 关键技术

功能和WSDL:

![](../../static/images/sa_022.png)

SOAP:

![](../../static/images/sa_023.png)

REST:

![](../../static/images/sa_024.png)

### 微服务

微服务可以讲是 SOA 的一种，但仔细分析与推敲，我们又能发现他们的一些差异。这
种差异表现在多个方面

![](../../static/images/sa_025.png)

![](../../static/images/sa_026.png)

![](../../static/images/sa_027.png)

![](../../static/images/sa_028.png)

![](../../static/images/sa_029.png)

![](../../static/images/sa_030.png)

## 模型驱动架构(MDA)

### 概念

MDA(Model Driven Architecture): 起源于分离系统规约和平台实现的思想
- Model: 客观事物的抽象表示
- Architecture: 构成系统的部件、连接件及其约束的规约
- Model-Driven: 使用模型完成软件的分析，设计，构建，部署，维护等各开发活动

<!-- ![](../../static/images/sa_031.png) -->

### 主要目标

- 可移植性(Portability)
- 互通性(interoperability)
- 可重用性(Reusability)

### MDA的3种核心模型

![](../../static/images/sa_032.png)

## 特定领域软件架构（DSSA）

### 基本活动

![](../../static/images/sa_035.png)

### 领域分析机制

![](../../static/images/sa_036.png)

### 建立过程

![](../../static/images/sa_037.png)

### 三层次模型

![](../../static/images/sa_038.png)

## 基于架构的软件设计(ABSD)

基于架构的软件设计(Architecture Based Software Development, ABSD): 把整个基于架构的软件过程划分为架构需求、设计、文档化、复审、实现、演化等 6 个子过程

![](../../static/images/sa_039.png)

### 基于架构的软件开发方法
 
![](../../static/images/sa_040.png)

![](../../static/images/sa_041.png)

![](../../static/images/sa_042.png)

## 软件架构评估

![](../../static/images/sa_045.png)

### 质量属性

![](../../static/images/sa_043.png)

![](../../static/images/sa_044.png)

### 基于场景的方式

![](../../static/images/sa_046.png)

#### SAAM

![](../../static/images/sa_047.png)

#### ATAM

架构权衡分析方法（Architecture Tradeoff Analysis Method）

![](../../static/images/sa_049.png)

### 质量效应树

![](../../static/images/sa_50.png)

## 软件产品线

![](../../static/images/sa_51.png)

### 过程模型 

#### 双生命周期模型

![](../../static/images/sa_52.png)

#### SEI模型

![](../../static/images/sa_53.png)

### 建立方式

![](../../static/images/sa_54.png)

### 组织结构

![](../../static/images/sa_55.png)

## 构件与中间件技术

![](../../static/images/sa_56.png)

### 概念

![](../../static/images/sa_57.png)

### 构件的复用

![](../../static/images/sa_58.png)

![](../../static/images/sa_59.png)

![](../../static/images/sa_60.png)

![](../../static/images/sa_61.png)

### 中间件

![](../../static/images/sa_62.png)

#### 优点

![](../../static/images/sa_63.png)

#### 公共对象请求代理体系结构(Corba)

![](../../static/images/sa_64.png)

![](../../static/images/sa_65.png)

![](../../static/images/sa_66.png)

## web架构设计

![](../../static/images/sa_67.png)

### 单台机器到数据库与web服务器分离

![](../../static/images/sa_68.png)

### 应用服务器集群

![](../../static/images/sa_69.png)

![](../../static/images/sa_70.png)

### 负载均衡技术

![](../../static/images/sa_71.png)
![](../../static/images/sa_72.png)
![](../../static/images/sa_73.png)

### 有状态与无状态

![](../../static/images/sa_74.png)

### 数据库读写分离化

![](../../static/images/sa_75.png)

### 用缓存缓解读库的压力

![](../../static/images/sa_76.png)

### 缓存技术

![](../../static/images/sa_77.png)

### redis与memcache的差异

![](../../static/images/sa_78.png)

### 缓存雪崩

![](../../static/images/sa_79.png)

### 缓存穿透

![](../../static/images/sa_80.png)

### 内容分发网络(CDN）

![](../../static/images/sa_81.png)

### XML与JSON

![](../../static/images/sa_82.png)
![](../../static/images/sa_83.png)

### web应用服务器

![](../../static/images/sa_84.png)

### 表述性状态传递(REST)

![](../../static/images/sa_85.png)

### 响应式web设计

![](../../static/images/sa_86.png)

## 中台

![](../../static/images/sa_87.png)
![](../../static/images/sa_88.png)
![](../../static/images/sa_89.png)


