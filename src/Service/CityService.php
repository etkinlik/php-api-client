<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\City;

class CityService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @return City[]
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->client->api->get('/cities');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                /** @var City[] $sehirler */
                $sehirler = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $sehirler[] = new City($item);
                }

                return $sehirler;

                break;

            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
                break;
            default:
                throw new UnknownException($response);
        }
    }
}