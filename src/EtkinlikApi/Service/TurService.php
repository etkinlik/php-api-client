<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BilinmeyenDurumException;
use EtkinlikApi\Exception\YetkilendirmeException;
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
     * @throws YetkilendirmeException
     */
    public function liste()
    {
        // response alalım
        $response = $this->container->apiService->get('/turler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Tur[] $kayitlar */
                $kayitlar = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $kayitlar[] = new Tur($item);
                }

                return $kayitlar;

                break;

            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException;
        }
    }
}