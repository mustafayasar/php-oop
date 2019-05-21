# PHP OOP (Object Oriented Programming)
Türkçe'ye Nesne Yönelimli Programlama diye çevrilen OOP PHP dünyasına PHP 5 ile birlikte girmiştir.
PHP 7 ile birlikte birçok şeyi geliştirmiş, ve bazı özellikleri kaldıracağını açıklamıştır. 
Ben bu gibi detaylara girmeyeceğim, PHP 7'ye göre anlatacağım. 

[Design Pattern](https://github.com/mustafayasar/php-design-patterns) örnekleri paylaştıktan sonra hiç bilmeyenler için OOP konusuna da değinemenin iyi olacağını düşündüm.
Basit konuları hızlı geçip, daha bir çok örnekle zenginleştirmeyi planlıyorum.

Şimdi başlıklar ve örnekler ile bu konuyu işleyelim.


## Basic
Bir sınıf tanımlarken örnekte göründüğü üzere **class** tanımlamasını kullanıyoruz.
Sınıfa ait değişkenleri ve metodları örnekte görüldüğü şekilde oluşturuyoruz. 
Normal bir değişken ve function oluşturmaktan tek farkı başında **public** tanımlaması.
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
Bir property eğer visibility durumu buna müsait değiştirilebilir, fakat bir constant bir kere tanımlanır, sonra kodun devamında sadece çağrılabilir.
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
## Visibility

```php

```

```php

```
## Inheritance

```php

```

```php

```
## Static Keyword

## Class Abstraction

## Object Interfaces

## Traits



Yararlanılan Kaynaklar
[https://www.php.net/manual/en/language.oop5.php]()
[https://www.php.net/manual/en/language.namespaces.php]()
