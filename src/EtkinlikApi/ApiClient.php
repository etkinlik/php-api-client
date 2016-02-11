<?php namespace EtkinlikApi;
use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\EtkinlikService;
use EtkinlikApi\Service\IlceService;
use EtkinlikApi\Service\KategoriService;
use EtkinlikApi\Service\SehirService;
use EtkinlikApi\Service\SemtService;
use EtkinlikApi\Service\TurService;

/**
 * @property ApiService apiService
 *
 * @property EtkinlikService etkinlikService
 * @property IlceService ilceService
 * @property KategoriService kategoriService
 * @property SehirService sehirService
 * @property SemtService semtService
 * @property TurService $turService
 *
 */
class ApiClient
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->container = new Container([
            'token' => $token
        ]);
    }

    public function __get($name)
    {
        return $this->container->offsetGet($name);
    }
}