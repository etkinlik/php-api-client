<?php namespace EtkinlikApi\Model\Etkinlik;

class Ozellik
{
    /**
     * @var string
     */
    private $telefon;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $hashtag;

    /**
     * @var string
     */
    private $websitesi;

    /**
     * @var string
     */
    private $canliyayin;

    /**
     * @var string
     */
    private $android;

    /**
     * @var string
     */
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
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
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
     * @return string
     */
    public function getHashtag()
    {
        return $this->hashtag;
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
    public function getCanliyayin()
    {
        return $this->canliyayin;
    }

    /**
     * @return string
     */
    public function getAndroid()
    {
        return $this->android;
    }

    /**
     * @return string
     */
    public function getIos()
    {
        return $this->ios;
    }
}