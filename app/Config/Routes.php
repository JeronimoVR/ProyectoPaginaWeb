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
$routes->get('/', 'Home::index');

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

#crud
$routes->post('guardar', 'Home::guardar');
$routes->get('listarU', 'Home::listarU');
$routes->get('listarA', 'Home::listarA');
$routes->post('actualizar', 'Home::actualizar');
$routes->post('actualizarCuenta', 'Home::actualizarCuenta');
$routes->get('borrarU/(:num)', 'Home::borrarU/$1');
$routes->get('borrarA/(:num)', 'Home::borrarA/$1');

#vistas  CRUD
$routes->get('cuenta/(:num)', 'Home::cuenta/$1');
$routes->get('editar/(:num)', 'Home::editar/$1');
$routes->get('registro', 'Home::registrarse');

#funciones de la pagina
$routes->post('login', 'Home::login');
$routes->get('salir', 'Home::salir');
$routes->get('inicio', 'Home::inicio');

#hoja de vida
$routes->get('hojaJeronimo', 'Home::hojaJeronimo');

#vistas
$routes->get('comidaMar', 'Home::comidaMar');
$routes->get('ensalada', 'Home::ensalada');
$routes->get('sopas', 'Home::sopas');
$routes->get('carnes', 'Home::carnes');

#Encuesta
$routes->get('formulario', 'Home::formulario');
$routes->get('reportes', 'Home::reportes');
$routes->get('encuesta', 'Home::encuestar');