<?php

use App\Controllers\Home;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes ->get('/profile/(:any)/(:any)/(:any)',[UserController::class,'profile']);
//user
$routes->get('/user/create',[UserController::class,'create']);
$routes->post('/user/store',[UserController::class,'store']);
$routes->get('/user',[UserController::class,'index']);
$routes->get('/user/(:any)/edit',[UserController::class,'edit']);
$routes->put('/user/(:any)',[UserController::class, 'update']);
$routes->delete('/user/(:any)',[UserController::class,'destroy']);
$routes->get('user/(:any)',[UserController::class,'show']);

//kelas
$routes->get('/kelas',[UserController::class,'listKelas']);
$routes->get('/kelas/add',[UserController::class,'addKelas']);
$routes->post('/kelas/store',[UserController::class,'storeKelas']);
$routes->get('/kelas/(:any)/edit',[UserController::class,'editKelas']);
$routes->put('/kelas/(:any)',[UserController::class, 'updateKelas']);
$routes->delete('/kelas/(:any)',[UserController::class,'hapusKelas']);