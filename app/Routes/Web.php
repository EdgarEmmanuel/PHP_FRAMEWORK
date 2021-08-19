<?php

namespace App\Routes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

abstract class Web {

    const ROUTES = [
        ["GET","/",['App\Controllers\HomeController', 'home']],
        ['GET', '/articles/{name}/{id}', ['App\Controllers\HomeController', 'show']],

        ['GET', 'login', ['App\Controllers\AuthController', 'home']],
        ['POST', 'login', ['App\Controllers\AuthController', 'login']]
    ];

}








?>