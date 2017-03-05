# Bind CLDR to ICanBoogie

[![Release](https://img.shields.io/packagist/v/ICanBoogie/bind-cldr.svg)](https://packagist.org/packages/icanboogie/bind-cldr)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-cldr/master.svg)](http://travis-ci.org/ICanBoogie/bind-cldr)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-cldr/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-cldr)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-cldr/master.svg)](https://coveralls.io/r/ICanBoogie/bind-cldr)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-cldr.svg)](https://packagist.org/packages/icanboogie/bind-cldr)

Binds [icanboogie/cldr][] to [ICanBoogie][], using its [Autoconfig][] feature.

```php
<?php

$app = ICanBoogie\boot();

# Getting the CLDR
echo get_class($app->cldr);                        // ICanBoogie\CLDR\Repository
echo $app->cldr->locales['fr']['languages']['fr']; // français

# Getting the current locale, defaulting to 'en' locale
echo get_class($app->locale);                      // ICanBoogie\CLDR\Locale
echo $app->locale;                                 // en

# Setting the current locale to French
$app->locale = 'fr-FR';
echo get_class($app->locale);                      // ICanBoogie\CLDR\Locale
echo $app->locale;                                 // fr-FR
echo $app->language;                               // fr
```





## Prototype methods

The following prototype methods are provided:

- `ICanBoogie\Application::lazy_get_cldr_provider`: A lazy getter that returns a [ProviderCollection][]
instance. A [FileProvider][] instance is used in the collection and is configured to use
`<ICanBoogie\REPOSITORY>cache/cldr` as cache directory. A [APCStorage][] instance is also
part of the collection if APC is available.

- `ICanBoogie\Application::lazy_get_cldr`: A lazy getter that returns a [Repository][] instance created
with the CLDR provider.

- `ICanBoogie\Application::set_locale`: Sets the locale used by the application.

- `ICanBoogie\Application::get_locale`: Returns the locale used by the application.





----------





## Requirements

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-cldr
```





### Cloning the repository

The package is [available on GitHub](https://github.com/ICanBoogie/bind-cldr), its repository can be
cloned with the following command line:

	$ git clone https://github.com/ICanBoogie/bind-cldr.git





## Documentation

The package is documented as part of the [ICanBoogie](https://icanboogie.org/) framework
[documentation](https://icanboogie.org/docs/). You can generate the documentation for the package
and its dependencies with the `make doc` command. The documentation is generated in the `docs`
directory. [ApiGen](http://apigen.org/) is required. You can later clean the directory with
the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [Composer](http://getcomposer.org/) is
automatically installed as well as all dependencies required to run the suite. You can later
clean the directory with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-cldr/master.svg)](https://travis-ci.org/ICanBoogie/bind-cldr)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-cldr/master.svg)](https://coveralls.io/r/ICanBoogie/bind-cldr)





## License

**icanboogie/bind-cldr** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[FileProvider]:       https://icanboogie.org/api/cldr/2.0/class-ICanBoogie.CLDR.FileProvider.html
[Repository]:         https://icanboogie.org/api/cldr/2.0/class-ICanBoogie.CLDR.Repository.html
[ProviderCollection]: https://icanboogie.org/api/cldr/2.0/class-ICanBoogie.CLDR.ProviderCollection.html
[APCStorage]:         https://icanboogie.org/api/storage/2.0/class-ICanBoogie.Storage.APCStorage.html

[icanboogie/cldr]:    https://github.com/ICanBoogie/CLDR
[ICanBoogie]:         https://icanboogie.org
[Autoconfig]:         https://icanboogie.org/docs/4.0/autoconfig
