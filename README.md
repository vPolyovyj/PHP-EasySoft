# PHP-EasySoft
Прийом on-line платежів від EasySoft (EasyPay). 
Реалізовує взаємодію із ПриватБанком відповідно до специфікації взаємодії із підприємством EasySoft.Provider.3.0

***

## Реалізовані методи взаємодії
+ [Check](https://github.com/vPolyovyj/PHP-EasySoft/blob/master/actions/check.php) - пошук платника (за ідентифікаторм)
+ [Pay](https://github.com/vPolyovyj/PHP-EasySoft/blob/master/actions/pay.php) - проведення платежу
+ [Confirm](https://github.com/vPolyovyj/PHP-EasySoft/blob/master/actions/confirm.php) - підтвердження платежу
+ [Cancel](https://github.com/vPolyovyj/PHP-EasySoft/blob/master/actions/cancel.php) - скасування платежу

***

## Приклад використання
у файлі `es.php` змінити:

1. `require_once '/classes/esDemo.class.php';` замінити на власний клас, який імплементує інтерфейс `es.class.php`
2. `$esAdapter = new esDemo();` замінити викликом власного конструктора - `$esAdapter = new myEsAdapter(...);`
3. додати в перелік `$allowedIps` відповідну IP-адресу (надається ПриватБанком)

***

# Demo проекту

[...]()
