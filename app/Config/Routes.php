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
$routes->get('/', 'Auth::index');
$routes->get('/kelola_siswa', 'Home::kelola_siswa');
$routes->get('tambah_siswa', 'Home::create');
$routes->post('/tambah_siswa', 'Home::store');
$routes->get('edit_siswa/(:any)', 'Home::edit/$1');
$routes->put('kelola_siswa/(:any)', 'Home::update/$1');
$routes->delete('/kelola_siswa/(:any)', 'Home::destroy/$1');
$routes->get('/ubah_siswa/(:any)', 'Home::edit/$1');

$routes->get('login', 'Auth::login');

$routes->presenter('materis', ['filters'=>'isLoggedIn']);
$routes->presenter('percakapan', ['filters'=>'isLoggedIn']);
$routes->presenter('guru', ['filters'=>'isLoggedIn']);
$routes->presenter('register');
$routes->presenter('siswa',['filters'=>'isLoggedIn'] );

// API
$routes->post('ApiGuru', 'ApiGuru::getGuru');
$routes->get('ApiSiswa', 'ApiSiswa::tampildata');
$routes->post('ApiSiswa', 'ApiSiswa::tampildata');
$routes->post('Apilogin', 'Apilogin::Login');
$routes->post('ApiProfil', 'ApiProfil::SiswaNISN');

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
