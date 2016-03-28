<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\MovedException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Config\MekanListeConfig;
use EtkinlikApi\Model\Mekan;
use EtkinlikApi\Model\Response\MekanPagedResponse;

class MekanService
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
     * @param MekanListeConfig $params
     * @return MekanPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(MekanListeConfig $params = null)
    {
        // response alalım
        $response = $this->container->apiService->get('/mekanlar', is_null($params) ? [] : $params->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MekanPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     *
     * @return Mekan
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
        $response = $this->container->apiService->get('/mekan/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Mekan($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}