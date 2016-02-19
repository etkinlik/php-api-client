<?php namespace EtkinlikApi\Model\Config;

class EtkinlikListeConfig
{
    /**
     * @var array
     */
    private $turIds = [];

    /**
     * @var array
     */
    private $kategoriIds = [];

    /**
     * @var array
     */
    private $mekanIds = [];

    /**
     * @var array
     */
    private $sehirIds = [];

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
            'turIds' => implode(',', $this->turIds),
            'kategoriIds' => implode(',', $this->kategoriIds),
            'mekanIds' => implode(',', $this->mekanIds),
            'sehirIds' => implode(',', $this->sehirIds),
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
        ]);
    }

    /**
     * @param int $turId
     * @return $this
     */
    public function addTurId($turId)
    {
        $this->turIds[] = $turId;
        return $this;
    }

    /**
     * @param int $kategoriId
     * @return $this
     */
    public function addKategoriId($kategoriId)
    {
        $this->kategoriIds[] = $kategoriId;
        return $this;
    }

    /**
     * @param int $mekanId
     * @return $this
     */
    public function addMekanId($mekanId)
    {
        $this->mekanIds[] = $mekanId;
        return $this;
    }

    /**
     * @param int $sehirId
     * @return $this
     */
    public function addSehirId($sehirId)
    {
        $this->sehirIds[] = $sehirId;
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