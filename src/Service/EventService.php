<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\GoneException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\MovedException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Config\EventsConfig;
use EtkinlikApi\Model\Event;
use EtkinlikApi\Model\Response\EventsResponse;

class EventService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @param EventsConfig|null $params
     * @return EventsResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getItems($params = null)
    {
        // response alalım
        $response = $this->client->api->get('/events',
            $params instanceof EventsConfig ? $params->toArray() : []
        );

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:
                return new EventsResponse(json_decode($response->getBody()->getContents()));
            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     *
     * @return Event
     *
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws MovedException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->client->api->get('/events/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:
                return new Event(json_decode($response->getBody()->getContents()));
            case 301:
                $object = json_decode($response->getBody()->getContents());

                throw new MovedException(
                    $object->message,
                    $object->new_id,
                    $object->new_name,
                    $object->new_slug
                );

            case 400:
                throw new BadRequestException(json_decode($response->getBody()->getContents())->message);
            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
            case 404:
                throw new NotFoundException(json_decode($response->getBody()->getContents())->message);
            case 410:
                throw new GoneException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }
}