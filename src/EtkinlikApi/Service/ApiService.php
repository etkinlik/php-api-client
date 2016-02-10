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
     * @param string $adres
     * @return \Httpful\Response
     */
    public function get($adres)
    {
        return Request::get('https://etkinlik.io/api/v1' . $adres)
            ->addHeader('X-ETKINLIK-TOKEN', '33ebd45fa0b8518280a816f76368c11f')
            ->sendsType(Mime::JSON)
            ->expectsType(Mime::JSON)
            ->send();
    }
}