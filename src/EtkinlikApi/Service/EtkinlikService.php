<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BilinmeyenDurumException;
use EtkinlikApi\Exception\KayitBulunamadiException;
use EtkinlikApi\Exception\MukerrerKayitException;
use EtkinlikApi\Exception\YetkilendirmeException;
use EtkinlikApi\Model\Etkinlik;
use EtkinlikApi\Model\EtkinlikListeConfig;
use Exception;

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
     * @return Etkinlik[]
     * @throws YetkilendirmeException
     * @throws BilinmeyenDurumException
     */
    public function getListe(EtkinlikListeConfig $params)
    {
        // response alalım
        $response = $this->container->apiService->get('/etkinlikler', $params->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                /** @var Etkinlik[] $etinlikler */
                $etinlikler = [];

                // body üzerinde dönelim
                foreach ($response->body as $item) {
                    $etinlikler[] = new Etkinlik($item);
                }

                return $etinlikler;

                break;

            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException($response);
        }
    }

    /**
     * @param int $id
     *
     * @return Etkinlik
     *
     * @throws Exception
     * @throws KayitBulunamadiException
     * @throws MukerrerKayitException
     * @throws YetkilendirmeException
     * @throws BilinmeyenDurumException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->container->apiService->get('/etkinlik/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Etkinlik($response->body); break;
            case 301: throw new MukerrerKayitException($response->body->mesaj, $response->body->yeniId); break;
            case 400: throw new Exception($response->body->mesaj); break;
            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            case 404: throw new KayitBulunamadiException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException($response);
        }
    }
}