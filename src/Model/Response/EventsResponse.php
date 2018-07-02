<?php namespace EtkinlikApi\Model\Response;

use EtkinlikApi\Model\Event;

class EventsResponse extends ItemsResponse
{
    /**
     * @param \stdClass $object
     */
    public function __construct($object)
    {
        parent::__construct($object, Event::class);
    }

    /**
     * @return Event[]
     */
    public function getEvents()
    {
        return $this->items;
    }
}