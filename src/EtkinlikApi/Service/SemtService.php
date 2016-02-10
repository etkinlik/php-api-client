<?php namespace EtkinlikApi\Service;

use EtkinlikApi\Container;
use EtkinlikApi\Exception\BilinmeyenDurumException;
use EtkinlikApi\Exception\KayitBulunamadiException;
use EtkinlikApi\Exception\YetkilendirmeException;
use EtkinlikApi\Model\Semt;
use Exception;
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
     * @throws Exception
     * @throws YetkilendirmeException
     * @throws BilinmeyenDurumException
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

            case 400: throw new Exception($response->body->mesaj); break;
            case 401: throw new YetkilendirmeException($response->body->mesaj); break;
            case 404: throw new KayitBulunamadiException($response->body->mesaj); break;
            default: throw new BilinmeyenDurumException($response);
        }
    }
}