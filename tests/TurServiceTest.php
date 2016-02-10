<?php

class TurServiceTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \EtkinlikApi\ApiClient();
        $turler = $client->turService->liste();

        $this->assertEquals(21, count($turler));
    }
}