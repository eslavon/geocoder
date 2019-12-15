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
 * Class ClientResponse
 * @package Eslavon\Geocoder\Request
 */
class Response
{

    /**
     * Response
     * @var bool|string
     */
    private $response = false;

    /**
     * ClientResponse constructor.
     * @param bool|string $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get Response
     * @return bool|string
     */
    public function getResponse()
    {
        return $this->response;
    }
}