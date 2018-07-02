<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Config\VenuesConfig;
use EtkinlikApi\Model\Venue;
use EtkinlikApi\Model\Response\VenuesResponse;

class VenueService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @param VenuesConfig $params
     * @return VenuesResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getItems(VenuesConfig $params = null)
    {
        // response alalım
        $response = $this->client->api->get('/venues', is_null($params) ? [] : $params->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:
                return new VenuesResponse(json_decode($response->getBody()->getContents()));
            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     *
     * @return Venue
     *
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->client->api->get('/venues/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:
                return new Venue(json_decode($response->getBody()->getContents()));
            case 400:
                throw new BadRequestException(json_decode($response->getBody()->getContents())->message);
            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
            case 404:
                throw new NotFoundException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }
}