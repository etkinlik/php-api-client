<?php namespace EtkinlikApi\Model\Config;

class MekanListeConfig
{
    /**
     * @var int
     */
    private $sehirId;

    /**
     * @var int
     */
    private $ilceId;

    /**
     * @var int
     */
    private $semtId;

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
            'sehirId' => $this->sehirId,
            'ilceId' => $this->ilceId,
            'semtId' => $this->semtId,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
        ]);
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
     * @param int $ilceId
     * @return $this
     */
    public function setIlceId($ilceId)
    {
        $this->ilceId = $ilceId;
        return $this;
    }

    /**
     * @param int $semtId
     * @return $this
     */
    public function setSemtId($semtId)
    {
        $this->semtId = $semtId;
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