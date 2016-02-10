<?php namespace EtkinlikApi;

use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\KategoriService;
use EtkinlikApi\Service\TurService;
use Pimple\Container as PimpleContainer;

/**
 * @property TurService $turService
 * @property ApiService apiService
 */
class Container extends PimpleContainer
{
    public function __construct(array $values)
    {
        parent::__construct($values);

        $this['apiService'] = function($c) {
            return new ApiService($c);
        };

        $this['turService'] = function($c) {
            return new TurService($c);
        };

        $this['kategoriService'] = function($c) {
            return new KategoriService($c);
        };
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }
}