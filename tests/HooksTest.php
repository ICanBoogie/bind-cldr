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
use ICanBoogie\Core;
use function ICanBoogie\app;

class TestHooks extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Core|CoreBindings
	 */
	static private $app;

	static public function setupBeforeClass()
	{
		self::$app = app();
	}

	public function test_get_cldr_cache()
	{
		$instance = Hooks::get_cldr_cache();
		$this->assertInstanceOf(Cache::class, $instance);
		$this->assertSame($instance, self::$app->cldr_cache);
	}

	public function test_get_cldr_provider()
	{
		$instance = Hooks::get_cldr_provider(self::$app);
		$this->assertInstanceOf(Provider::class, $instance);
		$this->assertSame($instance, self::$app->cldr_provider);
	}

	public function test_get_cldr()
	{
		$instance = Hooks::get_cldr(self::$app);
		$this->assertInstanceOf(Repository::class, $instance);
		$this->assertSame($instance, self::$app->cldr);
	}

	public function test_get_something()
	{
		$cldr = Hooks::get_cldr(self::$app);
		$this->assertNotEmpty($cldr->locales['fr']->calendar->abbreviated_quarters);
	}

	public function test_get_locale()
	{
		$instance = Hooks::get_locale(self::$app);
		$this->assertInstanceOf(Locale::class, $instance);
		$this->assertSame($instance, self::$app->locale);
		$this->assertEquals('en', $instance->code);
	}

	public function test_set_locale()
	{
		$app = self::$app;
		Hooks::set_locale($app, 'fr');
		$this->assertEquals('fr', Hooks::get_locale($app)->code);
		$this->assertEquals('fr', $app->locale->code);

		/* @var $locale Locale */
		$app->locale = 'en';
		$locale = $app->locale;
		$this->assertInstanceOf(Locale::class, $locale);;
		$this->assertEquals('en', $locale->code);
	}

	public function test_get_language()
	{
		$app = self::$app;

		Hooks::set_locale($app, 'fr');
		$this->assertEquals('fr', Hooks::get_language($app));
		$this->assertEquals('fr', $app->language);

		Hooks::set_locale($app, 'en-GB');
		$this->assertEquals('en', Hooks::get_language($app));
		$this->assertEquals('en', $app->language);
	}
}
