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

use ICanBoogie\CLDR\Locale;
use ICanBoogie\CLDR\Provider;
use ICanBoogie\CLDR\Repository;

/**
 * {@link \ICanBoogie\Core} prototype bindings.
 *
 * @property Provider $cldr_provider
 * @property Repository $cldr
 * @property Locale|string $locale
 */
trait CoreBindings
{
	/**
	 * @see Hooks::get_cldr_provider
	 *
	 * @return Provider
	 */
	protected function lazy_get_cldr_provider()
	{
		return parent::lazy_get_cldr_provider();
	}

	/**
	 * @see Hooks::get_cldr
	 *
	 * @return Repository
	 */
	protected function lazy_get_cldr()
	{
		return parent::lazy_get_cldr();
	}

	/**
	 * @see Hooks::get_locale
	 *
	 * @return Locale
	 */
	protected function get_locale()
	{
		return parent::get_locale();
	}

	/**
	 * @see Hooks::set_locale
	 *
	 * @param string $locale Locale identifier.
	 */
	protected function set_locale($locale)
	{
		parent::set_locale($locale);
	}
}
