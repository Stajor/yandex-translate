<?php namespace Yandex\Translate\Test;

use PHPUnit\Framework\TestCase;
use Yandex\Translate\TranslateClient;

class TranslateClientDetectTest extends TestCase {
    public function testResponse() {
        $translateClient = new TranslateClient(getenv('YANDEX_TARNSLATE_TOKEN'));
        $response = $translateClient->detect('Hello world!');

        $this->assertArrayHasKey('lang', $response);
        $this->assertEquals('en', $response['lang']);
    }
}
