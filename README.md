# PHP Yandex Translate Api

![Minimal PHP version](https://img.shields.io/packagist/php-v/stajor/perspectiveapi.svg)

PHP library for Yandex Translate API.

## Installation

Via Composer:

```bash
composer require stajor/yandex-translate
```
    
## Usage

#### Getting a list of supported languages

```php
<?php

$translateClient = new Yandex\Translate\TranslateClient('YANDEX-TARNSLATE-TOKEN');
$response = $translateClient->getLangs('en');
```

#### Language detection
```php
<?php

$translateClient = new Yandex\Translate\TranslateClient('YANDEX-TARNSLATE-TOKEN');
$response = $translateClient->detect('Hello world!');
```

#### Text translation
```php
<?php

$translateClient = new Yandex\Translate\TranslateClient('YANDEX-TARNSLATE-TOKEN');
$response = $translateClient->translate('Hello world!', 'ru');
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/Stajor/yandex-translate. 
This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.

## License

The gem is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).
