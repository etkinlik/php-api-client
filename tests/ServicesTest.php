<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient('token buraya gelecek');

        $events = $client->event->getItems(
            (new \EtkinlikApi\Model\Config\EventsConfig())
                ->addCategoryId(4015)
        );
        $formats = $client->format->getItems();
        $categories = $client->category->getListe();

        $venues = $client->venue->getItems(
            (new \EtkinlikApi\Model\Config\VenuesConfig())
                ->addCityId(7)
        );

        $this->assertEquals(122, $events->getMeta()->getTotalCount());
        $this->assertEquals(22, count($formats));
        $this->assertEquals(51, count($categories));
        $this->assertEquals(819, $venues->getMeta()->getTotalCount());
    }
}