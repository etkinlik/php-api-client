<?php namespace EtkinlikApi\Model\Inner;

class Meta
{
    /**
     * @var int
     */
    private $totalCount;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->totalCount = $item->total_count;
    }

    /**
     * Sayfalama'dan bağımsız olarak toplamda kaç adet sonuç olduğunu gösterir.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }
}