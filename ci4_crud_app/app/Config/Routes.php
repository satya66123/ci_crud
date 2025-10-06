<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // enable auto-routing for simplicity

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// 👇 Default homepage route
$routes->get('/', 'Home::index');

// 👇 Users CRUD routes
$routes->get('users', 'Users::index');              // List all users
$routes->get('users/create', 'Users::create');      // Show add form
$routes->post('users/create', 'Users::create');     // Handle add form submission
$routes->get('users/edit/(:num)', 'Users::edit/$1'); // Show edit form
$routes->post('users/edit/(:num)', 'Users::edit/$1'); // Handle update submission
$routes->get('users/delete/(:num)', 'Users::delete/$1'); // Delete user

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * This file will load routes from `app/Config/{ENVIRONMENT}/Routes.php`
 * if it exists. This allows environment-based route customization.
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
