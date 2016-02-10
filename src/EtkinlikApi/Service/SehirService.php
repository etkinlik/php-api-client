<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BilinmeyenDurumException;
use EtkinlikApi\Exception\YetkilendirmeException;
use EtkinlikApi\Model\Sehir;
use Httpful\Response;

class SehirService
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
     * @return Sehir[]
     * @throws YetkilendirmeException
     * @throws BilinmeyenDurumException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->container->apiService->get('/sehirler');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Sehir[] $sehirler */
                $sehirler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $sehirler[] = new Sehir($item);
                }

                return $sehirler;

                break;

            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException($response);
        }
    }
}