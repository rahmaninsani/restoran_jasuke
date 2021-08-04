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
$routes->setDefaultController('Login');
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
$routes->get('/', 'Login::index');

$routes->get('/login', 'Login::index');

$routes->get('/beranda', 'Beranda::index', ['filter' => 'auth']);

$routes->get('/menu', 'Menu::index', ['filter' => 'auth']);
$routes->get('/menu/create', 'Menu::create', ['filter' => 'auth']);
$routes->get('/menu/edit/(:segment)', 'Menu::edit/$1', ['filter' => 'auth']);
$routes->delete('/menu/(:any)', 'Menu::delete/$1', ['filter' => 'auth']);
$routes->get('/menu/(:any)','Menu::detail/$1', ['filter' => 'auth']);

$routes->get('/pemesanan', 'Pemesanan::index', ['filter' => 'auth']);
$routes->get('/pemesanan/tambah_pemesanan', 'Pemesanan::tambah_pemesanan', ['filter' => 'auth']);

// $routes->get('/penjualan/detail_penjualan/(:num)', 'Penjualan::detail_penjualan/$1', ['filter' => 'auth']);
// $routes->delete('/penjualan/(:num)', 'Penjualan::delete_penjualan/$1', ['filter' => 'auth']);
// $routes->delete('/penjualan/(:num)/(:num)', 'Penjualan::delete_detail_penjualan/$1/$2', ['filter' => 'auth']);

$routes->get('/laporan', 'Laporan::index', ['filter' => 'auth']);
$routes->get('/pembayaran', 'Pembayaran::index', ['filter' => 'auth']);
$routes->get('/hitung_bayar', 'Hitung_bayar::index', ['filter' => 'auth']);
$routes->get('/pencarian_meja', 'Pemesanan::pencarian_meja', ['filter' => 'auth']);
$routes->get('/tambah_pesanan', 'Pemesanan::tambah_pesanan', ['filter' => 'auth']);
$routes->get('/ubah_pesanan', 'Pemesanan::ubah_pesanan', ['filter' => 'auth']);

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
