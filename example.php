<?php

require __DIR__ . "/vendor/autoload.php";

use Geocoder\Core\Geocoder;

$geo = new Geocoder();
$address = "Москва";
$data = $geo->request($address);
$array = $geo->getAddressArray($data);
$filtration_array = $geo->filtrationArray($array);
var_dump($filtration_array);
