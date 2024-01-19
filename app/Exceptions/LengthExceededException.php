<?php

namespace App\Exceptions;

use Exception;

class LengthExceededException extends Exception
{
    public function __construct($message = "Length exceeded exception", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
