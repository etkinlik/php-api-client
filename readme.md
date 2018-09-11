# EtkinlikApi

```php
$client = new \EtkinlikApi\ApiClient('token buraya gelecek');

$formats = $client->format->getItems();

$categories = $client->category->getListe();

$events = $client->event->getItems(
    (new \EtkinlikApi\Model\Config\EventsConfig())
        ->addCategoryId(4015)
);

$event = $client->event->getById(104289);

$venues = $client->venue->getItems(
    (new \EtkinlikApi\Model\Config\VenuesConfig())
        ->addCityId(7)
);
```