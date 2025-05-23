<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance modesystem.
if (file_exists($maintenance = __DIR__.'/system/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloadersystem.
require __DIR__.'/system/vendor/autoload.php';

// Bootstrap Laravel and handle the requestsystem.
/** @var Application $app */
$app = require_once __DIR__.'/system/bootstrap/app.php';

$app->handleRequest(Request::capture());
