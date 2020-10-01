<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Category;

class CategoryService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @return Category[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getItems()
    {
        // response alalım
        $response = $this->client->api->get('/categories');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                $items = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $items[] = new Category($item);
                }

                return $items;

            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
        }

        throw new UnknownException($response);
    }

    /**
     * @return Category[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     *
     * @deprecated use getItems
     */
    public function getListe()
    {
        return $this->getItems();
    }
}