<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Shop Route

// Products
$routes->get('/', 'Products::index');
$routes->get('/product/(:segment)', 'Products::detail/$1');

// Pages
$routes->get('/about', 'Pages::about');
$routes->get('/faq', 'Pages::faq');
$routes->get('/coming-soon', 'Pages::comingSoon');

// Auth
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::createAccount');
$routes->get('/forgot-password', 'Auth::forgotPassword');

// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/update/(:segment)', 'Admin::update/$1');
$routes->get('/admin/orders', 'Admin::orders');
$routes->get('/admin/product', 'Admin::product');
$routes->get('/admin/promotion', 'Admin::promotion');
$routes->get('/admin/wallet', 'Admin::wallet');
$routes->post('/admin/save', 'Admin::save');
$routes->delete('/admin/(:num)', 'Admin::delete/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
