<?php namespace EtkinlikApi\Model;

use Carbon\Carbon;

class Event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $content;

    /**
     * @var Carbon
     */
    private $start;

    /**
     * @var Carbon
     */
    private $end;

    /**
     * @var bool
     */
    private $isFree;

    /**
     * @var string
     */
    private $posterUrl;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $facebookUrl;

    /**
     * @var string
     */
    private $twitterUrl;

    /**
     * @var string
     */
    private $hashtag;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var string
     */
    private $liveUrl;

    /**
     * @var string
     */
    private $androidUrl;

    /**
     * @var string
     */
    private $iosUrl;

    /**
     * @var Format
     */
    private $format;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var Venue
     */
    private $venue;

    /**
     * @var Tag[]
     */
    private $tags = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->name = $item->name;
        $this->slug = $item->slug;
        $this->url = $item->url;
        $this->content = $item->content;
        $this->start = Carbon::createFromFormat(Carbon::ISO8601, $item->start);
        $this->end = Carbon::createFromFormat(Carbon::ISO8601, $item->end);
        $this->isFree = $item->is_free;
        $this->posterUrl = $item->poster_url;

        $this->phone = $item->phone;
        $this->email = $item->email;
        $this->facebookUrl = $item->facebook_url;
        $this->twitterUrl = $item->twitter_url;
        $this->hashtag = $item->hashtag;
        $this->webUrl = $item->web_url;
        $this->liveUrl = $item->live_url;
        $this->androidUrl = $item->android_url;
        $this->iosUrl = $item->ios_url;

        $this->format = new Format($item->format);

        $this->category = new Category($item->category);

        $this->venue = empty($item->mekan) ? null : new Venue($item->venue);

        // etiketler üzerinden dönelim
        foreach ($item->tags as $tag) {
            $this->tags[] = new Tag($tag);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return Carbon
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return Carbon
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @deprecated use isUcretli
     *
     * @return bool
     */
    public function isFree()
    {
        return $this->isFree;
    }

    /**
     * @return string
     */
    public function getPosterUrl()
    {
        return $this->posterUrl;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * @return string
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    /**
     * @return string
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @return string
     */
    public function getLiveUrl()
    {
        return $this->liveUrl;
    }

    /**
     * @return string
     */
    public function getAndroidUrl()
    {
        return $this->androidUrl;
    }

    /**
     * @return string
     */
    public function getIosUrl()
    {
        return $this->iosUrl;
    }

    /**
     * @return Format
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}