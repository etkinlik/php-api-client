<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Kategori;
use Httpful\Response;

class KategoriService
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
     * @return Kategori[]
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->container->apiService->get('/kategoriler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Kategori[] $kategoriler */
                $kategoriler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $kategoriler[] = new Kategori($item);
                }

                return $kategoriler;

                break;

            case 401: throw new UnauthorizedException($response->body->mesaj); break;
            default: throw new UnknownException($response);
        }
    }
}