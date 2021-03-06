<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie;

use ICanBoogie\Binding\CLDR\ApplicationBindings;

chdir(__DIR__);

require __DIR__ . '/../vendor/autoload.php';

class Application extends ApplicationAbstract
{
	use ApplicationBindings;
}

$app = new Application(get_autoconfig());
$app->boot();
