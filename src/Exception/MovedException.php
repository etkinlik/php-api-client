<?php namespace EtkinlikApi\Exception;

class MovedException extends \Exception
{
    /** @var int|null */
    private $newId;

    /** @var string|null */
    private $newName;

    /** @var string|null */
    private $newSlug;

    /**
     * @param string $message
     * @param int $newId
     * @param string $newName
     * @param string $newSlug
     */
    public function __construct($message, $newId, $newName, $newSlug)
    {
        parent::__construct($message);

        $this->newId = $newId;
        $this->newName = $newName;
        $this->newSlug = $newSlug;
    }

    /**
     * @return int|null
     */
    public function getNewId()
    {
        return $this->newId;
    }

    /**
     * @return null|string
     */
    public function getNewName()
    {
        return $this->newName;
    }

    /**
     * @return null|string
     */
    public function getNewSlug()
    {
        return $this->newSlug;
    }
}