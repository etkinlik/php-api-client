<?php namespace EtkinlikApi\Model;

use Carbon\Carbon;
use EtkinlikApi\Model\Etkinlik\Ozellik;

class Etkinlik
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $adi;

    /**
     * @var string
     */
    private $radi;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $icerik;

    /**
     * @var Carbon
     */
    private $baslangic;

    /**
     * @var Carbon
     */
    private $bitis;

    /**
     * @var bool
     */
    private $ucretliMi;

    /**
     * @var int
     */
    private $durum;

    /**
     * @var Ozellik
     */
    private $ozellik;

    /**
     * @var Tur
     */
    private $tur;

    /**
     * @var Kategori
     */
    private $kategori;

    /**
     * @var Mekan
     */
    private $mekan;

    /**
     * @var Etiket[]
     */
    private $etiketler;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->adi = $item->adi;
        $this->radi = $item->radi;
        $this->url = $item->url;
        $this->icerik = $item->icerik;
        $this->baslangic = Carbon::createFromFormat(Carbon::ISO8601, $item->baslangic);
        $this->bitis = Carbon::createFromFormat(Carbon::ISO8601, $item->bitis);
        $this->ucretliMi = $item->ucretliMi;
        $this->durum = $item->durum;

        $this->ozellik = new Ozellik($item->ozellik);

        $this->tur = new Tur($item->tur);

        $this->kategori = new Kategori($item->kategori);

        $this->mekan = empty($item->mekan) ? null : new Mekan($item->mekan);

        // etiketler üzerinden dönelim
        foreach ($item->etiketler as $etiket) {

            $this->etiketler[] = new Etiket($etiket);
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
    public function getAdi()
    {
        return $this->adi;
    }

    /**
     * @return string
     */
    public function getRadi()
    {
        return $this->radi;
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
    public function getIcerik()
    {
        return $this->icerik;
    }

    /**
     * @return Carbon
     */
    public function getBaslangic()
    {
        return $this->baslangic;
    }

    /**
     * @return Carbon
     */
    public function getBitis()
    {
        return $this->bitis;
    }

    /**
     * @return boolean
     */
    public function isUcretliMi()
    {
        return $this->ucretliMi;
    }

    /**
     * @return int
     */
    public function getDurum()
    {
        return $this->durum;
    }

    /**
     * @return Ozellik
     */
    public function getOzellik()
    {
        return $this->ozellik;
    }

    /**
     * @return Tur
     */
    public function getTur()
    {
        return $this->tur;
    }

    /**
     * @return Kategori
     */
    public function getKategori()
    {
        return $this->kategori;
    }

    /**
     * @return Mekan
     */
    public function getMekan()
    {
        return $this->mekan;
    }

    /**
     * @return Etiket[]
     */
    public function getEtiketler()
    {
        return $this->etiketler;
    }
}