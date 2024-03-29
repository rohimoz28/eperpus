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
/* $routes->setDefaultController('Home'); */
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
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
$routes->get('/', 'Auth::login');
// Route Member
/* $routes->get('/member', 'Member::index'); */
/* $routes->get('/member', 'Member::index', ['filter' => 'auth']); */
// Route Book
$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('home', 'Home::index', ['as' => 'home']);
  // Member
  $routes->get('member', 'Member::index');
  $routes->get('member/create', 'Member::create');
  $routes->post('member/store', 'Member::store');
  $routes->get('member/edit/(:num)', 'Member::edit/$1');
  $routes->put('member/update/(:num)', 'Member::update/$1');
  $routes->get('member/detail/(:num)', 'Member::detail/$1');
  $routes->get('member/delete/(:num)', 'Member::delete/$1');

  // Book
  $routes->get('book', 'Book::index');
  $routes->get('book/create', 'Book::create');
  $routes->post('book/store', 'Book::store');
  $routes->get('book/edit/(:segment)', 'Book::edit/$1');
  $routes->put('book/update/(:segment)', 'Book::update/$1');
  $routes->get('book/delete/(:num)', 'Book::delete/$1');
  // Borrow
  $routes->get('borrow', 'Borrow::index');
  $routes->post('borrow/store', 'Borrow::store');
  $routes->get('borrow/create', 'Borrow::create');
  $routes->match(['get', 'post'], 'borrow/search-member', 'Borrow::searchMember');
  // Restore
  $routes->get('restore', 'Restore::index');
  $routes->get('restore/generate-pdf', 'Restore::generatePdf');
  // Page
  $routes->get('page', 'Page::index');
});

// Menu Admin
$routes->group('', ['filter' => 'admin'], function ($routes) {
  // Latefine
  $routes->get('latefine', 'Admin\Latefine::index');
  $routes->get('latefine/edit', 'Admin\Latefine::edit');
  $routes->put('latefine/update/(:num)', 'Admin\Latefine::update/$1');
  // Bookfine
  $routes->get('bookfine', 'Admin\Bookfine::index');
  $routes->get('bookfine/create', 'Admin\Bookfine::create');
  $routes->post('bookfine/store', 'Admin\Bookfine::store');
  $routes->get('bookfine/delete/(:num)', 'Admin\Bookfine::delete/$1');
  $routes->get('bookfine/edit/(:num)', 'Admin\Bookfine::edit/$1');
  $routes->put('bookfine/update/(:num)', 'Admin\Bookfine::update/$1');
  // Category
  $routes->get('category', 'Admin\Category::index');
  $routes->get('category/create', 'Admin\Category::create');
  $routes->post('category/create', 'Admin\Category::store');
  $routes->get('category/edit/(:num)', 'Admin\Category::edit/$1');
  $routes->put('category/(:num)', 'Admin\Category::update/$1');
  $routes->get('category/delete/(:num)', 'Admin\Category::delete/$1');
});



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
