<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient('token-buraya-gelecek');

        $etkinlikler = $client->etkinlikService->getListe(
            (new \EtkinlikApi\Model\EtkinlikListeConfig())
                ->setPage(1)
                ->setTake(2)
        );
        $turler = $client->turService->getListe();
        $kategoriler = $client->kategoriService->getListe();

        $this->assertEquals(2, count($etkinlikler));
        $this->assertEquals(21, count($turler));
        $this->assertEquals(49, count($kategoriler));
    }
}