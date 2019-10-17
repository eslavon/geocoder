# Geocoder
Небольшое решение, для получения географических координат населенного пункта, по его названию используя сервис геокодирования http://api.sputnik.ru/maps/geocoder
Создавался под собственные нужды. Имеет простейший функционал.


## Подключение
* Скачать проект
* Выполнить команду в папке проекта
```
composer install
```

* Подключить библиотеку в вашем файле
```php
require __DIR__ . "/vendor/autoload.php";
```

### Пример использования

```php
require __DIR__ . "/vendor/autoload.php";
use Geocoder\Core\Geocoder;
$geo = new Geocoder();
$address = "Иваново";
$data = $geo->request($address);
$array = $geo->getAddressArray($data);
$filtration_array = $geo->filtrationArray($array);

var_dump($array);
var_dump($filtration_array);
```