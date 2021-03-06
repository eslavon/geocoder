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
 * Class SputnikResponseBuilder
 * @package Eslavon\Geocoder\Response
 */
class SputnikResponseBuilder implements ResponseBuilder
{
    /**
     * Response
     * @var string
     */
    public $response;

    /**
     * SputnikResponseBuilder constructor.
     * @param string $response
     */
    public function __construct(string $response)
    {
        $this->response = $response;
    }

    /**
     * Get Address Array
     *
     * @return array
     * @throws ResponseException
     */
    public function getAddressArray()
    {
        $data = json_decode($this->response,true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $error_msg = json_last_error_msg();
            throw new ResponseException($error_msg);
        }
        foreach ($data["result"]["address"][0]["features"] as $key => $value) {
            $address_string = null;
            foreach ($value["properties"]["address_components"] as $key_address => $result) {
                if ($result["type"] == "country") {
                    $address_country = $result["value"];
                } elseif($result["type"] !== "place") {
                    $address_string = $address_string.$result["value"]." ";
                } else {
                    $address_place = $result["value"];
                }
            }
            $address_string = ($address_string == null)? $address_place : $address_string;
            $address[] = [
                "country" => $address_country,
                "address" => trim($address_string),
                "longitude" => $value["geometry"]["geometries"][0]["coordinates"][0],
                "latitude" => $value["geometry"]["geometries"][0]["coordinates"][1],
            ];
        }
        return $this->filtrationArray($address);
    }

    /**
     * Remove duplicates from array
     *
     * @param array $array
     * @return array
     *
     */
    private function filtrationArray(array $array) : array
    {
        $ids = array_column($array, "address");
        $ids = array_unique($ids);
        $array = array_filter(
            $array,
            function ($key, $value) use ($ids) {
                return in_array($value, array_keys($ids));
            },
            ARRAY_FILTER_USE_BOTH
        );
        return $array;
    }
}