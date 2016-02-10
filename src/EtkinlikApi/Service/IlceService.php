<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BilinmeyenDurumException;
use EtkinlikApi\Exception\KayitBulunamadiException;
use EtkinlikApi\Exception\YetkilendirmeException;
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
     * @throws YetkilendirmeException
     * @throws BilinmeyenDurumException
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
            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            case 404: throw new KayitBulunamadiException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException($response);
        }
    }
}