<?php namespace EtkinlikApi\Service;

use EtkinlikApi\ApiClient;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ApiService
{
    /**
     * @Inject
     * @var ApiClient
     */
    private $client;

    /**
     * @param string $address
     * @param string $body
     * @return Response
     */
    public function get($address, $data = [])
    {
        $client = new Client([
            'http_errors' => false,
            'timout'      => 5
        ]);

        return $client->get('https://backend.etkinlik.io/api/v2' . $address, [
            'headers' => [
                'X-Etkinlik-Token' => $this->client->token
            ],
            'json'    => $data
        ]);
    }
}