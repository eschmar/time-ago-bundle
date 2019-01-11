# TimeAgoBundle
Provides a simple twig filter for expressing time difference in words for
Symfony applications.

## Install
Composer (<a href="https://packagist.org/packages/eschmar/time-ago-bundle" target="_blank">Packagist</a>):
```sh
composer require eschmar/time-ago-bundle ~v0.3
```

app/Appkernel.php:
```php
new Eschmar\TimeAgoBundle\EschmarTimeAgoBundle(),
```

## Usage

### Examples
```twig
{{ date('3 years ago')|ago }}
{# -> 3 years ago #}

{{ date('3 months ago')|ago }}
{# -> 3 months ago #}

{{ date('3 weeks ago')|ago }}
{# -> 3 weeks ago #}

{{ date('3 days ago')|ago }}
{# -> 3 days ago #}

{{ date('3 weeks ago')|ago }}
{# -> 3 weeks ago #}

{{ date('3 hours ago')|ago }}
{# -> 3 hours ago #}

{{ date('3 minutes ago')|ago }}
{# -> 3 minutes ago #}

{{ date('now')|ago }}
{# -> just now #}

{{ date('+4 hours')|ago }}
{# -> in 4 hours #}

{# and so on the future (days, weeks, months, year #}
```

### Pass the format and the threshold
```twig
{{ date('3 years ago')|ago('r', constant('Eschmar\\TimeAgoBundle\\Twig\\TimeAgoExtension::WEEK')) }}
{# actual date in 'r' format because 3 years ago is more than the defined WEEK threshold #}
```

## Configuration

### [default format](http://php.net/manual/en/function.date.php) in `config.yml`:

```yml
eschmar_time_ago:
    format: 'Y-m-d H:i:s'
```

### default threshold before using default format:

```yml
eschmar_time_ago:
    #use constant class or a number of seconds
    threshold: !php/const:Eschmar\TimeAgoBundle\TimeAgoExtension::WEEK
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
* Ukranian
* Vietnamese

# License
MIT License
