<?php namespace EtkinlikApi\Model\Response;

use EtkinlikApi\Model\Venue;

class VenuesResponse extends ItemsResponse
{
    /**
     * @param \stdClass $object
     */
    public function __construct($object)
    {
        parent::__construct($object, Venue::class);
    }

    /**
     * @return Venue[]
     */
    public function getVenues()
    {
        return $this->items;
    }
}