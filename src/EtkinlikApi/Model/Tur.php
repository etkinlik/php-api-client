<?php namespace EtkinlikApi\Model;

class Tur
{
    private $id;
    private $adi;
    private $radi;

    public function __construct($item)
    {
        $this->id = $item->id;
        $this->adi = $item->adi;
        $this->radi = $item->radi;
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
     * @return mixed
     */
    public function getRadi()
    {
        return $this->radi;
    }
}