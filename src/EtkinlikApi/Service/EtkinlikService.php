<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\MovedException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Config\EtkinlikListeConfig;
use EtkinlikApi\Model\Etkinlik;
use EtkinlikApi\Model\Response\EtkinlikPagedResponse;

class EtkinlikService
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param EtkinlikListeConfig $params
     * @return EtkinlikPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(EtkinlikListeConfig $params = null)
    {
        // response alalım
        $response = $this->container->apiService->get('/etkinlikler', is_null($params) ? [] : $params->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EtkinlikPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     *
     * @return Etkinlik
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
        $response = $this->container->apiService->get('/etkinlik/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Etkinlik($response->body);
            case 301: throw new MovedException($response->body->mesaj, $response->body->yeniId);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}