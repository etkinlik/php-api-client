<?php namespace EtkinlikApi\Model\Response;

use EtkinlikApi\Model\Mekan;
use EtkinlikApi\Model\Soyut\ListePagedResponse;

class MekanPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Mekan::class);
    }

    /**
     * @return Mekan[]
     */
    public function getMekanlar()
    {
        return $this->kayitlar;
    }
}