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
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    public function get($endpoint, $data = [])
    {
        $client = new Client([
            'http_errors' => false,
            'timout'      => 5
        ]);

        return $client->get('https://backend.etkinlik.io/api/v2' . $endpoint, [
            'headers' => [
                'X-Etkinlik-Token' => $this->client->token
            ],
            'json'    => $data
        ]);
    }
}