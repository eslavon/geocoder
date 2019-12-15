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
 * Interface RequestBuilder
 * @package Eslavon\Geocoder\Request
 */
interface RequestBuilder
{
    public function setOption(array $option);
    public function setUrl(string $url);

}