<?php
/**
 * Geocoder
 * PHP Version 7.3.
 *
 * @author    Vinogradov Victor <victor@eslavon.ru>
 * @copyright Vinogradov Victor
 * @license   MIT License
 */

namespace Eslavon\Geocoder\Request;

/**
 * Class SputnikRequestBuilder
 * @package Eslavon\Geocoder\Request
 */

class SputnikRequestBuilder implements RequestBuilder
{
    /**
     * URL SPUTNIK API
     * @const string
     */
    protected const SPUTNIK_API_URL = "http://search.maps.sputnik.ru/search/addr?q=";

    /**
     *  URL request
     * @var string
     */
    protected $url;

    /**
     * CURL options
     * @var array
     */
    protected $options;

    /**
     * SputnikRequestBuilder constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->setUrl($address);
        $this->setOption();
    }

    /**
     * Setting CURL options
     * @param array $options
     */
    public function setOption($options = array(CURLOPT_RETURNTRANSFER => true))
    {
        $this->options = $options;
    }

    /**
     * Setting URL request
     * @param string $address
     */
    public function setUrl(string $address)
    {
        $this->url = $this->createUrl($address);
    }

    /**
     * Create URL request;
     * @param string $address
     * @return string
     */
    private function createUrl(string $address)
    {
        return self::SPUTNIK_API_URL.$address;
    }

    /**
     * Get request
     * @return Request
     */
    public function getRequest()
    {
        return new Request($this->url,$this->options);
    }
}