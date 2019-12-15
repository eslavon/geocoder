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

use Eslavon\Geocode\Response\ClientResponse;

/**
 * Class SendRequest
 * @package Eslavon\Geocoder
 */

class SendRequest extends SendRequestException
{
    /**
     * URL request
     *
     * @var string $url
     */
    protected $url;

    /**
     * CURL option;
     *
     * @var array $option
     */
    protected $option;

    /**
     * SendRequest constructor.
     *
     * @param string $url - URL request
     * @param array $option - CURL option
     */
    public function __construct(string $url, array $option)
    {
        $this->url = $url;
        $this->option = $option;
    }

    /**
     * Send request
     *
     *  @return ClientResponse
     *  @throws SendRequestException
     */
    public function send()
    {
        $curl = curl_init($this->url);
        curl_setopt_array($curl, $this->option);
        $response = curl_exec($curl);
        $curl_error_code = curl_errno($curl);
        $curl_error = curl_error($curl);
        curl_close($curl);

        if ($curl_error || $curl_error_code) {
            $error_msg = "CURL error:  ".$curl_error_code;
            if ($curl_error) {
                $error_msg .= ": {$curl_error}";
            }
            throw new SendRequestException($error_msg);
        }

        return new ClientResponse($response);
    }
}