# Bind CLDR to ICanBoogie

[![Packagist](https://img.shields.io/packagist/v/icanboogie/bind-cldr.svg)](https://packagist.org/packages/icanboogie/bind-cldr)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-cldr.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-cldr)
[![Coverage Status](https://coveralls.io/repos/github/ICanBoogie/bind-cldr/badge.svg?branch=6.0)](https://coveralls.io/github/ICanBoogie/bind-cldr?branch=6.0)
[![Downloads](https://img.shields.io/packagist/dt/icanboogie/bind-cldr.svg)](https://packagist.org/packages/icanboogie/bind-cldr)

Binds [icanboogie/cldr][] to [ICanBoogie][], using its [Autoconfig][] feature.

```php
<?php

/** @var ICanBoogie\Application $app */

use ICanBoogie\CLDR\Repository;
use ICanBoogie\Binding\CLDR\CurrentLocale;

# Getting the CLDR
$cldr = $app->service_for_class(Repository::class);
echo $cldr->locale_for('fr')->format_number("1234567.89"); // 1 234 567,89

# Getting the current locale, defaulting to 'en' locale
$current_locale = $app->service_for_class(CurrentLocale::class);
echo $current_locale->get()->id->value             // en

# Change the current locale to 'fr'
$current_locale->set('fr')
echo $current_locale->get()->id->value             // fr
```


#### Installation

```bash
composer require icanboogie/bind-cldr
```



----------



## Continuous Integration

The project is continuously tested by [GitHub actions](https://github.com/ICanBoogie/bind-cldr/actions).

[![Tests](https://github.com/ICanBoogie/bind-cldr/actions/workflows/test.yml/badge.svg?branch=6.0)](https://github.com/ICanBoogie/bind-cldr/actions?query=workflow%3Atest)
[![Static Analysis](https://github.com/ICanBoogie/bind-cldr/actions/workflows/static-analysis.yml/badge.svg?branch=6.0)](https://github.com/ICanBoogie/bind-cldr/actions?query=workflow%3Astatic-analysis)
[![Code Style](https://github.com/ICanBoogie/bind-cldr/actions/workflows/code-style.yml/badge.svg?branch=6.0)](https://github.com/ICanBoogie/bind-cldr/actions?query=workflow%3Acode-style)



## Code of Conduct

This project adheres to a [Contributor Code of Conduct](CODE_OF_CONDUCT.md). By participating in
this project and its community, you are expected to uphold this code.



## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.



## License

**icanboogie/bind-cldr** is released under the [BSD-3-Clause](LICENSE).




[ICanBoogie]:         https://icanboogie.org

[icanboogie/cldr]:    https://github.com/ICanBoogie/CLDR
[Autoconfig]:         https://icanboogie.org/docs/4.0/autoconfig
