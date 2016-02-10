<?php namespace EtkinlikApi;
use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\TurService;

/**
 * @property TurService turService
 * @property ApiService apiService
 */
class ApiClient
{
    /**
     * @var Container
     */
    private $container;

    public function __construct()
    {
        $this->container = new Container([]);
    }

    public function __get($name)
    {
        return $this->container->offsetGet($name);
    }
}