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

class TestHooks extends \PHPUnit_Framework_TestCase
{
	static private $app;

	static public function setupBeforeClass()
	{
		self::$app = \ICanBoogie\app();
	}

	public function test_get_cldr_provider()
	{
		$instance = Hooks::get_cldr_provider();
		$this->assertInstanceOf('ICanBoogie\CLDR\ProviderInterface', $instance);
		$this->assertSame($instance, self::$app->cldr_provider);
	}

	public function test_get_cldr()
	{
		$instance = Hooks::get_cldr(self::$app);
		$this->assertInstanceOf('ICanBoogie\CLDR\Repository', $instance);
		$this->assertSame($instance, self::$app->cldr);
	}

	public function test_get_locale()
	{
		$instance = Hooks::get_locale(self::$app);
		$this->assertInstanceOf('ICanBoogie\CLDR\Locale', $instance);
		$this->assertSame($instance, self::$app->locale);
		$this->assertEquals('en', $instance->code);
	}

	public function test_set_locale()
	{
		$app = self::$app;
		Hooks::set_locale($app, 'fr');
		$this->assertEquals('fr', Hooks::get_locale($app)->code);
		$this->assertEquals('fr', $app->locale->code);

		$app->locale = 'en';
		$this->assertInstanceOf('ICanBoogie\CLDR\Locale', $app->locale);;
		$this->assertEquals('en', $app->locale->code);
	}
}
