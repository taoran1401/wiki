问答题：
---
37: 
主要包含的阶段有：
领域分析：这个阶段主要获取领域模型；
领域设计：这个阶段主要获取特定领域软件架构(DSSA)
领域实现: 这个阶段主要利用领域模型和特定领域软件架构(DSSA)开发和组织可复用信息

38：
答：


39：
答: 
可用性：构件必须易于理解和使用
质量：构件及其变形必须能正常工作
可移植性：构件应能在不同硬件运行平台和软件环境中工作
适应性：构件应该易于通过参数化等方式在不同语境中进行配置
可变性：构件应能针对不同应用系统，只需对其可变部分进行适当的调节


44：
答: 
联邦服务：提供将各种数据整合的能力，它支持关系型数据，也支持xml数据，文本数据和内容数据等非关系型数据；所有的数据仍然按照自己本省的方式管理。
复制服务：提供远程数据的本地访问能力，它通过自动的实时复制和数据转换，在本地维护一个数据源的副本。本地数据和数据源在技术实现上是可以独立的
转换服务：用于数据源格式到目标格式的转换，可以使批量的或者是基于记录的
搜索服务：提供对企业数据的查询和检索服务，即支持结构化数据也支持非机构化数据

45：
答：
对于服务粒度的控制
对于无状态服务的设计

47：
用户图包括的基本元素：
参与者：表示系统与系统外部交互的实体，可以是使用系统的用户，也可以是外部系统或外部设备的实体等
用例：表示系统提供的服务，它定义了系统是如何被参与者所使用的
通信关联：表示参与者与用例的关系，或者用例与用例的关系

48：
构件用例模型经历的几段：
识别参与者
合并需求获得用例
细化用例描述
调整用例模型

57：
(1) 可用性
(2) 可修改性
(3) 1
(4) 2
(5) 12
(6) 4
(7) 7
(8) 3

58:
敏感点：
权衡点：a
风险点：d,b
非风险点：c

59:
ATSM在SAAM的基础上发展起来的，主要针对性能、实用性、安全性、可修改性，在系统开发之前对这些质量属性进行评价和折中：
第一阶段：场景和需求收集
第二阶段：架构视图和场景实现
第三阶段：属性模型构造和分析
第四阶段：折中

60:
该类图属于分析类

61：
包含关系：
扩展关系：
泛化关系：

63：
mysql属于关系型数据库，实际应用中一般用于操作数据存储； redis属于nosql,实际应用中一般用来做大数据量和高及时性的数据存储

该案例属于物联网应用，建议增加nosql数据库提高数据存储的容量和即时性

65：
可以通过一下方法提高数据访问性能：
减少数据访问： 反范式、冗余、增加缓存
返回更少的数据：分页、裁剪非必要返回
减少交互次数：使用存储过程多返回
减少cpu开销：优化业务逻辑
利用更多资源：主从集群，读写分离

69：
(1) 紧急状态感知
(2) 跌落检测
(3) 航向测量
(4) 单目视觉避障系统
(5) 扫地及吸尘单元

70：
(1) 5
(2) 4
(3) 2
(4) 3
(5) 6
(6) 7

72：
性能：指系统的响应能力
可用性：指系统能够正常运行的时间比例
安全性：指系统在向正常用户提供服务的同时能够阻止非授权用户的企图或拒绝服务的能力
可修改性：指能够以快速度较高的性能价格比对系统进行变更的能力
可靠性：指软件系统在应用或错误面前，在意外或错误使用的情况下维持软件系统的功能特征的基本能力
可变性：指体系结构经扩充或变更成新体系结构的能力
功能性：指系统所能完成所期望工作的能力

73：
(1) 性能, 可采用：资源调度，并发控制
(2) 安全性， 可采用：追踪审计、攻击检测
(3) 可用性，可采用：Ping/Echo, 心跳
(4) 可修改性，可采用：信息隐藏，延迟绑定

95：
会导致更新异常，比如当代理商的信息变更后，而机票代理中的代理商名称和电话没有变化导致数据不一致
解决方法：当代理商修改后同时修改机票代理中的代理商相关信息

96：
(1) 代理商1售票成功，代理商2售票失败； 因为代理商1先售出票，代理商2剩余票数减1时无票可售
(2) 并发操作带来的不一致问题具体位置： 丢失修改、读脏数据、不可重复读

97：
(1) 加写锁
(2) 加读锁
(3) 加写锁
(4) 阻塞
(5) 得到通知
(6) 加写锁

读写锁会造成互相阻塞，使得用的操作串行化，降低了系统的并发性能，当锁设计不好的情况可能会出现死锁

101:
(1) f
(2) 性能
(3) g
(4) h
(5) b

102
(1) 星型
(2) 数据流
(3) 数据流驱动
(4) 模型适配

116：
(1) 性能
(2) 可用性
(3) b
(4) c
(5) f
(6) g

117:
权衡点： i
敏感点：e
风险点：m

118：
这四种质量属性分别可用以下设计策略实现：
性能：资源调度、优先级队列
可用性：冗余、心跳
可修改性：信息隐藏、运行时注册
安全性：追踪审计、限制访问

122：
(1) 弱一致性
(2) 结构化数据
(3) 强事务性
(4) 强
(5) 有限数据

123：
答：Memcache只支持key-value的数据类型，无法持久化、memcache需要通过hash一致化来支持主从结构
redis支持string,list,set,zset,hash等多种数据类型，支持持久化、redis则支持多种方式，主从、sentinel、cluster等

124：
(1) 安全性
(2) 可修改性
(3) e
(4) j
(5) h
(6) k

125:
可修改性：
面向对象风格通过编写新的规则实现代码，并通过重启或热加载添加规则，可修改性稍差。
解释器风格通过编写新的规则文件，并通过导入资源或外部配置添加规则，可修改性较好。
灵活性：
面向对象通过策略模式定义规则对象，规则以程序逻辑实现，灵活性较差
解释器风格可灵活定义规则计算表达式，灵活性好
性能：
面向对象以编译后的代码运算规则，性能好
解释器风格需要加载规则、解析规则、规则运算、最终得出结果，性能较差

132：
李工的同步方案：
更新数据时在同一个事务内依次完成删除缓存、更新数据库再写入缓存
张工的异步准实时方案：
更新数据时在同一事务内首先通过消息队列发布更新的消息给缓存服务器，在更新数据库；缓存更新服务订阅消息队列，待收到更新事件执行缓存更新

项目数据量大，并且有较高的性能要求时，张工的异步准实时方案更好

138：
(1) f
(2) 性能
(3) g
(4) h
(5) b

139:
(1) 星型
(2) 数据流
(3) 数据流驱动
(4) 模型适配

147：
(a) 弱一致性
(b) 非结构化
(c) 弱事务性
(d) 海量数据

153：
可用性、安全性、性能、可修改性、可靠性、可变性、功能性、可操作性

154：
(1) a,b
(2) c,f
(3) g,e
(4) d,h
(5) i
---
2022下：
4.1
1）
机票代理中的代理商名称和客服电话在代理商中也存在，票价在航班也存在，当修改代理商和航班票价时会造成与机票代理信息不一致的情况
2）
解决方法可以通过程序代码或者触发器在修改代理商或航班票价的信息时,同时修改机票代理中的代理商名称、客服电话和票价

4.2
1）
代理商1成功售票，代理商2售票失败，因为代理商1比代理商2先提交事务
2）
脏读：有情况读取到其他并发处理前的数据
不可重复读：同一个数据多次读取到的信息可能不一致
丢失修改：可能之前的并发操作修改的数据被其他并发的落后操作给覆盖

4.3
(1) 加写锁
(2) 加读锁
(3) 加写锁
(4) 被阻塞
(5) 唤醒
(6) 加写锁

读写锁机制的缺点：可能造成死锁，当两个事务都同时给相互所需资源添加了锁导致两边都无法执行。

2.1
设计类通常分为：创建型、结构型和行为型

创建型：主要用于类的创建，比如批量创建类的工厂模式，能够防止重复创建相同类的单例模式等
结构型：主要针对类结构的处理，比如可以在原有类的基础上通过调整结构动态添加功能的装饰器模式，还可以将类的抽象和实现分离的桥接模式等
行为型：主要针对类的行为处理，比如以命令形式执行的命令模式，将类作为状态的状态模式

根据题干描述可将用户签收商品设计为观察者模式，当用户签收后修改订单状态；支付类可添加策略模式，当用户选择不同支付时调用不同的支付类

2.2

2.3
(a) 提交订单
(b) 订单待支付
(c) 30分钟内未进行支付
(d) 订单生效
(e) 用户签收商品，交易完成

---
1.1
(1) 安全性
(2) 可修改性
(3) e
(4) j
(5) h
(6) k

1.2
答：
面向对象添加或更改规则是需要重新开发代码，并且需要重新编译和重启服务，可能改性和个性化折扣定义灵活性较为麻烦，风险也比较大。解释器的规则调整可通过修改配置来完成，不需要重新开发代码和重启，可能改性上和个性化折扣定义灵活性较高

面向对象通过编译后执行，系统性能较高。虚拟机风格需要每次解析配置系统性能相对较低。

综合来来看该系统更适合使用解释器风格。
---
敏感点，风险点，权衡点
- 风险点：系统架构风险是指在架构设计中潜在的、存在问题的架构决策所带来的的隐患
- 敏感点：是指为了实现某种特定的质量属性，一个或多个构件所具有的特性
- 权衡点：是影响多个质量属性的特性，是多个质量属性的敏感点

简述ATAM架构评估方法的主要过程
第一阶段：需求和场景收集；收集需求，收集场景，约束场景
第二阶段：架构视图和场景实现；描述架构视图，实现场景
第三阶段：质量模型分析； 特定属性分析
第四阶段：折中； 标志折中，标志敏感度


质量属性有哪些？：
性能：
  - 指系统的响应能力
  - 设计策略：资源调度，优先级队列，引入并发机制
可用性：
  - 指系统能够正常运行的时间比例。
  - 设计策略：主动冗余、进程监视器、Ping/Echo
可修改性
  - 指能够快速的以较高的性能价格比对系统进行变更的能力
  - 设计策略：信息隐藏、抽象、运行时注册、限制通信途径
  - 包含四个方面：
    - 可维护性
    - 可扩展性
    - 可移植性
    - 结构重组
安全性：
  - 指系统在向合法用户提供服务的同时能够阻止非授权用户的企图或拒绝服务的能力；
  - 设计策略：追踪审计、限制访问、用户认证、用户授权
  - 又可划分：
    - 机密性
    - 完整性
    - 不可否认性
    - 可控性
可靠性：
  - 指软件系统在应用或错误面前，在意外或错误使用的情况下维持软件系统的功能特性的基本能力。主要考虑两个方面：容错、健壮性
可变性：
  - 指体系结构经扩充或变更成为新体系结构的能力
功能性：
  - 指系统所能完成所期望功能的能力
互操作性：
  - 指作为系统组成部分的软件不是独立存在的，经常与其他系统或自身环境相互作用

用例图包含的基本元素
- 参与者:指存在于系统外部并与系统交互的任何事务，即可以是使用系统的用户，也可以是前台外部系统和设备等外部实体
- 用例:用例表示系统所提供的服务，它定义了系统是如何被参与者所使用的。
- 通信关联: 通信关联表示的是用于与参与者之间的关系，或者用例与用例之间的关系

在OOA方法中，构件用例模型需要经历的几个阶段
- 识别参与者
- 合并需求获得用例
- 细化用例描述
- 调整用例模型

UML中的关系，以及代表的含义
- 包含关系：当可以从两个或两个以上的用例中提取公共行为时，应该使用包含关系表示他们
- 扩展关系：当一个用例明显混合了两种或两种以上的不同场景，这可以将这个用例分为一个基本用例和一个或多个扩展用例
- 泛化关系：当多个用例共同拥有一种类似的结构和行为的时候，可以将它们的共性抽象成为父用例，其他的用例作为泛化关系中的子用例

4+1模型
- 用例视图：最初称为场景视图，关注最终用户需求，得到需求分析模型
- 进程视图：关注进程、线程及相关的并发、同步、通信等问题，系统集成人员
- 开发视图/实现视图：关注物理代码和组件；程序员，系统开发人员
- 部署视图/物理视图：关注软件到硬件的映射；系统和网络工程
- 逻辑视图：关注

设计模式分类和作用
- 创建型：主要用于创建类，为设计类实例化新对象提供指南
- 结构型：主要用于处理类或对象的组合，对类如何设计以形成更大的结构提供指南
- 行为型：主要用于描述类或对象的交互以及职责分配，对类之间交互以及分配责任的方式提供指南

典型设计模式的类图，简要说明和速记关键字
- 主要学习类图
  - 桥接(https://blog.csdn.net/qq_42765068/article/details/107170899)
  - 工厂模式(https://blog.51cto.com/u_2837193/4904058)
  - 命令(https://blog.51cto.com/u_2837193/4904058)
  - 门面(https://blog.51cto.com/u_2837193/4904058)

关系型数据库和nosql的特征比较

|特征|关系数据库|Nosql数据库|
|-|-|-|
|数据一致性|实时一致性|弱一致性|
|数据类型|结构化数据|非结构化|
|事务|高事务性|弱事务性|
|水平扩展|弱|强|
|数据容量|有限数据|海量数据|

nosql数据库的分类以及各自的特点
- 键值存储数据库：简单、易部署。但是对部分值查询或修改时效率低下；
- 列存储数据库：通常用来应用分布式存储的海量数据。
- 文档型数据库
- 图形数据库

流程图和数据流图的含义和区别

- 数据流图：是一种图形化工具，用来说明业务处理过程、系统边界内所包含的功能和系统中的数据流
- 流程图：以图形化的方式展示应用程序从数据输入开始到获得输出为止的逻辑过程，描述处理过程的控制流

两者区别：
- 数据流图中的处理过程可并行；流程图在某个时间点只能处于一个处理过程
- 数据流图展现系统的数据流； 流程图展现系统的控制流
- 数据流图展现全局的处理过程，过程之间遵循不同的设计标准； 流程图中处理过程遵循一直的设计标准
- 流程图适用于系统分析中的逻辑建模阶段； 流程图适用于系统设计中的物理建模阶段


c/s架构和b/s架构各自的优缺点
C/S架构的优点：
- 客户机应用程序与服务程序分离，二者开发即可以分开进行，也可以同时进行
- 技术成熟，允许网络分布操作，交互性强，具有安全的存取模式
- 网络压力小，响应速度快，有利于处理大量数据
- 模型思想简单，易于人们理解和接收等

C/S架构的缺点：
- 客户机与服务器的通信依赖于网络，服务器的负荷过重
- 无法实现快速部署和安装，维护工作量打，升级困难
- 开发成本较高，客户端程序设计复杂，灵活性差
- 用户界面风格不一，软件移植和数据集成困难
- 数据库的安全性因客户机程序直接访问而降低等

B/S架构的优点：
- 易于部署、维护和升级
- 具有良好的开放性和可扩充性，可以应用在广域网上，方便了信息的全球传输、查询和发布
- 可跨平台操作，无需开发客户端软件
- 通过JDBC等数据库连接接口，提高了动态交互性、服务器的通过性与可移植性等

B/S架构的缺点：
- 数据的动态交互性不强，不利于在线事务处理(OLTP)应用
- 数据查询等响应速度较慢
- 系统的安全性较难以控制等

特定领域架构主要包含哪些阶段以及每个阶段的目标
- 领域分析：获得领域模型；领域模型描述领域中系统之间的共同需求，即领域需求
- 领域设计：获得特定领域架构，DSSA描述领域模型中表示需求的解决方案
- 领域实现：通过领域模型和特定领域脚骨开发和组织可重用信息，并对基础软件架构进行实现

sql优化常见策略(不限于以下)
- 建立物化视图或尽可能减少多表查询
- 以不相干的子查询代替相干子查询
- 只检索需要的列
- 用带IN的条件子句等价替换OR子句
- 经常提交COMMIT，以尽早释放锁

提高数据访问性能
- 减少数据访问：原理是减少磁盘访问，策略实施：反范式、冗余、增加缓存
- 返回更少数据：原理是减少网络传输，策略实施：分页，裁剪非必要返回
- 减少交互次数：原理是减少网络传输，策略实施：使用存储过程多返回
- 减少CPU开销：原理是减少CPU内存开销，策略实施：优化业务逻辑
- 利用更多资源：原理是增加可利用资源，策略实施：主从集群，命令查询分离

软件开发模型：统一过程、螺旋模型（了解）

什么是架构风格
软件架构风格是指描述特定软件系统组织方式的惯用模式。组织方式描述了这些组成构件和这些构件的组织方式。惯用模式则反应众多系统共有的结构和语义。

架构风格有哪些，使用场景
- 数据流风格
  - 管道-过滤器
  - 批处理
- 虚拟机风格
  - 解释器
  - 规则为中心
- 调用/返回风格
  - 主子程序
  - 面向对象
  - 层架架构
- 独立构件风格：
  - 进程通信
  - 事件驱动(隐式调用)
- 仓库风格：分为两种，一种是中央数据库结构，保存当前系统状态；另一种是独立构件，对中央数据库存储进行操作。
  - 黑板
  - 数据库系统
  - 超文本系统
- 过程流程
- C2

基于服务的架构SOA
SOA是一种应用体系结构，在这种体系结构中，所有功能都定义为独立服务，这些服务带有定义明确的可调用的接口。能够以定义好的顺序调用这些服务来形成业务流程


企业集成
- 界面集成
- 应用集成(控制集成，api集成)
- 过程集成
- 消息传递
- 共享数据
- 文件传输

---







