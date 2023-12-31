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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'AuthController::login');

$routes->get('/', 'HomeController::index');

$routes->get('/supplier', 'SupplierController::index');
$routes->get('/supplier/readSupplier', 'SupplierController::readSupplier');
$routes->get('/supplier/addSupplier', 'SupplierController::addSupplier');
$routes->get('/supplier/addMultipleSupplier', 'SupplierController::addMultipleSupplier');
$routes->post('/supplier/saveSupplier', 'SupplierController::saveSupplier');
$routes->post('supplier/saveMultipleSupplier', 'SupplierController::saveMultipleSupplier');
$routes->get('supplier/deleteMultipleSupplier', 'SupplierController::deleteMultipleSupplier');
$routes->delete('supplier/deleteSupplier/(:num)', 'SupplierController::deleteSupplier/$1');

$routes->get('/barang', 'BarangController::index');
$routes->get('/barang/readBarang', 'BarangController::readBarang');
$routes->get('/barang/addBarang', 'BarangController::addBarang');
$routes->get('/barang/addMultipleBarang', 'BarangController::addMultipleBarang');
$routes->post('/barang/saveBarang', 'BarangController::saveBarang');
$routes->post('barang/saveMultipleBarang', 'BarangController::saveMultipleBarang');
$routes->get('barang/deleteMultipleBarang', 'BarangController::deleteMultipleBarang');
$routes->delete('barang/deleteBarang/(:num)', 'BarangController::deleteBarang/$1');

$routes->get('/barangMasuk', 'BarangMasukController::index');
$routes->get('/barangMasuk/readBarangMasuk', 'BarangMasukController::readBarangMasuk');
$routes->get('/barangMasuk/addBarangMasuk', 'BarangMasukController::addBarangMasuk');
$routes->post('/barangMasuk/saveBarangMasuk', 'BarangMasukController::saveBarangMasuk');

$routes->get('/barangKeluar', 'BarangKeluarController::index');
$routes->get('/barangKeluar/readBarangKeluar', 'BarangKeluarController::readBarangKeluar');
$routes->get('/barangKeluar/addBarangKeluar', 'BarangKeluarController::addBarangKeluar');
$routes->post('/barangKeluar/saveBarangKeluar', 'BarangKeluarController::saveBarangKeluar');
$routes->post('/barangKeluar/getStok/', 'BarangKeluarController::getStok');

$routes->get('/persediaan', 'PersediaanController::index');
$routes->get('/persediaan/readPersediaan', 'PersediaanController::readPersediaan');
$routes->get('/persediaan/addPersediaan', 'PersediaanController::addPersediaan');
$routes->post('/persediaan/savePersediaan', 'PersediaanController::savePersediaan');
$routes->get('persediaan/addMultiplePersediaan', 'PersediaanController::addMultiplePersediaan');
$routes->post('persediaan/saveMultiplePersediaan', 'PersediaanController::saveMultiplePersediaan');
$routes->delete('persediaan/deletePersediaan/(:num)', 'PersediaanController::deletePersediaan/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
