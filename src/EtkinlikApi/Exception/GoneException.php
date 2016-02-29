<?php namespace EtkinlikApi\Exception;

use Httpful\Response;

class GoneException extends \RuntimeException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}