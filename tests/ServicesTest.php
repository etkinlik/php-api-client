<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient('token buraya gelecek');

        $events = $client->event->getItems(
            (new \EtkinlikApi\Model\Config\EventsConfig())
                ->setStartGte(\Carbon\Carbon::now()->addDay()->toDateTimeString())
                ->setEndLte(\Carbon\Carbon::now()->addDay(4)->toDateTimeString())
                ->addCategoryId(4015)
        );

        $event = $client->event->getById(104289);

        $formats = $client->format->getItems();
        $categories = $client->category->getListe();

        $venues = $client->venue->getItems(
            (new \EtkinlikApi\Model\Config\VenuesConfig())
                ->addCityId(7)
        );

        $this->assertEquals(161, $events->getMeta()->getTotalCount());
        $this->assertEquals('kulis-sanat-tiyatrosu', $event->getVenue()->getSlug());
        $this->assertEquals(22, count($formats));
        $this->assertEquals(51, count($categories));
        $this->assertEquals(826, $venues->getMeta()->getTotalCount());
    }
}