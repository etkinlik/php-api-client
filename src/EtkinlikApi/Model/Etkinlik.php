<?php namespace EtkinlikApi\Model;

use Carbon\Carbon;
use EtkinlikApi\Model\Etkinlik\Ozellik;

class Etkinlik
{
    private $id;
    private $adi;
    private $radi;
    private $url;
    private $icerik;
    private $baslangic;
    private $bitis;
    private $ucretliMi;

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

        $this->ozellik = new Ozellik($item->ozellik);

        $this->tur = new Tur($item->tur);

        $this->kategori = new Kategori($item->kategori);

        $this->mekan = empty($item->mekan) ? null : new Mekan($item->mekan);

        // etiketler üzerinden dönelim
        foreach ($item->etiketler as $etiket) {

            $this->etiketler[] = new Etiket($etiket);
        }
    }
}