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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAdi()
    {
        return $this->adi;
    }

    /**
     * @return Sehir
     */
    public function getSehir()
    {
        return $this->sehir;
    }
}