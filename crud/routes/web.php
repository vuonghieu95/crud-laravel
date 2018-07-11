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
//

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);

Route::post('login', 'LoginController@postLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('authors', 'AuthorsController');

});

Route::get('search',
    [
        'as' => 'search',
        'uses' => 'AuthorsController@getSearch'
    ]);

Route::get('downloadExcel', [
    'as' => 'download',
    'uses' => 'AuthorsController@exportCSV'
]);

Route::get('admin', function () {
    echo 'abc';
})->middleware('admin');