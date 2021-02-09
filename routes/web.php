<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\FormApplicationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [FormApplicationController::class, 'showApplicationForm'])->name('show_form');
Route::post('/', [FormApplicationController::class, 'showApplicationFormPost'])->name('post.show_form');
Route::get('/addmore', [FormApplicationController::class, 'addMoreDiv'])->name('add_more');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
], function ($router) {

    $router->group([
        'middleware' => 'adminguest',
        'namespace' => 'Auth'
    ], function ($router) {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('show_login');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });


    $router->group([
        'middleware' => 'adminauth', // Custom auth middleware
    ], function ($router) {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('index', [HomeController::class, 'index'])->name('home');
        Route::get('user/index', [UserController::class, 'index'])->name('user.index');
        Route::get('user/view/{id}', [UserController::class, 'view'])->name('user.view');
        Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
});
