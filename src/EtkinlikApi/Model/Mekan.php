<?php namespace EtkinlikApi\Model;

class Mekan
{
    private $id;
    private $adi;
    private $radi;
    private $adresi;
    private $lat;
    private $lng;
    private $telefon;
    private $websitesi;
    private $facebook;
    private $twitter;

    /**
     * @var Ilce
     */
    private $ilce;

    /**
     * @var Semt
     */
    private $semt;

    public function __construct($item)
    {
        $this->id = $item->id;
        $this->adi = $item->adi;
        $this->radi = $item->radi;
        $this->adresi = $item->adresi;

        $this->lat = $item->lat;
        $this->lng = $item->lng;

        $this->telefon = $item->telefon;
        $this->websitesi = $item->websitesi;
        $this->facebook = $item->facebook;
        $this->twitter = $item->twitter;

        $this->ilce = new Ilce($item->ilce);

        $this->semt = empty($item->semt) ? null : new Semt($item->semt);
    }
}