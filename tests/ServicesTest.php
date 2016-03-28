<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient('X-ETKINLIK-TOKEN');

        $etkinlikler = $client->etkinlikService->getListe(
            (new \EtkinlikApi\Model\Config\EtkinlikListeConfig())
                ->addKategoriId(456)
                ->addKategoriId(54)
                ->setSayfa(1)
        );
        $turler = $client->turService->getListe();
        $kategoriler = $client->kategoriService->getListe();

        $mekanlar = $client->mekanService->getListe(
            (new \EtkinlikApi\Model\Config\MekanListeConfig())
                ->setSehirId(7)
                ->setSayfa(1)
        );

        $this->assertEquals(39, $etkinlikler->getSayfalama()->getToplamKayit());
        $this->assertEquals(21, count($turler));
        $this->assertEquals(49, count($kategoriler));
        $this->assertEquals(194, $mekanlar->getSayfalama()->getToplamKayit());
    }
}