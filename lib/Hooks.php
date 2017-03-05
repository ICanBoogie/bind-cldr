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

use ICanBoogie\AppConfig;
use ICanBoogie\Application;
use ICanBoogie\Binding\CLDR\Cache\APCCache;
use ICanBoogie\CLDR\Cache;
use ICanBoogie\CLDR\Cache\CacheCollection;
use ICanBoogie\CLDR\Cache\FileCache;
use ICanBoogie\CLDR\Cache\RuntimeCache;
use ICanBoogie\CLDR\Locale;
use ICanBoogie\CLDR\Provider;
use ICanBoogie\CLDR\Repository;
use function is_dir;
use function mkdir;

final class Hooks
{
	/*
	 * Prototypes
	 */

	/**
	 * Returns a cache for CLDR data.
	 *
	 * @param Application $app
	 *
	 * @return Cache
	 */
	static public function get_cldr_cache(Application $app)
	{
		static $cache;

		if (!$cache)
		{
			$cache_dir = $directory = $app->config[AppConfig::REPOSITORY_CACHE] . '/cldr';

			if (!is_dir($cache_dir))
			{
				mkdir($cache_dir, 0755, true);
			}

			$cache = new CacheCollection(array_filter([
				new RuntimeCache,
				APCCache::is_available() ? new APCCache : null,
				new FileCache($cache_dir)
			]));
		}

		return $cache;
	}

	/**
	 * Returns a CLDR provider.
	 *
	 * @param Application $app
	 *
	 * @return Provider
	 */
	static public function get_cldr_provider(Application $app)
	{
		static $provider;

		if (!$provider)
		{
			$provider = new Provider\CachedProvider(
				new Provider\WebProvider,
				$app->cldr_cache
			);
		}

		return $provider;
	}

	/**
	 * Returns a {@link Repository} instance created with `$app->cldr_provider`.
	 *
	 * @param Application $app
	 *
	 * @return Repository
	 */
	static public function get_cldr(Application $app)
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
	 * @param Application $app
	 *
	 * @return Locale
	 */
	static public function get_locale(Application $app)
	{
		$locale = self::$locale;

		if (!$locale instanceof Locale)
		{
			$locale = self::$locale = $app->cldr->locales[$locale ?: 'en'];
		}

		return $locale;
	}

	/**
	 * Sets the locale used by the application.
	 *
	 * @param Application $app
	 * @param Locale|string $locale
	 */
	static public function set_locale(Application $app, $locale)
	{
		self::$locale = $locale;
	}

	/**
	 * Returns the language of the application.
	 *
	 * @param Application $app
	 *
	 * @return string
	 */
	static public function get_language(Application $app)
	{
		return $app->locale->language;
	}
}
