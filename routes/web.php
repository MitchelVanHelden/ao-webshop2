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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//categories
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}/details', 'CategoryController@display');

//products
Route::get('/products', [
    'uses'=> 'ProductController@index',
    'as' =>'product.index'
]);
Route::get('products/{id}/details', 'ProductController@display');

//Shopping cart
Route::get('/add-to-cart/{id}',[
    'uses' => 'CartController@addProduct',
    'as' => 'cart.addProduct'
]);

Route::get('/reduce/{id}', [
    'uses' => 'CartController@getReduceByOne',
    'as' => 'cart.reduceOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'CartController@getRemoveItem',
    'as' => 'cart.deleteItem']);


Route::get('/shopping-cart',[
    'uses' => 'CartController@getCart',
    'as' => 'cart.getCart']);

//Betalen
Route::get('/checkout', [
    'uses' => 'CartController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'CartController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

//Profile
Route::get('/profile', [
    'uses' => 'CartController@getProfile',
    'as' => 'user.profile'
]);