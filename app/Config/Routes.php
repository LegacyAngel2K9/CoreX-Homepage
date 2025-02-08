<?php

namespace Config;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

/*
|--------------------------------------------------------------------------
| Default Route
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
$routes->get('features', 'Home::index#features');
$routes->get('download', 'Home::index#download');
$routes->get('docs', 'Home::index#docs');
$routes->get('team', 'Home::index#team');
$routes->get('community', 'Home::index#community');

/*
|--------------------------------------------------------------------------
| API Routes (Future Expansions)
|--------------------------------------------------------------------------
*/
$routes->group('api', function ($routes) {
    $routes->get('contributors', 'ApiController::getContributors');
});

/*
|--------------------------------------------------------------------------
| Custom 404 Route
|--------------------------------------------------------------------------
*/
$routes->set404Override(function () {
    return view('errors/404');
});

/*
|--------------------------------------------------------------------------
| Auto Routing (Disabled for Security)
|--------------------------------------------------------------------------
*/
$routes->setAutoRoute(false);
