<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient('tokenburayagelecek');

        $etkinlikler = $client->etkinlikService->getListe(
            (new \EtkinlikApi\Model\Config\EtkinlikListeConfig())
                ->addKategoriId(456)
                ->addKategoriId(54)
                ->setSayfa(1)
        );
        $turler = $client->turService->getListe();
        $kategoriler = $client->kategoriService->getListe();

        $this->assertEquals(44, $etkinlikler->getSayfalama()->getToplamKayit());
        $this->assertEquals(21, count($turler));
        $this->assertEquals(49, count($kategoriler));
    }
}