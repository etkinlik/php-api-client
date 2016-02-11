<?php namespace EtkinlikApi\Model;

use EtkinlikApi\Model\Soyut\ListePaged;

class EtkinlikPaged extends ListePaged
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