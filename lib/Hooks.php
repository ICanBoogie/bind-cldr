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

use ICanBoogie\CLDR\FileProvider;
use ICanBoogie\CLDR\Locale;
use ICanBoogie\CLDR\Provider;
use ICanBoogie\CLDR\ProviderCollection;
use ICanBoogie\CLDR\Repository;
use ICanBoogie\CLDR\RunTimeProvider;
use ICanBoogie\CLDR\WebProvider;
use ICanBoogie\Core;

class Hooks
{
	/*
	 * Prototypes
	 */

	/**
	 * Returns a provider collection with the following providers: {@link WebProvider},
	 * {@link FileProvider}, and {@link RunTimeProvider}. The {@link FileProvider} is created with
	 * `REPOSITORY/cache/cldr` as cache directory.
	 *
	 * @return Provider
	 */
	static public function get_cldr_provider()
	{
		static $provider;

		if (!$provider)
		{
			$provider = new ProviderCollection([

				new RunTimeProvider,
				new FileProvider(\ICanBoogie\REPOSITORY . 'cache' . DIRECTORY_SEPARATOR . 'cldr'),
				new WebProvider

			]);
		}

		return $provider;
	}

	/**
	 * Returns a {@link Repository} instance created with `$app->cldr_provider`.
	 *
	 * @param Core|CoreBindings $app
	 *
	 * @return Repository
	 */
	static public function get_cldr(Core $app)
	{
		static $cldr;

		if (!$cldr)
		{
			$cldr = new Repository($app->cldr_provider);
		}

		return $cldr;
	}

	static private $locale;

	/**
	 * Returns the locale used by the application.
	 *
	 * @param Core|CoreBindings $app
	 *
	 * @return Locale
	 */
	static public function get_locale(Core $app)
	{
		$locale = self::$locale;

		if (!($locale instanceof Locale))
		{
			$locale = self::$locale = $app->cldr->locales[$locale ?: 'en'];
		}

		return $locale;
	}

	/**
	 * Sets the locale used by the application.
	 *
	 * @param Core|CoreBindings $app
	 * @param Locale|string $locale
	 */
	static public function set_locale(Core $app, $locale)
	{
		self::$locale = $locale;
	}

	/**
	 * Returns the language of the application.
	 *
	 * @param Core|CoreBindings $app
	 *
	 * @return string
	 */
	static public function get_language(Core $app)
	{
		return $app->locale->language;
	}
}
