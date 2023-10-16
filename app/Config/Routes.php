<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rotas users
$routes->get('/user', 'User::index');
$routes->post('/user', 'User::create');
$routes->put('/user/(:segment)', 'User::update/$1');
$routes->delete('/user/(:segment)', 'User::delete/$1');

// Rotas products
$routes->get('/product', 'Product::index');
$routes->post('/product', 'Product::create');
$routes->put('/product/(:segment)', 'Product::update/$1');
$routes->delete('/product/(:segment)', 'Product::delete/$1');

// Rotas sales
$routes->get('/sale', 'Sale::index');
$routes->post('/sale', 'Sale::create');
$routes->put('/sale/(:segment)', 'Sale::update/$1');
$routes->delete('/sale/(:segment)', 'Sale::delete/$1');