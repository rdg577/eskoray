<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web', 'auth', 'App\Http\Middleware\BranchAdminMiddleware']], function () {
    Route::get('/receipts', function () {
       return 'Receipts';
    });
});*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');
    Route::get('/register-user', 'HomeController@registerUser');
    Route::post('/register-user', 'HomeController@postRegisterUser');
    Route::get('/list-user', 'HomeController@listUser');
    Route::get('/user/{id}/edit', 'HomeController@editUser');
    Route::patch('/user/{id}', 'HomeController@update');

    Route::get('/register-branch', 'BranchController@create');
    Route::post('/register-branch', 'BranchController@store');
    Route::get('/list-branch', 'BranchController@index');
    Route::get('/branch/{id}/edit', 'BranchController@edit');
    Route::patch('/branches/{id}', 'BranchController@update');

    Route::get('/services', 'ServiceController@index');
    Route::post('/services', 'ServiceController@store');
    Route::get('/service/{id}/edit', 'ServiceController@edit');
    Route::patch('/services/{id}', 'ServiceController@update');

    Route::get('/receipts', 'ReceiptController@index');
    Route::post('/receipts', 'ReceiptController@store');
});
