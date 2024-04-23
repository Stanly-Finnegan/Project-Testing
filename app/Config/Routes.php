<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/loginUser','UserController::loginUser');
$routes->post('/registerUser','UserController::registerUser');
