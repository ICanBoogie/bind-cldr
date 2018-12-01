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

use ICanBoogie\Application;
use ICanBoogie\CLDR\Locale;
use ICanBoogie\CLDR\Provider;
use ICanBoogie\CLDR\Repository;
use function ICanBoogie\app;

class CoreBindingsTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Application
	 */
	static private $app;

	static public function setupBeforeClass()
	{
		self::$app = app();
	}

	/**
	 * @dataProvider provide_test_get
	 *
	 * @param $property
	 * @param $class
	 */
	public function test_get($property, $class)
	{
		$this->assertInstanceOf($class, self::$app->$property);
	}

	public function provide_test_get()
	{
		return [

			[ 'cldr_provider', Provider::class ],
			[ 'cldr',          Repository::class ],
			[ 'locale',        Locale::class ]

		];
	}

	public function test_locale()
	{
		$app = self::$app;

		/* @var $locale Locale */

		$app->locale = 'fr';
		$locale = $app->locale;
		$this->assertInstanceOf(Locale::class, $locale);
		$this->assertEquals('fr', $locale->code);

		$app->locale = 'en';
		$locale = $app->locale;
		$this->assertInstanceOf(Locale::class, $locale);
		$this->assertEquals('en', $locale->code);
	}
}
