<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Beranda::index');
$routes->get('/login', 'Login::index');
<<<<<<< HEAD
//menu
$routes->get('/menu', 'Menu::index');
$routes->get('/menu/create', 'Menu::create');
$routes->get('/menu/edit/(:segment)', 'Menu::edit/$1');
$routes->delete('/menu/(:any)', 'Menu::delete/$1');
$routes->get('/menu/(:any)','Menu::detail/$1');

=======
$routes->get('/menu', 'Menu::index');
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
$routes->get('/pemesanan', 'Pemesanan::index');
$routes->get('/laporan', 'Laporan::index');
$routes->get('/pembayaran', 'Pembayaran::index');
$routes->get('/hitung_bayar', 'Hitung_bayar::index');
$routes->get('/pencarian_meja', 'Pemesanan::pencarian_meja');
$routes->get('/tambah_pesanan', 'Pemesanan::tambah_pesanan');
$routes->get('/ubah_pesanan', 'Pemesanan::ubah_pesanan');


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
