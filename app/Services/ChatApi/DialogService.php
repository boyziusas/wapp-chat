<?php

namespace App\Services\ChatApi;

/**
 * Class DialogService
 *
 * @package App\Services\ChatApi
 */
class DialogService extends ChatApiService {
    /**
     * Get all dialogues
     *
     * @param  int  $limit  Limit results
     * @param  int  $page   Start from page
     *
     * @return array
     */
    public function all (int $limit = 0, int $page = 0) : array {
        $params = [
            'limit' => $limit,
            'page'  => $page
        ];

        $response = $this->getRequest('dialogs', $params);

        $responseStatusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody()->getContents(), true);

        if ($responseStatusCode == 200) {
            return $responseBody['dialogs'];
        }

        return [];
    }

    public function get (string $dialogId) : array {
        $params = [
            'chatId' => $dialogId
        ];

        $response = $this->getRequest('dialog', $params);

        $responseStatusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody()->getContents(), true);

        if ($responseStatusCode == 200) {
            return $responseBody;
        }

        return [];
    }
}