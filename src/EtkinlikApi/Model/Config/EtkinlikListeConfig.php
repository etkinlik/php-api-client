<?php namespace EtkinlikApi\Model\Config;

class EtkinlikListeConfig
{
    /**
     * @var int
     */
    private $turId;

    /**
     * @var int
     */
    private $kategoriId;

    /**
     * @var int
     */
    private $mekanId;

    /**
     * @var int
     */
    private $sehirId;

    /**
     * @var int
     */
    private $sayfa;

    /**
     * @var int
     */
    private $adet;

    /**
     * @return string
     */
    public function serialize()
    {
        return json_encode([
            'turId' => $this->turId,
            'kategoriId' => $this->kategoriId,
            'mekanId' => $this->mekanId,
            'sehirId' => $this->sehirId,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
        ]);
    }

    /**
     * @param int $turId
     * @return $this
     */
    public function setTurId($turId)
    {
        $this->turId = $turId;
        return $this;
    }

    /**
     * @param int $kategoriId
     * @return $this
     */
    public function setKategoriId($kategoriId)
    {
        $this->kategoriId = $kategoriId;
        return $this;
    }

    /**
     * @param int $mekanId
     * @return $this
     */
    public function setMekanId($mekanId)
    {
        $this->mekanId = $mekanId;
        return $this;
    }

    /**
     * @param int $sehirId
     * @return $this
     */
    public function setSehirId($sehirId)
    {
        $this->sehirId = $sehirId;
        return $this;
    }

    /**
     * @param int $sayfa
     * @return $this
     */
    public function setSayfa($sayfa)
    {
        $this->sayfa = $sayfa;
        return $this;
    }

    /**
     * @param int $adet
     * @return $this
     */
    public function setAdet($adet)
    {
        $this->adet = $adet;
        return $this;
    }
}