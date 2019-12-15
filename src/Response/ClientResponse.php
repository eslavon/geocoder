<?php


namespace Eslavon\Geocode\Response;


class ClientResponse
{
    public $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}