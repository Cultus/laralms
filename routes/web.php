<?php
use Illuminate\Routing\Router;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (Router $router) {
    $router->get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    $router->post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    $router->get('/', 'AdminController@index')->name('admin.dashboard');
});

