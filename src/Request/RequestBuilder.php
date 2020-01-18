<?php
/**
 * Geocoder
 * PHP Version 7.4.
 *
 * @author    Vinogradov Victor <victor@eslavon.ru>
 * @copyright Vinogradov Victor
 * @license   MIT License
 */

namespace Eslavon\Geocoder\Request;

/**
 * Interface RequestBuilder
 * @package Eslavon\Geocoder\Request
 */
interface RequestBuilder
{
    /**
     * Setting URL request
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * Setting cURL options
     * @param array $option
     */
    public function setOption(array $option);

    /**
     * Get request
     * @return object
     */
    public function getRequest():object;
}