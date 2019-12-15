# Geocoder
EN: The library, to obtain the geographical coordinates of the city, by its name.

RU: Библиотека, для получения географических координат населенного пункта, по его названию.

[![Packagist](https://img.shields.io/badge/Packagist-v1.0-green)](https://packagist.org/packages/eslavon/geocoder)
[![PHP Version](https://img.shields.io/badge/PHP-v%207.3-brightgreen)](https://www.php.net/releases/7_3_0.php)

## Installation
* EN: The Eslavon Geocoder can be installed using Composer by running the following command:
     
* RU: Установить библиотеку можно с помощью Composer, выполнив следующую команду:
```
composer require eslavon/geocoder
```

## Example

```php
require __DIR__ . "/vendor/autoload.php";

use Eslavon\Geocoder\Geocoder;

$address = "Иваново";
$geocoder = new Geocoder($address);
$response = $geocoder->getResponse();
var_dump($response);
```

### Result
```php
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
    } 
    [9]=> array(4) { 
        ["country"]=> string(12) "Россия" 
        ["address"]=> string(73) "Вологодская область Череповецкий район" 
        ["longitude"]=> float(37.430183) 
        ["latitude"]=> float(59.508274) 
    }
}
```

## Полезные материалы (RU)
* Описание API сервиса геокодирования http://api.sputnik.ru/maps/geocoder/
* Спецификация формата GeoJSON (RU): http://gis-lab.info/docs/geojson_ru.html


