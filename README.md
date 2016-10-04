# TimeAgoBundle
Provides a simple twig filter for expressing time difference in words for Symfony.

## Install
Composer (<a href="https://packagist.org/packages/eschmar/time-ago-bundle" target="_blank">Packagist</a>):
```sh
composer require eschmar/time-ago-bundle dev-master
```

app/Appkernel.php:
```php
new Eschmar\TimeAgoBundle\EschmarTimeAgoBundle(),
```

## Usage
```
$now = new \DateTime();
$foo = new \DateTime();
$foo = $foo->modify('-3 minutes');
```

```twig
{{ now|ago }}
{# just now #}

{{ foo|ago('r') }}
{# 3 minutes ago #}
```

# License
MIT License