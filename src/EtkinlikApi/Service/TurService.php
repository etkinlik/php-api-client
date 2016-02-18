<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Tur;
use Httpful\Response;

class TurService
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
     * @return Tur[]
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->container->apiService->get('/turler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Tur[] $turler */
                $turler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $turler[] = new Tur($item);
                }

                return $turler;

                break;

            case 401: throw new UnauthorizedException($response->body->mesaj); break;
            default: throw new UnknownException($response);
        }
    }
}