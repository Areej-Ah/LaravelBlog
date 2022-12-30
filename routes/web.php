<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/posts','App\Http\Controllers\PagesController@posts');

Route::get('/posts/{post}','App\Http\Controllers\PagesController@post');

//Route::post('/posts/store','App\Http\Controllers\PagesController@store');

Route::post('/posts/{post}/store','App\Http\Controllers\CommentsController@store');

Route::get('/category/{name}','App\Http\Controllers\PagesController@category');

//auth
Route::get('/register','App\Http\Controllers\RegistrationController@create');

Route::post('/register','App\Http\Controllers\RegistrationController@store');


Route::get('/login','App\Http\Controllers\SessionsController@create');

Route::post('/login','App\Http\Controllers\SessionsController@store');

Route::get('/logout','App\Http\Controllers\SessionsController@destroy');

Route::get('/access-denied','App\Http\Controllers\PagesController@accessDenied');
Route::get('/statistics','App\Http\Controllers\PagesController@statistics');



//test

Route::group(['middleware'=>'roles', 'roles'=> ['Admin']], function(){
    Route::get('/admin','App\Http\Controllers\PagesController@admin');
    Route::post('/add-role','App\Http\Controllers\PagesController@addRole');
    Route::post('/settings','App\Http\Controllers\PagesController@settings');

});

Route::group(['middleware'=>'roles', 'roles'=> ['Editor','Admin']], function(){
    Route::get('/editor','App\Http\Controllers\PagesController@editor');
    Route::post('/posts/store','App\Http\Controllers\PagesController@store');


});
Route::group(['middleware'=>'roles', 'roles'=> ['User','Editor','Admin']], function(){

    Route::post('/like','App\Http\Controllers\PagesController@like')->name('like');
    Route::post('/dislike','App\Http\Controllers\PagesController@dislike')->name('dislike');


});

////or/////////////
/*Route::get('/admin',[
    'uses'=> 'App\Http\Controllers\PagesController@admin',
    'as' => 'content.admin',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/add-role',[
    'uses'=> 'App\Http\Controllers\PagesController@addRole',
    'as' => 'content.admin',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/editor',[
    'uses'=> 'App\Http\Controllers\PagesController@editor',
    'as' => 'content.editor',
    'middleware' => 'roles',
    'roles' => ['admin','editor']
]);*/
