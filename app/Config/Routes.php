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
$routes->setAutoRoute(true);
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


$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('crud_ci4')) {
        echo 'Database created!';
    }
});
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->addRedirect('/', 'home');

$routes->get('auth/updatepass/(:num)', 'auth::updatepassword/$1');
$routes->resource('unitkerja', ['filter' => 'isLoggedIn']);
$routes->resource('bagian', ['filter' => 'isLoggedIn']);
$routes->resource('jabatan', ['filter' => 'isLoggedIn']);
$routes->get('jobdesk/download/(:num)', 'Jobdesk::download/$1');
$routes->resource('jobdesk', ['filter' => 'isLoggedIn']);
$routes->get('user/(:num)/reset_pass', 'User::reset_pass/$1');
$routes->resource('user', ['filter' => 'isLoggedIn']);

$routes->resource('areaaset', ['filter' => 'isLoggedIn']);
$routes->get('get_kecamatan', 'AreaAset::get_kecamatan');

$routes->resource('areaokupasi', ['filter' => 'isLoggedIn']);
$routes->get('get_kecamatan', 'AreaOkupasi::get_kecamatan');

$routes->resource('guna', ['filter' => 'isLoggedIn']);
$routes->resource('sertifikat', ['filter' => 'isLoggedIn']);

$routes->get('project/gettaskdetail/(:any)/(:any)', 'project::gettaskdetail/$1/$2');
$routes->resource('project', ['filter' => 'isLoggedIn']);
$routes->post('project/create_project_m', 'project::create_project_m');
$routes->post('project/upd_p_milestone/(:any)', 'project::upd_p_milestone/$1');
$routes->post('project/del_p_milestone/(:any)', 'project::del_p_milestone/$1');
$routes->post('project/create_project_t', 'project::create_project_t');
$routes->post('project/upd_p_task/(:any)', 'project::upd_p_task/$1');
$routes->post('project/del_p_task/(:any)', 'project::del_p_task/$1');

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
