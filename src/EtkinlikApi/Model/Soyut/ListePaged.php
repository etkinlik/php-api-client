<?php namespace EtkinlikApi\Model\Soyut;

use EtkinlikApi\Model\Sayfalama;

abstract class ListePaged
{
    /**
     * @var Sayfalama
     */
    private $sayfalama;

    /**
     * @var array
     */
    protected $kayitlar = [];

    /**
     * @param \stdClass $item
     * @param $class
     */
    public function __construct($item, $class)
    {
        $this->sayfalama = new Sayfalama($item->sayfalama);

        // kayıtlar üzerinde dönelim
        foreach ($item->kayitlar as $kayit) {
            $this->kayitlar[] = new $class($kayit);
        }
    }

    /**
     * @return Sayfalama
     */
    public function getSayfalama()
    {
        return $this->sayfalama;
    }
}