<?php namespace EtkinlikApi\Model\Etkinlik;

class Ozellik
{
    private $telefon;
    private $mail;
    private $facebook;
    private $twitter;
    private $hashtag;
    private $websitesi;
    private $canliyayin;
    private $android;
    private $ios;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->telefon = $item->telefon;
        $this->mail = $item->mail;
        $this->facebook = $item->facebook;
        $this->twitter = $item->twitter;
        $this->hashtag = $item->hashtag;
        $this->websitesi = $item->websitesi;
        $this->canliyayin = $item->canliyayin;
        $this->android = $item->android;
        $this->ios = $item->ios;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return mixed
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * @return mixed
     */
    public function getWebsitesi()
    {
        return $this->websitesi;
    }

    /**
     * @return mixed
     */
    public function getCanliyayin()
    {
        return $this->canliyayin;
    }

    /**
     * @return mixed
     */
    public function getAndroid()
    {
        return $this->android;
    }

    /**
     * @return mixed
     */
    public function getIos()
    {
        return $this->ios;
    }
}