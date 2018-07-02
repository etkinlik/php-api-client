<?php namespace EtkinlikApi;

use DI\Container;
use DI\ContainerBuilder;
use function DI\get;
use EtkinlikApi\Service\ApiService;
use EtkinlikApi\Service\EventService;
use EtkinlikApi\Service\DistrictService;
use EtkinlikApi\Service\CategoryService;
use EtkinlikApi\Service\VenueService;
use EtkinlikApi\Service\CityService;
use EtkinlikApi\Service\NeighborhoodService;
use EtkinlikApi\Service\FormatService;

/**
 * @property string token
 *
 * @property ApiService api
 *
 * @property EventService event
 *
 * @property VenueService venue
 *
 * @property FormatService format
 * @property CategoryService category
 *
 * @property CityService city
 * @property DistrictService district
 * @property NeighborhoodService neighborhood
 *
 */
class ApiClient
{
    /**
     * @var Container
     */
    private $c;

    /**
     * @var string
     */
    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return Container
     *
     * @throws \Exception
     */
    private function getContainer()
    {
        if ($this->c instanceof Container) {
            return $this->c;
        }

        $builder = new ContainerBuilder();
        $builder->useAnnotations(true);
        $builder->addDefinitions([
            'token' => $this->token,

            'api' => get(ApiService::class),

            'event' => get(EventService::class),

            'venue' => get(VenueService::class),

            'format'   => get(FormatService::class),
            'category' => get(CategoryService::class),

            'city'        => get(CityService::class),
            'district'    => get(DistrictService::class),
            'neigborhood' => get(NeighborhoodService::class),

            ApiClient::class => $this

        ]);

        $this->c = $builder->build();

        return $this->c;
    }


    public function __get($name)
    {
        return $this->getContainer()->get($name);
    }
}