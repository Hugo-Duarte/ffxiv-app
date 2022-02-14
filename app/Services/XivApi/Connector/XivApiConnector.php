<?php

namespace App\Services\XivApi\Connector;

use App\Services\XivApi\XivApiClient;
use Illuminate\Http\Client\RequestException;

class XivApiConnector
{
    private XivApiClient $client;

    public function __construct(XivApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Make an API request with a given action, data and endpoint.
     * @param string $method
     * @param string $endPoint
     * @param array|null $data
     * @return mixed
     */
    public function fetchData(string $method, string $endPoint, array $data = null): mixed
    {
        try {
            $response = $this->client->request($method, $endPoint, ['headers' => ['Authorization' => 'Bearer ',
                'Content-Type' => 'application/json'], 'body' => json_encode($data)]);
//            $this->logger->channel($this->channel)->info("Action: {$endPoint}. Endpoint: {$endPoint}. Result: Success");
        } catch (RequestException $e) {
//            $this->logger->channel($this->channel)->info("Action: {$endPoint}. Endpoint: {$endPoint}. Result: Failure");
            report($e);
//            throw new TmException($e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }
}
