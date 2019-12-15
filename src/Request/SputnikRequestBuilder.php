<?php


namespace Eslavon\Geocoder\Request;


class SputnikRequestBuilder implements RequestBuilder
{
    protected const SPUTNIK_API_URL = "http://search.maps.sputnik.ru/search/addr?q=";

    protected $url;

    protected $options;

    public function __construct(string $address)
    {
        $this->setUrl($address);
        $this->setOption();
    }


    public function setOption($options = array(CURLOPT_RETURNTRANSFER => true))
    {
        $this->options = $options;
    }

    public function setUrl(string $address)
    {
        $this->url = $this->createUrl($address);
    }

    private function createUrl(string $address)
    {
        return self::SPUTNIK_API_URL.$address;
    }

    public function getRequest()
    {
        return new Request($this->url,$this->options);
    }
}