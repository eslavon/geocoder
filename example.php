<?php

require __DIR__ . "/vendor/autoload.php";

use Geocoder\Core\Geocoder;

$geo = new Geocoder();
$address = "Иваново";
$data = $geo->request($address);
$array = $geo->getAddressArray($data);
$filtration_array = $geo->filtrationArray($array);
