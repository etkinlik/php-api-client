<?php namespace EtkinlikApi\Model;

class Mekan
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
     * @var string
     */
    private $radi;

    /**
     * @var string
     */
    private $adresi;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var string
     */
    private $telefon;

    /**
     * @var string
     */
    private $websitesi;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var Ilce
     */
    private $ilce;

    /**
     * @var Semt
     */
    private $semt;

    /**
     * @param \stdClass $item
     */
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
    public function getRadi()
    {
        return $this->radi;
    }

    /**
     * @return string
     */
    public function getAdresi()
    {
        return $this->adresi;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @return string
     */
    public function getWebsitesi()
    {
        return $this->websitesi;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return Ilce
     */
    public function getIlce()
    {
        return $this->ilce;
    }

    /**
     * @return Semt
     */
    public function getSemt()
    {
        return $this->semt;
    }
}