<?php
/**
 * Geocoder
 * PHP Version 7.3.
 *
 * @author    Vinogradov Victor <victor@eslavon.ru>
 * @copyright Vinogradov Victor
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace Geocoder\Core;

use Exception;
use Throwable;

/**
 * GeocoderException - Exception Handling
 */

class GeocoderException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() 
    {
        $error = "[Exception]: An error has occurred:";
        $error .= "\r\n[Exception]: Message Error: {$this->getMessage()}";
        $error .= "\r\n[Exception]: Code Error: {$this->getCode()}";
        $error .= "\r\n[Exception]: File Error: {$this->getFile()}:{$this->getLine()}";
        $error .= "\r\n[Exception]: Path Error: {$this->getTraceAsString()}\r\n";
        if (!is_dir("geocoder_error")) {
            mkdir("geocoder_error");
        }
        $file = fopen("geocoder_error/geocoder_error" . date("d-m-Y_h") . ".log", "a");
        fwrite($file, $error);
        fclose($file);
        return $error;
        // parent::__toString(); 
    }
}