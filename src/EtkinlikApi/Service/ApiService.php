<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use Httpful\Mime;
use Httpful\Request;

class ApiService
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $address
     * @param string $body
     * @return \Httpful\Response
     */
    public function get($address, $body = '')
    {
        return Request::get('https://etkinlik.io/api/v1' . $address, Mime::JSON)
            ->addHeader('X-ETKINLIK-TOKEN', $this->container->getToken())
            ->body($body)
            ->send();
    }
}