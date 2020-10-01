<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\District;

class DistrictService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @param int $cityId
     *
     * @return District[]
     *
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getItemsByCityId($cityId)
    {
        // response alalım
        $response = $this->client->api->get('/cities/' . $cityId . '/districts');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                $items = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $items[] = new District($item);
                }

                return $items;

            case 400:
                throw new BadRequestException(json_decode($response->getBody()->getContents())->message);
            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
            case 404:
                throw new NotFoundException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $cityId
     *
     * @return District[]
     *
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     *
     * @deprecated use getItemsByCityId
     */
    public function getListeBySehirId($cityId)
    {
        return $this->getItemsByCityId($cityId);
    }
}