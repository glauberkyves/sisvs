<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

// legacy application configures session
session_start();

// Get Symfony to interface with this existing session
$session = new Session(new PhpBridgeSessionStorage());

// symfony will now interface with the existing PHP session
$session->start();

// Use APC for autoloading to improve performance.
// Change 'sf2' to a unique prefix in order to prevent cache key conflicts
// with other applications also using APC.

$loader = new ApcClassLoader('sf2', $loader);
$loader->register(true);


require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
