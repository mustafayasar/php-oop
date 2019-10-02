# PHP OOP (Object Oriented Programming)
Türkçe'ye Nesne Yönelimli Programlama diye çevrilen OOP, PHP dünyasına PHP 5 ile birlikte girmiştir.
PHP 7 ile birlikte ise bir çok şey geliştirilmiş, ve modern bir yapı haline gelmiştir. 
Ben bu gibi detaylara girmeyeceğim, PHP 7'ye göre örneklerle anlatacağım. 

[Design Patterns (Tasarım Desenleri)](https://github.com/mustafayasar/php-design-patterns) konusunu örneklerle paylaştıktan sonra hiç bilmeyenler için OOP konusuna da değinemenin iyi olacağını düşündüm.
Basit konuları hızlı geçip, örneklerle zenginleştirmeyi planlıyorum.

Şimdi başlıklar ve örnekler ile bu konuyu işleyelim.

* Başlamadan önce şunu belirtmek isterim ki; 
Yazılım dünyasındaki bazı terimlerin Türkçe karşılıklarını yazmak çoğu zaman sorun oluyor. 
Ya çeviri yetersiz kalıyor, ya da bir kaç farklı karşılık bulabiliyor.
Ben elimden geldiğince ülkemizdeki en genel kullanımları -bazen Türkçe, bazen İngilizce- kullacağım.

## Başlangıç
Bir sınıf tanımlarken örnekte göründüğü üzere **class** tanımlamasını kullanıyoruz.
Sınıfa ait değişkenleri ve metodları da örnekte görüldüğü şekilde oluşturuyoruz. 
Normal bir değişken ve metod oluşturmaktan tek farkı başında **public** tanımlaması.
Bir kaç başlık aşağıda bunun ne anlama geldiğini göreceğiz. O zamana kadar **public** gördüğünüz yerlere takılmayın.

```php
class ClassA
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function aMethod() {
        return 'this is a method';
    }
}
```

Bir sınıfı ve sınıfa ait öğeleri de aşağıdaki gibi çağırıyoruz.

```php
$a = new ClassA();

echo $a->var;

echo $a->aMethod();
```

bkz. [1-basic.php]()

## Properties and Constants
Properties ve Constants arasındaki fark, normal değişkenlerle sabit değişkenler arasındaki fark gibidir. 
Bir property eğer visibility durumu buna müsait değiştirilebilir, fakat bir constant bir kere tanımlanır, sonra kodun devamında sadece çağrılabilir, değiştirilemez.
```php
class ClassB
{
    public $property    = 'Hello, bro!';

    const CONSTANT      = 'How are you?';
}
```

```php
$b = new ClassB();

echo $b->property; // Hello, bro!

$b->property    = 'Hello, sis!';

echo $b->property; // Hello, sis!

// You can't do this => ClassB::CONSTANT = 'What\'s up?';

echo ClassB::CONSTANT; // How are you?
```

bkz. []()

## Constructors and Destructors
__construct() sınıf new ile tanımlanır tanımlanmaz çalışır.
__destruct() ise sınıfla ilgili çalıştırılacak bir şey kalmayınca sınıf bellekten silinlmeden önce çalışır.
Birçok kurguda çok işe yarayan ve kullanılan foksiyonlardır. İlerdeki örneklerde daha günlük kullanıma yakın örnekleriyle konuyu pekiştireceğiz. 
 
```php
class ClassC
{
    function __construct() {
        print "ClassC is created \n";
    }

    function hello() {
        echo "Hello\n";
    }

    function __destruct() {
        echo "ClassC is removing from RAM.\n";
    }
}
```

```php
$c = new ClassC();

$c->hello();
```

```Result
    ClassC is created
    Hello
    ClassC is removing from RAM.
```

bkz. []()

## Inheritance (Kalıtım)

Nesne yönelimli programlamanın en önemli özelliklerinden biri, sınıfları kalıtım yoluyla bir başka sınıfa aktarma özelliğidir.
Bu şekilde hem kod fazlalığından kurtulunur, hem de daha düzenli bir kod yapısı oluşmuş oluyor.

Teknik olarak bir sınıf diğer bir sınıfı extend (türkçesi genişletmek ama buradaki anlamını tam karşılamıyor) ettiğinde o sınıfın 'private' olmayan tüm özelliklerini içerisinde barındırır.

Bu konuyu Visibility (Görünürlük) ile beraber örneklendireceğiz. Bu şekilde hem 'extend' hem de 'private' tanımlarını beraber anlayacağız. 


## Visibility (Görünürlük)

Bir sınıf içerisindeki değişken ve metodların görünürlük özellikleri ile hangi durumlarda çağırılıp çağırılamayacağını belirleyebiliriz.
3 adet görünürlük tanımı mevcuttur; public, protected, private.
Bir değişken veya metoda herhangi bir görünürlük tanımlaması yapılmazsa varsayılan olarak 'public' özelliğini alır.


public - her yerden ulaşabileceği anlamına gelir.

protected - kendi sınıfı ve bu sınıftan türetilen sınıflar içerisinde kullanılabilir

private - sadece tanımlandığı sınıf içerisinde kullanılabilir.

```php
class ClassA
{
    public $public_var = "this variable is public \n";
    protected $protected_var = "this variable is protected \n";
    private $private_variable = "this variable is private \n";

    public function publicMethod()
    {
        return "this method is public \n";
    }

    protected function protectedMethod()
    {
        return "this method is protected \n";
    }

    private function privateMethod()
    {
        return "this method is private \n";
    }


    public function test()
    {
        echo $this->public_var; // çağırılabilir.
        echo $this->protected_var; // çağırılabilir.
        echo $this->private_variable; // çağırılabilir.

        echo $this->publicMethod(); // çağırılabilir.
        echo $this->protectedMethod(); // çağırılabilir.
        echo $this->privateMethod(); // çağırılabilir.
    }
}
```

Bir sınıfın diğer sınıfa kalıtım yoluyla aktarılması 'extends' anahtar sözcüğüyle gerçekleştirilir.

```php
class ClassB extends ClassA
{
    public function test()
    {
        echo $this->public_var; // çağırılabilir.
        echo $this->protected_var; // çağırılabilir.
        // echo $this->private_variable; // çağrılamaz, betik hata verir.

        echo $this->publicMethod(); // çağırılabilir.
        echo $this->protectedMethod(); // çağırılabilir.
        // echo $this->privateMethod(); // çağrılamaz, betik hata verir.
    }
}
```

ClassB bu şekilde ClassA'nın tüm özelliklerine sahip olmuş oldu. 
'private' olan değişken ve metodları hariç.

```php
$classA = new ClassA();

$classA->public_var; // çağırılabilir.
// $classA->protected_var; // çağrılamaz, betik hata verir.
// $classA->private_variable; // çağrılamaz, betik hata verir.

$classA->publicMethod(); // çağırılabilir.
// $classA->protectedMethod(); // çağrılamaz, betik hata verir.
// $classA->privateMethod(); // çağrılamaz, betik hata verir..


$classB = new ClassB();

$classB->public_var; // çağırılabilir.
// $classB->protected_var; // çağrılamaz, betik hata verir.
// $classB->private_variable; // çağrılamaz, betik hata verir.

$classB->publicMethod(); // çağırılabilir.
// $classB->protectedMethod(); // çağrılamaz, betik hata verir.
// $classB->privateMethod(); // çağrılamaz, betik hata verir.
```

## Static Keyword

Static değişken ve metodları iki anlamda ele almak gerekir; kullanım ve işlev. 
Bir sınıfın static olan metod ve değişkenlerini çağırırken, 'new' anahtar sözcüğü ile sınıfı tanımlamamıza gerek kalmaz, direk olarak erişebiliriz.
Kullanımını çok basit bir şekilde örnek ile işleyeceğiz fakat işlevinin ne olduğunu anlamak daha önemli.
Static özellikteki tüm değişken ve metodlar RAM'de bir kez yer kaplar.
Bunun anlamı şudur; Diyelim ClassA diye bir sınıfımız var ve methodA isminde statik olmayan bir metodumuz var.
Bu metodu proje içerisinde birbirinden bağımsız 5 farklı yerde sınıfı yeniden tanımlayarak kullanıyorsak, bellek içerisinde 5 defa tanımlanacak anlamı taşır.
Ama bir static sınıf ne kadar çağırılırsa çağırılsın sadece bir defa bellekte yer alır.
Bu da performans açısından önemlidir. Fakat her metod veya değişken bu yüzden static yapılmaz. Bu metodun işlevi ve içeriği ile alakalıdır.

*Bir static metodun içerisinde, static olmayan metod ve değişkenler direk olarak çağırılamaz, sınıfı başka yerden çağırır gibi 'new' anahtar sözcüğü ile tanımlamak gerekir.
Eğer static bir sınıf içerisinde static olmayan bir metodu direk kullanma gereksinimi duyuyorsanız, muhtemelen yanlış bir kurgulama yapmışsınız anlamına gelir.


```php
class ClassF
{
    public static $static_var = 10;

    public static function staticMethod()
    {
        return "this is a static method. ".self::$static_var." \n";
    }

    public function exampleMethod()
    {
        return "this is a non-static method. ".self::$static_var." \n";
    }
}
```

```php
echo ClassF::staticMethod();

$classF = new ClassF();

echo $classF->exampleMethod();



// Proje içerisinde farklı bir yerde aşağıdaki işlemleri yaptığımızı varsayalım.

ClassF::$static_var = 20;

echo ClassF::staticMethod(); // RAM'de bu metoda ait tek bir alan var hala, bir öncekinin üzerine yazdı.

$classF = new ClassF();

echo $classF->exampleMethod(); // Sınıf yeniden tanımlandığı için RAM'de ikinci bir alana sahip.

```

```result
    this is a static method. 10
    this is a non-static method. 10
    this is a static method. 20
    this is a non-static method. 20
```

## Interface (Arayüz)
Interface bir sınıfın hangi metodlara sahip olması gerektiğini belirtmek için kullanılan bir arayüzdür.
Buradaki amaç hem bir düzen sağlamak, hem de olası hataları minimize etmektir. 
Modern bir yazılım içerisinde her sınıf bir arayüze (interface) veya aşağıda bahsedeceğimiz bir soyut sınıfa (abstract) bağlı olmak durumundadır.

* Arayüzler sadece metodları haritalandırmak için kullanılır. Soyut sınıflardan farklı olarak içerisi dolu metodlar oluşturulamaz. Abstract sınfılar ile beraber konuyu daha iyi anlayabileceğimizi düşünüyorum.

```php
interface VehicleInterface
{
    public function getTitle($brand);
}

class Car implements VehicleInterface
{
    public function getTitle($brand)
    {
        return "Bu bir $brand marka arabadır. \n";
    }
}

class Motorcycle implements VehicleInterface
{
    public function getTitle($brand)
    {
        return "Bu bir $brand marka motorsiklettir. \n";
    }
    
    public function getMaxSpeed()
    {
        return 160;
    }
}
```

Örnekte görüldüğü üzere oluşturduğumuz interface, implement edilen sınıflarca kendi özelliklerine sahip olmak zorunda bırakılıyor.
Yani burada VehicleInterface arayüzünü implement eden bir sınıf getTitle metoduna sahip olmak zorunda, ve bu metodun $brand adında bir arguman almak zorunda ve bu metod 'public' olmak zorunda.
Eğer durum böyle olmazsa kodumuz hata verir.
Motorcycle sınıfındaki getMaxSpeed metodunda olduğu gibi ekstra özelliklere sahip olmanın bir mahsuru yoktur.
Özetle; arayüzün söylediklerini yapabilir, bunlara bağlı kalarak ekstra özellikler ekleyebilirsiniz.

## Abstract Classes (Soyut Sınıflar)
Soyut sınıflar kendinden obje türetilemeyen sınıflardır. Yani bu sınıfları 'new' anahtar kelimesi ile çağıramazsınız.
Ancak başka bir sınıfa extend edebilirsiniz.
Bir abstract (soyut) sınıf, soyut bir metoda sahip olabileceği gibi (arayüzlerdeki gibi), normal bir metoda da sahip olabilir.

Inerface(arayüz) konusundakine benzer bir örnek üzerinden giderek konuyu pekiştirelim.

```php
abstract class Vehicle
{
    protected $brand;

    public function setBrand($brand) {
        $this->brand    = $brand;
    }
    
    abstract public function getTitle();
}
```

Bu soyut sınıf kısaca şunu söylüyor; bu soyut sınıfı extend eden sınıf kendi getTitle() metodunu oluşturmak zorundadır.
Ayrıca bu soyut sınıfı extend eden setBrand() metodunu ve $brand değişkenini miras alır.
Aşağıdaki örnektede gözüktüğü gibi; setBrand() metodu ikisinin ortak kullandığı metoddur, bu şekilde bu metodu iki defa yazma zahmetinden kurtulmuş olduk.

```php

class Car extends Vehicle
{
    public function getTitle()
    {
        if ($this->brand != '') {
            return "Bu bir ".$this->brand." marka otomobildir. \n";
        } else {
            return "Bu otomobilin markası girilmemiştir. \n";
        }
    }
}

class Motorcycle extends Vehicle
{
    public function getTitle()
    {
        if ($this->brand != '') {
            return "Bu bir ".$this->brand." marka motorsiklettir. \n";
        } else {
            return "Bu motorsikletin markası girilmemiştir. \n";
        }
    }

    public function getMaxSpeed()
    {
        return 160;
    }
}
```

```php

$car = new Car();
$car->setBrand('Renault');

echo $car->getTitle();


$motorcycle = new Motorcycle();
$motorcycle->setBrand('Yamaha');

echo $motorcycle->getTitle();
```

```result
    Bu bir Renault marka otomobildir. 
    Bu bir Yamaha marka motorsiklettir. 
```

## Trait
Traitleri türkçeye nitelik olarak çevirmişler ama bence -bir çok çeviride olduğu gibi- pek doğru bir çeviri değil. O yüzden ben trait diyeceğim.
Traitlerin kullanımı basit. Sınıf gibidirler ama tek başılarına çağıramazlar, sadece bir sınıf içerisinde use ile import edilebilirler.
Taitler iki nedenden kullanılıyor daha çok.
Öncelikli kullanımı; bazı metodların bir çok sınıf içerisinde kullanılma gereksinimi.
Diğer bir kullanım nedeni; çok büyük bir sınıfın metodlarını gruplara ayırmak için, düzen için yani.

**Burada şu önemli; normalde bir sınıfa sadece sadece bir tane sınfı extend edilebilirsiniz. Ama dilediğiniz kadar trait import edebilirsiniz. Php'ye sonradan dahil olma nedeni tamamen budur.

Örnekte gözüktüğü üzere;
Tanımlanırken class yerine trait anahtar sözcüğü ile tanımlanır.
Bir sınıfa dahil edilirken de use anahtar kelimesi kullanılır.
```php
trait Hello {
    public function sayHello() {
        return 'Hello';
    }
}

trait World {
    public function sayWorld() {
        return 'World';
    }
}

trait Universe {
    public function sayUniverse() {
        return 'Universe';
    }
}

class SaySomething {
    use Hello, World, Universe;

    public function sayHelloWorld() {
        return $this->sayHello().' '.$this->sayWorld()."\n";
    }

    public function sayHelloUniverse() {
        return $this->sayHello().' '.$this->sayUniverse()."\n";
    }
}
```

```php
$say_something  = new SaySomething();

echo $say_something->sayHelloWorld();
echo $say_something->sayHelloUniverse();
echo $say_something->sayHello();
```

```result
    Hello World
    Hello Universe
    Hello
```


##Anonymous Classes (Anonim Sınıflar)
İsimsiz sınıflar olarak da adlandırabiliriz. 
Kullanımı çok yaygın değildir. İhtiyaca göre tek bir yerde kullanılacak işlemler için kullanılabilir.
Örneğimizle hemen pekiştirelim;


```php
class SaySomething
{
    public function hello()
    {
        return new class
        {
            public function world() {
                return "Hello World! \n";
            }

            public function universe() {
                return "Hello Universe! \n";
            }
        };
    }
}
```

Örnekte görüleceği bir metodun içinde isimsiz bir sınıf oluşturduk.
Metodlar iç içe geçmiş oldu. Tabi burada önemli olan metodların iç içe geçirilmesi değil, bu başka şekillerde de yapılan bir teknik. 
Tasarım desenleri ile ilgili örnekleri inceleyebilirsiniz.
Burada önemli husus sınıfın bir isme sahip olmaması.

```php
$say_something  = new SaySomething();
echo $say_something->hello()->world();
echo $say_something->hello()->universe();
```

```result
    Hello World! 
    Hello Universe!
```
##Overloading
Overloading, sınıflar içerisinde dinamik olarak method ve değişken oluşturmaya yarayan bir sihirli fonksiyonlar işlemidir.

Bunu iki alt başlıkta inceleyeceğiz;

### Property Overloading
__set(), __get(), __isset(), __unset() sihirli fonksiyonları ile kullanılır.

__set($name, $value); bir değişkene değer atanmak istendiği zaman çalışır..

__get($name); bir değişken çağırıldığı zaman çalışır.

__isset($name); bir değişken 'isset' edildiği zaman çalışır.

__unset($name); bir değişken 'unset' edildiği zaman çalışır.

```php
class Data
{
    private $datas = [];

    // Sınıfa ait bir değişken (property) set edilmek istendiğinde çalışır.
    public function __set($name, $value) {
        echo "#log: $name isminde bir değişken tanımlandı. \n";

        $this->datas[$name] = $value;
    }

    // Sınıfa ait bir değişken (property) çağrıldığında çalışır.
    public function __get($name) {
        echo "#log: $name isminde bir değişken çağırıldı. \n";

        return $this->datas[$name];
    }

    // Sınıfa ait bir değişken (property) isset edildiğinde.
    public function __isset($name) {
        echo "#log: $name isminde bir değişkenin varlığı sorgulandı. \n";

        return isset($this->datas[$name]);
    }

    // Sınıfa ait bir değişken (property) silindiğinde.
    public function __unset($name) {
        echo "#log: $name isminde bir değişkenin varlığı silindi. \n";

        unset($this->datas[$name]);
    }
}
```

Örneğimizde görüşdüğü üzere aslında Data sınıfı name, surname gibi değişkenlere sahip değildir.
Fakat biz bunları overloading sihirli fonksiyonları sayesinde dinamik olarak oluşturabiliyoruz.
Bu yöntem sayesinde çok farklı ve dinamik sınıflar tanımlayabilirsiniz. 
Örneğin değişkenleri cache sistemine yazabilir ve okuyabilirsiniz gibi.

```php
$data           = new Data();
$data->name     = 'Mustafa';
$data->surname  = 'Yaşar';

echo 'Ad Soyad: '.$data->name.' '.$data->surname." \n";

if (!isset($data->age)) {
    echo "Yaş bilgisi yok. \n";
}

unset($data->surname);
```

Çıktıda gözükmesini istediğimiz log kayıtları, hangi fonksiyonun ne aşamada çalıştığınız görmeniz için faydalı.

```result
    #log: name isminde bir değişken tanımlandı. 
    #log: surname isminde bir değişken tanımlandı. 
    #log: name isminde bir değişken çağırıldı. 
    #log: surname isminde bir değişken çağırıldı. 
    Ad Soyad: Mustafa Yaşar 
    #log: age isminde bir değişkenin varlığı sorgulandı. 
    Yaş bilgisi yok. 
    #log: surname isminde bir değişkenin varlığı silindi. 
```

### Method Overloading
Bir sınıfa ait dinamik bir şekilde metod çağırabilmek için sihirli fonksiyonlar ile kullanılan bir yöntemdir.
__call() normal fonksiyonlar için, __callStatic static fonksiyonlar için kullanılır.
İki fonksiyonda $name ve $arguments parametlerini alır. 
$name çağırılan metodun adını, $arguments metodu çağırırken kullanılan parametleri dizi şeklinde alır.

```php
class MethodOverloading
{
    public function __call($name, $arguments)
    {
        if ($name == 'sayHello') {
            echo 'Hello, ' .implode(', ', $arguments). "\n";
        } elseif ($name == 'sayBye') {
            echo 'Goodbye ' .implode(', ', $arguments). "\n";
        } else {
            echo "Method Bulunamadı.\n";
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name == 'sayHello') {
            echo 'Hello, ' .implode(', ', $arguments). "\n";
        } elseif ($name == 'sayBye') {
            echo 'Goodbye ' .implode(', ', $arguments). "\n";
        } else {
            echo "Method Bulunamadı.\n";
        }
    }
}
```

Örneğimizde görüleceği üzere, aslında var olmayan sayHello(), sayBye() metodlarını sihirli yöntemler ile çağırabiliyoruz.
saySomething() metodunu özellikle çağırdım, sihirli fonksiyonlar içerisinde karşılığı yok ve else kısmına düşüyor.

** Eğer sayHello() diye bir metodumuz olsaydı, siz sayHello'yı çağırdığınızda o çağırılırdı, _call() sihirli fonksiyonunu çağırmazdı.
Çağırdığımız metod var olmayınca oraya gidiyor.

```php
$obj = new MethodOverloading;
$obj->saySomething('Mustafa');

$obj->sayHello('Mustafa');

MethodOverloading::sayBye('Mustafa');
```

```result
    Method Bulunamadı.
    Hello, Mustafa
    Goodbye Mustafa
```

##Object Cloning And Copying (Nesne Klonlama ve Kopyalama)


##Final Keyword
https://www.php.net/manual/en/language.oop5.final.php

##Object Iteration
https://www.php.net/manual/en/language.oop5.iterations.php

##Comparing Objects
https://www.php.net/manual/en/language.oop5.object-comparison.php

##Magic Methods (Sihirli Metodlar)
PHP OOP yapısı içerisinde bir çok sihirli metod denilen metodlar bulunmaktadır.
Bunların önemli olanlarını [aa](Constructors and Destructors) ve [aa](Overloading) başlıkları altında işledik.
Bunların haricinde de çeşitli sihirli metodlar var. Hepsini teker teker işlemenin gerekli olmadığını düşündüm.
Siz isterseniz [https://www.php.net/manual/en/language.oop5.magic.php]() sayfasından göz atabilirsiniz.


##NameSpaces

Yararlanılan Kaynaklar
[https://www.php.net/manual/en/language.oop5.php]()
[https://www.php.net/manual/en/language.namespaces.php]()
