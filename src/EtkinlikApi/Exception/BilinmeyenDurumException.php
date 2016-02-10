<?php namespace EtkinlikApi\Exception;

use Httpful\Response;

class BilinmeyenDurumException extends \RuntimeException
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @param Response $response
     */
    public function __construct($response)
    {
        parent::__construct();

        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}