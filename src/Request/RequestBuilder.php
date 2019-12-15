<?php


namespace Eslavon\Geocoder\Request;


interface RequestBuilder
{
    public function setOption(array $option);
    public function setUrl(string $url);

}