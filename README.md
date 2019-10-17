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

## Пример использования

```php
require __DIR__ . "/vendor/autoload.php";

use Geocoder\Core\Geocoder;

$geo = new Geocoder();
$address = "Иваново";
$data = $geo->request($address);
$array = $geo->getAddressArray($data);
var_dump($array);
```

### Содержимое массива $array
```php
array(10) { 
    [0]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(35) "Ивановская область" 
        ["longitude"]=> float(40.97374) 
        ["latitude"]=> float(56.998444) 
    } 
    [1]=> array(4) { 
        ["country"]=> string(16) "Беларусь" 
        ["address"]=> string(33) "Брестская область" 
        ["longitude"]=> float(25.531807) 
        ["latitude"]=> float(52.142063) 
    } 
    [2]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(35) "Ивановская область" 
        ["longitude"]=> float(40.980137) 
        ["latitude"]=> float(57.018) 
    } 
    [3]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(35) "Московская область" 
        ["longitude"]=> float(39.227577) 
        ["latitude"]=> float(55.379974) 
    } 
    [4]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(71) "Ленинградская область Кировский район" 
        ["longitude"]=> float(31.102154) 
        ["latitude"]=> float(59.66092) 
    } 
    [5]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(73) "Нижегородская область Городецкий район" 
        ["longitude"]=> float(43.4175) 
        ["latitude"]=> float(56.691113) 
    } 
    [6]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(65) "Псковская область Островский район" 
        ["longitude"]=> float(28.2314) 
        ["latitude"]=> float(57.1738) 
    } 
    [7]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(65) "Псковская область Невельский район" 
        ["longitude"]=> float(29.992577) 
        ["latitude"]=> float(56.05326) 
    } 
    [8]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(71) "Псковская область Великолукский район" 
        ["longitude"]=> float(30.253893) 
        ["latitude"]=> float(56.4623) 
    } 
    [9]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(73) "Вологодская область Череповецкий район" 
        ["longitude"]=> float(37.430183) 
        ["latitude"]=> float(59.508274) 
    } 
}
```
Как мы видим элементы массива 0 и 2 практически идентичны и близки по координатам. Такие дубликаты возникают, когда в запрашиваемом населенном пункте иметься железнодорожная станция, потому что сервис геокодирования дополнительно возвращает ее координаты. Что бы удалить такие дубликаты используется метод 
``` php
$filtration_array = $geo->filtrationArray($array);
var_dump($filtration_array);
```

### Содержимое массива $filtration_array

``` php
array(9) {
    [0]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(35) "Ивановская область" 
        ["longitude"]=> float(40.97374) 
        ["latitude"]=> float(56.998444) 
    } 
    [1]=> array(4) { 
        ["country"]=> string(16) "Беларусь" 
        ["address"]=> string(33) "Брестская область" 
        ["longitude"]=> float(25.531807) 
        ["latitude"]=> float(52.142063) 
    } 
    [3]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(35) "Московская область" 
        ["longitude"]=> float(39.227577) 
        ["latitude"]=> float(55.379974) 
    } 
    [4]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(71) "Ленинградская область Кировский район" 
        ["longitude"]=> float(31.102154) 
        ["latitude"]=> float(59.66092) 
    } 
    [5]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(73) "Нижегородская область Городецкий район" 
        ["longitude"]=> float(43.4175) 
        ["latitude"]=> float(56.691113) 
    } 
    [6]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(65) "Псковская область Островский район" 
        ["longitude"]=> float(28.2314) 
        ["latitude"]=> float(57.1738) 
    } 
    [7]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(65) "Псковская область Невельский район" 
        ["longitude"]=> float(29.992577) 
        ["latitude"]=> float(56.05326) 
    } 
    [8]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(71) "Псковская область Великолукский район" 
        ["longitude"]=> float(30.253893) 
        ["latitude"]=> float(56.4623) 
    } [9]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(73) "Вологодская область Череповецкий район" 
        ["longitude"]=> float(37.430183) 
        ["latitude"]=> float(59.508274) 
    }
}
```

## Примечание
*Данный код создавался для решения конкретной задачи:
Иметься чат бот для знакомств, показ анкет ранжируется в зависимости от геопозиции пользователя. Платформа, на которой используется чат-бот, не предоставляет функционал отправки местоположения пользователя использующим некоторые версии клиента. Поэтому встала необходимость дать пользователям бота, возможность указать город. Таким образом, используя данный код, мы можем получить от пользователя название населенного пункта, отправить варианты адресов, если таких пунктов не сколько и получить грубые географические координаты пользователя, относительно которых будет происходить ранжирование анкет.*
