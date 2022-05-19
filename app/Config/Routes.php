<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.





/**
 * slug placeholder:
 *
 *  [a-z0-9]+     # One or more repetition of given characters
 *  (?:           # A non-capture group.
 *    -           # A hyphen
 *    [a-z0-9]+   # One or more repetition of given characters
 *  )*            # Zero or more repetition of previous group
 *
 *  This will match:
 *  - A sequence of alphanumeric characters at the beginning.
 *  - Then it will match a hyphen, then a sequence of alphanumeric characters, 0 or more times.
 *
 * Examples :
 *   item12345
 *   some-blog-article
 *
 */
$routes->addPlaceholder('slug', '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*');

$routes->get('/', 'Home::index');
$routes->get('/recipes', 'RecipesController::index');

$routes->get('recipe/(:num)', 'RecipesController::recipeById/$1');
$routes->get('recipe/(:slug)', 'RecipesController::recipeBySlug/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
