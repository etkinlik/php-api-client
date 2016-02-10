<?php namespace EtkinlikApi\Model;

class EtkinlikListeConfig
{
    /**
     * @var int
     */
    private $formatId;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var int
     */
    private $venueId;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $take;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'formatId' => $this->formatId,
            'categoryId' => $this->categoryId,
            'venueId' => $this->venueId,
            'cityId' => $this->cityId,
            'page' => $this->page,
            'take' => $this->take
        ];
    }

    /**
     * @return int
     */
    public function getFormatId()
    {
        return $this->formatId;
    }

    /**
     * @param int $formatId
     * @return $this
     */
    public function setFormatId($formatId)
    {
        $this->formatId = $formatId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getVenueId()
    {
        return $this->venueId;
    }

    /**
     * @param int $venueId
     * @return $this
     */
    public function setVenueId($venueId)
    {
        $this->venueId = $venueId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     * @return $this
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getTake()
    {
        return $this->take;
    }

    /**
     * @param int $take
     * @return $this
     */
    public function setTake($take)
    {
        $this->take = $take;
        return $this;
    }
}