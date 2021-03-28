<?php

namespace App\Services\ChatApi;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class ChatApiService
 *
 * @package App\Services
 */
class ChatApiService {
    /**
     * ChatAPI api url
     *
     * @var string $apiUrl
     */
    private $apiUrl;

    /**
     * ChatAPI instance id
     *
     * @var string $instance
     */
    private $instance;

    /**
     * ChatAPI token
     *
     * @var string $token
     */
    private $token;

    /**
     * ChatAPI instance
     *
     * @var GuzzleClient $http
     */
    private $http;

    /**
     * ChatApiService constructor.
     */
    public function __construct () {
        $this->apiUrl = config('services.chat-api.api_url');
        $this->instance = config('services.chat-api.instance');
        $this->token = config('services.chat-api.token');

        $uri = sprintf('%s/instance%s/', $this->apiUrl, $this->instance);

        $this->http = new GuzzleClient([
            'base_uri' => $uri,

            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * Execute GET request
     *
     * @param  string  $endpoint
     * @param  array   $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function getRequest (string $endpoint, array $params = []) {
        $params['token'] = $this->token;

        return $this->http->get($endpoint, ['query' => $params]);
    }

    /**
     * Execute POST request
     *
     * @param  string  $endpoint
     * @param  array   $body
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function postRequest (string $endpoint, array $body = []) {
        $params['token'] = $this->token;

        return $this->http->post($endpoint, ['query' => $params, 'json' => $body]);
    }
}