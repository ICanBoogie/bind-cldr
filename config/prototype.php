<?php

namespace ICanBoogie\Binding\CLDR;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Application::class . '::lazy_get_cldr_cache' => $hooks . 'get_cldr_cache',
	ICanBoogie\Application::class . '::lazy_get_cldr_provider' => $hooks . 'get_cldr_provider',
	ICanBoogie\Application::class . '::lazy_get_cldr' => $hooks . 'get_cldr',
	ICanBoogie\Application::class . '::get_locale' => $hooks . 'get_locale',
	ICanBoogie\Application::class . '::set_locale' => $hooks . 'set_locale',
	ICanBoogie\Application::class . '::get_language' => $hooks . 'get_language'

];
