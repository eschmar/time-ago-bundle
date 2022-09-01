# TimeAgoBundle
Provides a simple twig filter for expressing time difference in words for Symfony. 
Uses a range of +-7 days, after that, the actual date is returned.

This version covers symfony 4+, if you use an older symfony version, please have a look at older version of this bundle.

| Bundle-Version | Symfony       |
|----------------|---------------|
| ^v2.0.0        | ^5.0 and ^6.0 |
| ^v1.1.0        | ^4.x          |
| ~v0.5.0        | ^3.4          |
| ~v0.4.0        | ^2.8          |


## Install
Composer (<a href="https://packagist.org/packages/eschmar/time-ago-bundle" target="_blank">Packagist</a>):
```sh
composer require eschmar/time-ago-bundle
```

If you do not use [Symfony Flex](https://symfony.com/doc/current/setup/flex.html), add this bundle to config/bundles.php (Symfony > 4):
```php
return [
...
new Eschmar\TimeAgoBundle\EschmarTimeAgoBundle::class => ['all' => true],
];
```

## Usage
```twig
{{ date('now')|ago }}
{# just now #}

{{ date('now').modify('-3 minutes')|ago }}
{# 3 minutes ago #}

{{ date('now').modify('-3 months')|ago('r') }}
{# actual date in 'r' format #}

{{ date('now').modify('+4 hours')|ago('r') }}
{# in 4 hours #}
```

Change [default format](http://php.net/manual/en/function.date.php) in `config.yml`:

```yml
eschmar_time_ago:
    format: 'Y-m-d H:i:s'
```

# Translations available

* Belarusian
* Croatian
* Czech
* Danish
* Dutch
* English
* French
* Finnish
* German
* Hindi
* Hungarian
* Indonesian
* Italian
* Malay
* Norwegian
* Polish
* Portuguese (Brazil)
* Romanian
* Russian
* Slovenian
* Spanish
* Swedish
* Tagalog
* Turkish
* Ukrainian
* Vietnamese

# License
MIT License
