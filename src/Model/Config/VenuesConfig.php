<?php namespace EtkinlikApi\Model\Config;

class VenuesConfig
{
    /**
     * @var array
     */
    private $cityIds = [];

    /**
     * @var array
     */
    private $districtIds = [];

    /**
     * @var array
     */
    private $neighborhoodIds = [];

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

        if ( ! empty($this->cityIds)) {
            $items['city_ids'] = implode(',', $this->cityIds);
        }

        if ( ! empty($this->districtIds)) {
            $items['district_ids'] = implode(',', $this->districtIds);
        }

        if ( ! empty($this->neighborhoodIds)) {
            $items['neighborhood_ids'] = implode(',', $this->neighborhoodIds);
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
    public function addCityId($id)
    {
        $this->cityIds[] = $id;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addDistrictId($id)
    {
        $this->districtIds[] = $id;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addNeighborhoodId($id)
    {
        $this->neighborhoodIds[] = $id;

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