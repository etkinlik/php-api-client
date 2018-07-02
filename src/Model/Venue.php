<?php namespace EtkinlikApi\Model;

class Venue
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $about;

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
    private $phone;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var string
     */
    private $facebookUrl;

    /**
     * @var string
     */
    private $twitterUrl;

    /**
     * @var City
     */
    private $city;

    /**
     * @var District
     */
    private $district;

    /**
     * @var Neighborhood|null
     */
    private $neighborhood;

    /**
     * @var string
     */
    private $address;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->name = $item->name;
        $this->slug = $item->slug;
        $this->about = $item->about;

        $this->lat = $item->lat;
        $this->lng = $item->lng;

        $this->phone = $item->phone;
        $this->webUrl = $item->web_url;
        $this->facebookUrl = $item->facebook_url;
        $this->twitterUrl = $item->twitter_url;

        $this->city = new City($item->city);
        $this->district = new District($item->district);
        $this->neighborhood = empty($item->semt) ? null : new Neighborhood($item->neighborhood);
        $this->address = $item->address;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @return string
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * @return string
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return District
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return Neighborhood|null
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}