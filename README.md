# 一、算法



# 二、数据结构



# 三、设计模式

## 3.1 面向对象

## 3.2 类之间的关系

> 类之间的关系可以用UML表示，如[PlantUML](https://plantuml.com/zh/class-diagram)

> 面向对象设计类之间的关系主要由五种，耦合（当一个类发生改变，对其他类造成的影响程度）从低到高依次为：依赖 < 关联 < 聚合 < 组合 < 泛化

* 依赖（Dependency）

  理解：类A要完成某个功能引用了类B,则类A依赖类B，这里的引用除了：类B的实例等不能作为类A的属性

  example：项目运行，需要有一台启动的电脑

  ```mermaid
  classDiagram
      Computer <|.. Program
      class Program {
          +run()
      }
      class Computer {
          +start()
      }
  ```

  ~~~php
  <?php
  
  declare(strict_types=1);
  
  class Computer
  {
      public static function start()
      {
          echo '电脑启动成功';
      }
  }
  
  class Program
  {
      public function run()
      {
          Computer::start();
          echo '项目运行成功';
      }
  }
  ~~~

  

* 关联（Association）

  理解：类F知道类S，可以用关联，具体表现为：类S作为类F的一个属性，而属性是一种更紧密的耦合，更为长久的持有关系，如：依赖关系是当类的方法被调用时而产生，随着方法调用结束而结束；关联关系是在类实例化的时候产生，类对象被销毁时结束，相比依赖，关联关系的生存期更长

  example：财务发工资需要知道工资单

  ```mermaid
  classDiagram
      Salary <|-- Finance
      class Salary {
          +getSalary()
      }
      class Finance {
          -Salary salary
          +payoff()
      }
  ```

  ```php
  <?php
  
  declare(strict_types=1);
  
  class Salary
  {
      /**
       * 获取工资
       *
       * @return float
       */
      public function getSalary(): float
      {
          return 3000;
      }
  }
  
  class Finance
  {
      private ?Salary $salary = null;
  
      /**
       * 工资支付
       */
      public function payOff(Salary $salary)
      {
          $this->salary = $salary;
          echo sprintf('工资支付：%04.2f元', $this->salary->getSalary());
      }
  }
  ```

  

* 聚合（Aggregation）

  理解：聚合用来表示集体与个体之间的关系，它表示一种弱的拥有关系，表示A对象可以包含B对象，但是B对象不是A对象的一部分，具体表现为：若B聚合得到A，A类中包含一个值为B类对象集的属性

  example：班级由多个学生聚合而成

  ```mermaid
  classDiagram
      Classes o-- Student
      class Student {
         -no
         -name
         +setNo()
         +getNo()
         +setName()
         +getName()
      }
      class Classes {
          -array stuObjArray
          +addStudent()
          +getStudents()
      }
  ```

  ```php
  <?php
  
  declare(strict_types=1);
  
  class Student
  {
      private int $no;
      private string $name;
  
      /**
       * @return int
       */
      public function getNo(): int
      {
          return $this->no;
      }
  
      /**
       * @param int $no
       */
      public function setNo(int $no): void
      {
          $this->no = $no;
      }
  
      /**
       * @return string
       */
      public function getName(): string
      {
          return $this->name;
      }
  
      /**
       * @param string $name
       */
      public function setName(string $name): void
      {
          $this->name = $name;
      }
  }
  
  class Classes
  {
      private array $stuObjArray = [];
  
      public function addStudent(Student $student)
      {
          $this->stuObjArray[] = $student;
      }
  
      public function getStudents(): array
      {
          return $this->stuObjArray;
      }
  }
  
  $classes = new Classes();
  
  $stu1 = new Student();
  $stu1->setNo(1);
  $stu1->setName('张三');
  $classes->addStudent($stu1);
  
  $stu2 = clone $stu1;
  $stu2->setNo(2);
  $stu2->setName('李四');
  $classes->addStudent($stu2);
  
  var_dump($classes->getStudents());
  ```

  

* 组合（合成，Composition）

  理解：组合用来表示整体与组成部分之间的关联关系，它表示一种强的拥有关系，体现了严格的部分和整体的关系，部分和整体的生命周期一样，具体表现为：若A类由B类和C类组合而成，则A类拥有成员属性B类引用和C类引用，且A类，B类，C类应一起初始化表示相同的生命周期

  example：电脑由主机加显示器组合而成

  ```mermaid
  classDiagram
      Computer *-- Host
      Computer *-- Displayer
      class Host {
         -mainbord
         -cpu
         +setMainbord()
         +getMainbord()
         +setCpu()
         +getCpu()
      }
      class Displayer {
         -control
         -lcd
         +setControl()
         +getControl()
         +setLcd()
         +getLcd()
      }
      class Computer {
          -Host host
          -Displayer displayer
          +Computer()
          +setHost()
          +setDisplayer()
          +getComputer()
      }
  ```

  ```php
  <?php
  
  declare(strict_types=1);
  
  class Host
  {
      /**
       * 主板
       *
       * @var string
       */
      private string $mainbord;
  
      /**
       * cpu
       *
       * @var string
       */
      private string $cpu;
  
      /**
       * @return string
       */
      public function getMainbord(): string
      {
          return $this->mainbord;
      }
  
      /**
       * @param string $mainbord
       */
      public function setMainbord(string $mainbord): void
      {
          $this->mainbord = $mainbord;
      }
  
      /**
       * @return string
       */
      public function getCpu(): string
      {
          return $this->cpu;
      }
  
      /**
       * @param string $cpu
       */
      public function setCpu(string $cpu): void
      {
          $this->cpu = $cpu;
      }
  }
  
  class Displayer
  {
      /**
       * 液晶模块
       *
       * @var string
       */
      private string $lcd;
  
      /**
       * 控制板
       *
       * @var string
       */
      private string $control;
  
      /**
       * @return string
       */
      public function getLcd(): string
      {
          return $this->lcd;
      }
  
      /**
       * @param string $lcd
       */
      public function setLcd(string $lcd): void
      {
          $this->lcd = $lcd;
      }
  
      /**
       * @return string
       */
      public function getControl(): string
      {
          return $this->control;
      }
  
      /**
       * @param string $control
       */
      public function setControl(string $control): void
      {
          $this->control = $control;
      }
  }
  
  class Computer
  {
      private ?Host $host;
      private ?Displayer $displayer;
  
      public function __construct()
      {
          $this->host = new Host();
          $this->displayer = new Displayer();
      }
  
      public function setHost(string $mainbord, string $cpu)
      {
          $this->host->setMainbord($mainbord);
          $this->host->setCpu($cpu);
      }
  
      public function setDisplayer(string $lcd, string $control)
      {
          $this->displayer->setLcd($lcd);
          $this->displayer->setControl($control);
      }
  
      public function getComputer(): array
      {
          return [
              'host.mainbord' => $this->host->getMainbord(),
              'host.cpu' => $this->host->getCpu(),
              'displayer.lcd' => $this->displayer->getLcd(),
              'displayer.control' => $this->displayer->getControl()
          ];
      }
  }
  
  $computer = new Computer();
  $computer->setHost('英特尔i7', 'i7xxx');
  $computer->setDisplayer('飞利浦lcd', '飞利浦control');
  
  var_dump($computer->getComputer());
  ```

  

* 泛化（Generalization）

  理解：泛化指的是类与类之间的继承关系和类与接口之间的实现关系，依赖、关联、聚合、组合是逻辑上的关联，泛化是物理上的关联，所以耦合最强

  example：白天鹅继承丑小鸭后会飞

  ```php
  <?php
  
  declare(strict_types=1);
  
  interface Flyable
  {
      public function fly();
  }
  
  class Duck
  {
      protected string $name = '丑小鸭';
  
      public function swing()
      {
          echo $this->name . 'can swing';
      }
  
      /**
       * 利用反射获取技能
       *
       * @return array
       */
      public function getSkills(): array
      {
          $skills = null;
          $reflect = new ReflectionClass($this);
          $methods = $reflect->getMethods();
  
          foreach ($methods as $method) {
              if ($method->name !== 'getSkills') {
                  $skills[] = $method->name;
              }
          }
  
          return $skills;
      }
  }
  
  class Swan extends Duck implements Flyable
  {
      protected string $name = '白天鹅';
  
      public function fly()
      {
          echo $this->name . 'can fly';
      }
  }
  
  $duck = new Duck();
  $duckSkills = $duck->getSkills();
  
  $swan = new Swan();
  $swanSkills = $swan->getSkills();
  
  var_dump($duckSkills);
  var_dump($swanSkills);
  ```

  

## 3.3 设计模式七大原则

* 单一职责

  一个类只负责一个功能领域中的相应职责，或者可以定义为：就一个类而言，应该只有一个引起它变化的原因

  单一职责原则是实现高内聚、低耦合的指导方针

* 开闭

  一个软件实体应当对扩展开放，对修改关闭，即软件实体应尽量在不修改原有代码的情况下进行扩展

  抽象化是开闭原则的关键，可以为系统定义相对稳定的抽象层，将不同的实现转移到具体的实现层中完成，这样当需要改动系统，无需改动抽象层，只需要增加新的具体类来实现新的需求

* 里氏替换

  所有引用基类的地方必须能透明地使用其子类对象，反之不成立

  里氏替换原则是对开闭原则的补充，也是实现开闭原则的重要方式之一，由于使用基类对象的地方都可以使用子类对象，因此在程序中应尽量使用基类类型来定义对象，而在运行时再确定其子类类型，用子类对象替代基类对象

  重点：为了确保该原则的应用，一个具体类应当只实现接口或抽象类中声明过的方法，而不要给出多余的方法，否则无法调用到在子类中新增的方法

* 依赖倒转

  抽象不应该依赖于细节，细节应该依赖于抽象，即应针对接口编程，而不是针对实现编程

  开闭原则是目标，里氏替换是基础，依赖倒转是手段，三者一般同时出现，它们相辅相成，互相补充，目标一致

  依赖倒转原则要求在我们的程序中，尽量引用层次更高的抽象层，而不是具体实现层

  重点：为了确保该原则的应用，一个具体类应当只实现接口或抽象类中声明过的方法，而不要给出多余的方法，否则无法调用到在子类中新增的方法

* 接口隔离

  尽可能使用多个专门的接口，避免使用单一的总接口，即客户端不应该依赖于那些它不需要的接口

  不要在一个接口里面放很多方法，这样类会很臃肿，接口应尽量细化，一个接口对应一个功能模块，同时接口里面的方法应尽可能少，使接口更加轻便灵活

* 迪米特

* 合成复用

## 3.4 设计模式分类

### 3.4.1 创建型设计模式

#### ① 简单工厂

#### ② 工厂方法

#### ③ 抽象工厂

#### ④ 单例

#### ⑤ 原型

#### ⑥ 对象池

#### ⑦ 建造者

### 3.4.2 结构型设计模式

#### ① 适配器

#### ② 桥接

#### ③ 过滤器

#### ④ 组合

#### ⑤ 装饰器

#### ⑥ 外观

#### ⑦ 享元

#### ⑧ 代理

### 3.4.3 行为型设计模式

#### ① 策略

#### ② 空对象

#### ③ 访问者

#### ④ 状态

#### ⑤ 责任链

#### ⑥ 中介者

#### ⑦ 备忘录

#### ⑧ 观察者

#### ⑨ 命令

#### ⑩ 解释器

#### ⑪ 迭代器

#### ⑫ 解释器



# 四、操作系统



# 五、计算机网络



# 六、Leetcode





