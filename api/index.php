<?php

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
$app = require_once __DIR__.'/../laravel-backend/bootstrap/app.php';


$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
