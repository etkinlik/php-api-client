<?php namespace EtkinlikApi\Exception;

use Httpful\Response;

class BadRequestException extends \RuntimeException
{
    /**
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}