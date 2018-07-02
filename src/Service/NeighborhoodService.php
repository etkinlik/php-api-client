<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Neighborhood;

class NeighborhoodService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @param int $districtId
     * @return Neighborhood[]
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     * @throws NotFoundException
     */
    public function getListeByIlceId($districtId)
    {
        // response alalım
        $response = $this->client->api->get('/district/' . $districtId . '/neighborhoods');

        // durum koduna göre işlem yapalım
        switch ($response->getStatusCode()) {

            case 200:

                /** @var Neighborhood[] $semtler */
                $semtler = [];

                // body üzerinde dönelim
                foreach (json_decode($response->getBody()->getContents()) as $item) {
                    $semtler[] = new Neighborhood($item);
                }

                return $semtler;

                break;

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