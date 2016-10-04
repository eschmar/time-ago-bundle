# TimeAgoBundle
Provides a simple twig filter for expressing time difference in words for Symfony. 
Uses a range of +-7 days, after that, the actual date is returned.

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
$foo->modify('-3 minutes');

$bar = new \DateTime();
$bar->modify('-3 months');
```

```twig
{{ now|ago }}
{# just now #}

{{ foo|ago('r') }}
{# 3 minutes ago #}

{{ bar|ago('r') }}
{# actual date in 'r' format #}
```

Change default format in `config.yml`:

```yml
eschmar_time_ago:
    format: 'Y-m-d H:i:s'
```

# License
MIT License