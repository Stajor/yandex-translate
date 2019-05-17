<?php namespace Yandex\Translate;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PerspectiveApi\CommentsException;

class TranslateClient {
    const API_URL = 'https://translate.yandex.net/api/v1.5/tr.json/';

    protected $token;
    protected $client;

    public function __construct(string $token) {
        $this->token    = $token;
        $this->client   = new Client([
            'base_uri' => self::API_URL,
            'defaults' => [
                'headers'  => ['content-type' => 'application/x-www-form-urlencoded']
        ]]);
    }

    public function getLangs(string $langCode) {
        return $this->request('getLangs', ['ui' => $langCode]);
    }

    public function detect(string $text, string $hint = '') {
        return $this->request('detect', ['text' => $text, 'hint' => $hint]);
    }

    public function translate(string $text, string $lang, string $format = 'plain', $options = []) {
        return $this->request('translate', [
            'text'      => $text,
            'lang'      => $lang,
            'format'    => $format,
            'options'   => $options
        ]);
    }

    protected function request(string $method, array $data) {
        $data['key'] = $this->token;

        try {
            $response = $this->client->post($method, ['form_params' => $data]);
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody(), true);

            if (isset($error['code']) && isset($error['message'])) {
                throw new TranslateException($error['message'], $error['code']);
            } else {
                throw $e;
            }
        }

        return json_decode($response->getBody(), true);
    }
}
