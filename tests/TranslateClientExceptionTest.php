<?php namespace Yandex\Translate\Test;

use PHPUnit\Framework\TestCase;
use Yandex\Translate\TranslateClient;
use Yandex\Translate\TranslateException;

class TranslateClientExceptionTest extends TestCase {
    public function testException() {
        $this->expectException(TranslateException::class);
        $this->expectExceptionMessage('API key is invalid');

        $translateClient = new TranslateClient('');
        $translateClient->getLangs('en');
    }
}
