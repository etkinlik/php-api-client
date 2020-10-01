<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Format;

class FormatService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @return Format[]
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getItems()
    {
        // response alalım
        $response = $this->client->api->get('/formats');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                $items = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $items[] = new Format($item);
                }

                return $items;

            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);

    }
}