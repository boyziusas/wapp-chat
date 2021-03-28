<?php

namespace App\Services\ChatApi;

/**
 * Class MessageService
 *
 * @package App\Services\ChatApi
 */
class MessageService extends ChatApiService {
    /**
     * Get dialog all messages
     *
     * @param  string  $dialog  Dialog ID
     *
     * @return array
     */
    public function all (string $dialog) : array {
        $params = [
            'chatId' => $dialog,
        ];

        $response = $this->getRequest('messages', $params);

        $responseStatusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody()->getContents(), true);

        if ($responseStatusCode == 200) {
            return $responseBody['messages'];
        }

        return [];
    }

    /**
     * Send message
     *
     * @param  string  $dialogId  Dialog ID
     * @param  string  $body      Message body
     *
     * @return bool
     */
    public function send (string $dialogId, string $body) : array {
        $requestBody = [
            'chatId' => $dialogId,
            'body'   => $body
        ];

        $response = $this->postRequest('sendMessage', $requestBody);

        $responseStatusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody()->getContents(), true);

        if ($responseStatusCode == 200) {
            return $responseBody;
        }

        return [];
    }
}