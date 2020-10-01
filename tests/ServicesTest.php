<?php

use Carbon\Carbon;
use EtkinlikApi\ApiClient;
use EtkinlikApi\Model\Config\EventsConfig;
use EtkinlikApi\Model\Config\VenuesConfig;

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new ApiClient('token buraya gelecek');

        $events = $client->event->getItems(
            (new EventsConfig())
                ->setStartGte(Carbon::now()->addDay()->toDateTimeString())
                ->setEndLte(Carbon::now()->addDay(4)->toDateTimeString())
                ->addCategoryId(4015)
        );

        $event = $client->event->getById(104289);

        $formats = $client->format->getItems();
        $categories = $client->category->getItems();

        $venues = $client->venue->getItems(
            (new VenuesConfig())
                ->addCityId(7)
        );

        $this->assertEquals(161, $events->getMeta()->getTotalCount());
        $this->assertEquals('kulis-sanat-tiyatrosu', $event->getVenue()->getSlug());
        $this->assertCount(22, $formats);
        $this->assertCount(51, $categories);
        $this->assertEquals(826, $venues->getMeta()->getTotalCount());
    }
}