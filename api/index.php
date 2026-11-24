<?php

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    $app->make('db')->connection()->statement('SELECT vuelto FROM pedidos LIMIT 1');
} catch (\Exception $e) {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
}

require __DIR__.'/../public/index.php';
