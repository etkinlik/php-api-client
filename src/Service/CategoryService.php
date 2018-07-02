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
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->client->api->get('/categories');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                /** @var Category[] $kategoriler */
                $kategoriler = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $kategoriler[] = new Category($item);
                }

                return $kategoriler;

                break;

            case 401:
                throw new UnauthorizedException(json_decode($response->getBody()->getContents())->message);
                break;
            default:
                throw new UnknownException($response);
        }
    }
}