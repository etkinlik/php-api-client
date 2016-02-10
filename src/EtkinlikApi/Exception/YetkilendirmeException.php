<?php namespace EtkinlikApi\Exception;

use Exception;

class YetkilendirmeException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}