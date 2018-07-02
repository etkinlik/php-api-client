# EtkinlikApi

```php
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
```