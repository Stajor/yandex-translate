<?php namespace Yandex\Translate\Test;

use PHPUnit\Framework\TestCase;
use Yandex\Translate\TranslateClient;

class TranslateClientTranslateTest extends TestCase {
    public function testResponse() {
        $translateClient = new TranslateClient(getenv('YANDEX_TARNSLATE_TOKEN'));
        $response = $translateClient->translate('Привет Мир!', 'en');

        $this->assertArrayHasKey('lang', $response);
        $this->assertArrayHasKey('text', $response);
        $this->assertEquals('Hello World!', $response['text'][0]);
    }
}
