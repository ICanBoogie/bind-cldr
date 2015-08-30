<?php

namespace ICanBoogie\Binding\CLDR;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Core::class . '::lazy_get_cldr_provider' => $hooks . 'get_cldr_provider',
	ICanBoogie\Core::class . '::lazy_get_cldr' => $hooks . 'get_cldr',
	ICanBoogie\Core::class . '::get_locale' => $hooks . 'get_locale',
	ICanBoogie\Core::class . '::set_locale' => $hooks . 'set_locale',
	ICanBoogie\Core::class . '::get_language' => $hooks . 'get_language'

];
