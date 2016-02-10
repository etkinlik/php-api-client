<?php namespace EtkinlikApi;
use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\KategoriService;
use EtkinlikApi\Service\TurService;

/**
 * @property ApiService apiService
 *
 * @property TurService $turService
 * @property KategoriService kategoriService
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