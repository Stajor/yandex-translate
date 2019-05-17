<?php namespace Yandex\Translate\Test;

use PHPUnit\Framework\TestCase;
use Yandex\Translate\TranslateClient;

class TranslateClientGetLangTest extends TestCase {
    public function testResponse() {
        $translateClient = new TranslateClient(getenv('YANDEX_TARNSLATE_TOKEN'));
        $response = $translateClient->getLangs('en');

        $this->assertArrayHasKey('langs', $response);
        $this->assertIsArray($response['langs']);
    }
}
