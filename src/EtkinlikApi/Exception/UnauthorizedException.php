<?php namespace EtkinlikApi\Exception;

use Exception;

class UnauthorizedException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}