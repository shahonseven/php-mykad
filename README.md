## MyKad
Package for extracting information from MyKad

## Installation
```shell
composer require shahonseven/php-mykad
```

## Usage
```php
use Shahonseven\MyKad\MyKad;

$myKad = new MyKad(720413335315);
$myKad2 = new MyKad('720413-33-5315');

echo $myKad->isValid();
// Results: true

echo $myKad->stateName();
// Results: PAHANG

echo $myKad->gender();
// Results: MALE

echo $myKad->dateOfBirth()->format('Y-m-d');
// Results: 1972-04-13

echo $myKad->dateOfBirth()->diffInYears();
// Results: 51
```