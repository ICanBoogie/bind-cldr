<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\CLDR\Cache;

use ICanBoogie\CLDR\Cache;

class APCCache implements Cache
{
	const DEFAULT_PREFIX = 'icanboogie:cldr:';
	const DEFAULT_TTL = 3600;

	/**
	 * Whether the APC feature is available.
	 *
	 * @return bool
	 *
	 * @codeCoverageIgnore
	 */
	static public function is_available()
	{
		return (extension_loaded('apc') || extension_loaded('apcu')) && ini_get('apc.enabled');
	}

	/**
	 * @var string
	 */
	private $prefix;

	/**
	 * @var int
	 */
	private $ttl;

	/**
	 * @param string|null $prefix
	 * @param int $ttl
	 */
	public function __construct($prefix = self::DEFAULT_PREFIX, $ttl = self::DEFAULT_TTL)
	{
		$this->prefix = $prefix;
		$this->ttl = $ttl;
	}

	/**
	 * @inheritdoc
	 */
	public function get($path)
	{
		$rc = apcu_fetch($this->prefix . $path, $success);

		return $success ? $rc : null;
	}

	/**
	 * @inheritdoc
	 */
	public function set($path, array $data)
	{
		apcu_store($this->prefix . $path, $data, $this->ttl);
	}
}
