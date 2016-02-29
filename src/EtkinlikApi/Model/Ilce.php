<?php namespace EtkinlikApi\Model;

class Ilce
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $adi;

    /**
     * @var Sehir
     */
    private $sehir;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->adi = $item->adi;
        $this->sehir = new Sehir($item->sehir);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAdi()
    {
        return $this->adi;
    }

    /**
     * @return string
     */
    public function getSehir()
    {
        return $this->sehir;
    }
}