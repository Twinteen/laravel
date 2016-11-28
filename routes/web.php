<?php

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

Route::get('/testAngular', function () {
    Blade::setContentTags('<%', '%>');        // for variables and all things Blade
    Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
    return View::make('angular/firstTest');
    //return view('angular/firstTest');
});

Route::get('/responseTest', 'TestController@index');

Route::get('/go', 'TestController@teststore');

Route::get('/show', 'TestController@indexNew');

Route::any('{catchall}', function() {
    //some code
})->where('catchall', '.*');