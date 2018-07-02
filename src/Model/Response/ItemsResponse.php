<?php namespace EtkinlikApi\Model\Response;

use EtkinlikApi\Model\Inner\Meta;

abstract class ItemsResponse
{
    /**
     * @var Meta
     */
    private $meta;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param \stdClass $object
     * @param $class
     */
    public function __construct($object, $class)
    {
        // sayfalama oluşturalım
        $this->meta = new Meta($object->meta);

        // kayıtlar üzerinde dönelim
        foreach ($object->items as $item) {
            $this->items[] = new $class($item);
        }
    }

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }
}