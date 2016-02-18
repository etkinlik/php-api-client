<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\UnknownException;
use EtkinlikApi\Exception\NotFoundException;
use EtkinlikApi\Exception\UnauthorizedException;
use EtkinlikApi\Model\Ilce;
use Exception;
use Httpful\Response;

class IlceService
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
     * @param int $sehirId
     * @return Ilce[]
     *
     * @throws Exception
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListeBySehirId($sehirId)
    {
        // response alalım
        $response = $this->container->apiService->get('/sehir/' . $sehirId . '/ilceler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Ilce[] $ilceler */
                $ilceler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $ilceler[] = new Ilce($item);
                }

                return $ilceler;

                break;

            case 400: throw new Exception($response->body->mesaj); break;
            case 401: throw new UnauthorizedException($response->body->mesaj); break;
            case 404: throw new NotFoundException($response->body->mesaj); break;
            default: throw new UnknownException($response);
        }
    }
}