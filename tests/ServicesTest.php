<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient();

        $turler = $client->turService->getListe();
        $kategoriler = $client->kategoriService->getListe();

        $this->assertEquals(21, count($turler));
        $this->assertEquals(49, count($kategoriler));
    }
}