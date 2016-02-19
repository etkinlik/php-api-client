<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BadRequestException;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Semt;
use Httpful\Response;

class SemtService
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
     * @param int $ilceId
     * @return Semt[]
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     * @throws NotFoundException
     */
    public function getListeByIlceId($ilceId)
    {
        // response alalım
        $response = $this->container->apiService->get('/ilce/' . $ilceId . '/semtler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Semt[] $semtler */
                $semtler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $semtler[] = new Semt($item);
                }

                return $semtler;

                break;

            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}