<?php
require __DIR__ . "/vendor/autoload.php";

use Eslavon\Geocoder\Geocoder;

$address = "Иваново";
$geocoder = new Geocoder($address);
$response = $geocoder->getResponse();
var_dump($response);
