<?php namespace EtkinlikApi;

use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\EtkinlikService;
use EtkinlikApi\Service\IlceService;
use EtkinlikApi\Service\KategoriService;
use EtkinlikApi\Service\SehirService;
use EtkinlikApi\Service\SemtService;
use EtkinlikApi\Service\TurService;
use Pimple\Container as PimpleContainer;

/**
 * @property ApiService apiService
 *
 * @property EtkinlikService etkinlikService
 * @property IlceService ilceService
 * @property KategoriService kategoriService
 * @property SehirService sehirService
 * @property SemtService semtService
 * @property TurService $turService
 */
class Container extends PimpleContainer
{
    public function __construct(array $values)
    {
        parent::__construct($values);

        $this['apiService'] = function($c) {
            return new ApiService($c);
        };

        $this['etkinlikService'] = function($c) {
            return new EtkinlikService($c);
        };

        $this['ilceService'] = function($c) {
            return new IlceService($c);
        };

        $this['kategoriService'] = function($c) {
            return new KategoriService($c);
        };

        $this['sehirService'] = function($c) {
            return new SehirService($c);
        };

        $this['semtService'] = function($c) {
            return new SemtService($c);
        };

        $this['turService'] = function($c) {
            return new TurService($c);
        };
    }

    public function getToken()
    {
        return $this->offsetGet('token');
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }
}