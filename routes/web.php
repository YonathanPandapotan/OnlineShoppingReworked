<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/login', function () use ($router) {
    return view('LoginPage');
});
$router->get('/test', 'MainController@test');
$router->get('/listBarang', 'MainController@listBarang');
$router->post('/listBarang', 'MainController@tambahKeranjang');
$router->get('/keranjangAnda', 'MainController@lihatKeranjang');
$router->get('/prosesTransaksi', 'MainController@persiapkanTransaksi');
$router->get('/daftarBaru', 'MainController@daftarBaru');
$router->get('/logOut', 'MainController@logOut');
$router->post('/prosesTransaksi', 'MainController@prosesTransaksi');
$router->post('/login', 'MainController@login');
$router->post('/daftarBaru', 'MainController@daftarBaru');
$router->post('/keranjangAnda', 'MainController@hapusKeranjang');
