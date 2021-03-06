<?php

/**
 * Test: Nette\Caching\Storages\DevNullStorage test.
 */

declare(strict_types=1);

use Nette\Caching\Cache;
use Nette\Caching\Storages\DevNullStorage;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


// key and data with special chars
$key = 'nette';
$value = '"Hello World"';

$cache = new Cache(new DevNullStorage, 'myspace');


Assert::null($cache->load($key));


// Writing cache...
$cache->save($key, $value);

Assert::null($cache->load($key));


// Removing from cache using remove()...
$cache->remove($key);

Assert::null($cache->load($key));


// Removing from cache using set null...
$cache->save($key, $value);
$cache->save($key, null);

Assert::null($cache->load($key));
