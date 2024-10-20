<?php

namespace ICanBoogie;

chdir(__DIR__);

require __DIR__ . '/../vendor/autoload.php';

boot();

namespace Test\ICanBoogie\Binding\CLDR;

const CACHE = __DIR__ . '/var/cache/cldr/';
