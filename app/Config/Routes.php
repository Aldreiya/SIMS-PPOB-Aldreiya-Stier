<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/login', 'Auth::login');
    $routes->post('/valid_login', 'Auth::valid_login');
    $routes->get('/register', 'Auth::register');
});
$routes->get('/logout', 'Auth::logout');
$routes->group('', ['filter' => 'home'], static function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/topup', 'Home::topup');
    $routes->get('/transaction', 'Home::transaction');
    $routes->get('/akun', 'Home::akun');
    $routes->post('/service/(:segment)', 'Home::services/$1');
    $routes->get('/services', 'Home::service');
});
