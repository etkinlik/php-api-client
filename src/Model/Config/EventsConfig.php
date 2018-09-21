<?php namespace EtkinlikApi\Model\Config;

class EventsConfig
{
    /**
     * @var array
     */
    private $formatIds = [];

    /**
     * @var array
     */
    private $categoryIds = [];

    /**
     * @var array
     */
    private $venueIds = [];

    /**
     * @var array
     */
    private $cityIds = [];

    /**
     * @var string|null
     */
    private $startGte;

    /**
     * @var string|null
     */
    private $endLte;

    /**
     * @var int
     */
    private $skip = 0;

    /**
     * @var int
     */
    private $take = 50;

    public function toArray()
    {
        $items = [];

        if ( ! empty($this->formatIds)) {
            $items['format_ids'] = implode(',', $this->formatIds);
        }

        if ( ! empty($this->categoryIds)) {
            $items['category_ids'] = implode(',', $this->categoryIds);
        }

        if ( ! empty($this->venueIds)) {
            $items['venue_ids'] = implode(',', $this->venueIds);
        }

        if ( ! empty($this->cityIds)) {
            $items['city_ids'] = implode(',', $this->cityIds);
        }

        if ( ! empty($this->startGte)) {
            $items['start_gte'] = $this->startGte;
        }

        if ( ! empty($this->endLte)) {
            $items['end_lte'] = $this->endLte;
        }

        return array_merge($items, [
            'skip' => $this->skip,
            'take' => $this->take
        ]);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addFormatId($id)
    {
        $this->formatIds[] = $id;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addCategoryId($id)
    {
        $this->categoryIds[] = $id;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addVenueId($id)
    {
        $this->venueIds[] = $id;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addCityId($id)
    {
        $this->cityIds[] = $id;

        return $this;
    }

    /**
     * @param string $startGte
     * @return $this
     */
    public function setStartGte($startGte)
    {
        $this->startGte = $startGte;

        return $this;
    }

    /**
     * @param string $endLte
     * @return $this
     */
    public function setEndLte($endLte)
    {
        $this->endLte = $endLte;

        return $this;
    }

    /**
     * @param int $skip
     * @return $this
     */
    public function setSkip($skip)
    {
        $this->skip = $skip;

        return $this;
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