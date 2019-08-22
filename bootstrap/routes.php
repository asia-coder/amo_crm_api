<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider as Service;

$route = new Klein\Klein();

$route->respond('GET', '/', function(Request $request, Response $response, Service $service) {
    return (new HomeController)->index($request, $response, $service);
});

$route->respond('POST', '/add', function(Request $request, Response $response, Service $service) {
    return '';
});

$route->respond('POST', '/auth', function(Request $request, Response $response, Service $service) {
    return (new AuthController)->login($request, $response, $service);
});

$route->dispatch();
