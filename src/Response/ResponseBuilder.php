<?php
/**
 * Geocoder
 * PHP Version 7.3
 *
 * @author    Vinogradov Victor <victor@eslavon.ru>
 * @copyright Vinogradov Victor
 * @license   MIT License
 */

namespace Eslavon\Geocoder\Response;

/**
 * Interface ResponseBuilder
 * @package Eslavon\Geocoder\Response
 */
interface ResponseBuilder
{
    public function getAddressArray();
}