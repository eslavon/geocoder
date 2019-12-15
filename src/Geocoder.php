<?php


namespace Eslavon\Geocoder;

use Eslavon\Geocoder\Request\SputnikRequestBuilder;
use Eslavon\Geocoder\Response\SputnikResponseBuilder;


class Geocoder
{
    private $provider;

    private $address;

    public function __construct($address,$provider = 1)
    {
        $this->address = $address;
        $this->provider = $provider;
    }

    public function getResponse()
    {
        switch ($this->provider) {
            case 1;
                $sputnik_request = new SputnikRequestBuilder($this->address);
                $request = $sputnik_request->getRequest();
                $response = $request->send();
                $sputnik_response = new SputnikResponseBuilder($response->getResponse());
                return $sputnik_response->getAddressArray();
                break;
        }
    }

}