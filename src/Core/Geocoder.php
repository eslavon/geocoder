<?php
/**
 * Geocoder
 * PHP Version 7.3.
 *
 * @author    Vinogradov Victor <victor@eslavon.ru>
 * @copyright Vinogradov Victor
 * @license   MIT License
 */

namespace Geocoder\Core;

/**
 * Geocoder - Receiving and processing data
 */

class Geocoder extends GeocoderException
{
    /**
     * CURL options
     * @var array
     */
    protected $curl_options;

    /**
     * API URL
     *
     * @var string
     */	
	private $api = "http://search.maps.sputnik.ru/search/addr?q=";

	/**
     * Send an API request
     *
     * @param string $address
     * @return array
     *
     * @throws GeocoderException
     */
	public function request(string $address) 
	{
		$address = urlencode($address);
		$url = $this->api.$address;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($curl);

		if ($data === FALSE) {
			$error = curl_error($curl);
        	throw new GeocoderException($error);
        }
        curl_close($curl);
        $array = json_decode($data,true);
        if (json_last_error() !== JSON_ERROR_NONE) {
        	$error = "JSON ERROR: ".json_last_error_msg();
        	throw new GeocoderException($error);
        }
		return $array;
	}

    /**
     * Get processed array
     *
     * @param array $data
     * @return array
     *
     */
    public function getAddressArray(array $data) : array
    {
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
   		return $address;
   	}

    /**
     * Remove duplicates from array
     *
     * @param array $data
     * @return array
     *
     */
   	public function filtrationArray(array $array) : array
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