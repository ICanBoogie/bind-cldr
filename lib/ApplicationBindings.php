<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\CLDR;

use ICanBoogie\CLDR\Cache;
use ICanBoogie\CLDR\Locale;
use ICanBoogie\CLDR\Provider;
use ICanBoogie\CLDR\Repository;

/**
 * {@link \ICanBoogie\Application} prototype bindings.
 *
 * @property Cache $cldr_cache
 * @property Provider $cldr_provider
 * @property Repository $cldr
 * @property Locale $locale
 * @property-read string $language
 *
 * @see \ICanBoogie\Binding\CLDR\Hooks::get_cldr_cache
 * @see \ICanBoogie\Binding\CLDR\Hooks::get_cldr_provider
 * @see \ICanBoogie\Binding\CLDR\Hooks::get_cldr
 * @see \ICanBoogie\Binding\CLDR\Hooks::get_locale
 * @see \ICanBoogie\Binding\CLDR\Hooks::set_locale
 * @see \ICanBoogie\Binding\CLDR\Hooks::get_language
 */
trait ApplicationBindings
{

}
