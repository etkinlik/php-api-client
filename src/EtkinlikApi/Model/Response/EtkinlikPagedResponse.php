<?php namespace EtkinlikApi\Model\Response;

use EtkinlikApi\Model\Etkinlik;
use EtkinlikApi\Model\Soyut\ListePagedResponse;

class EtkinlikPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Etkinlik::class);
    }

    /**
     * @return Etkinlik[]
     */
    public function getEtkinlikler()
    {
        return $this->kayitlar;
    }
}