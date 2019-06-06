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

Route::get('/', 'WishController@index')->name('home');
Route::get('/home', function() {
    return redirect()->route('home');
});

Route::get('mailable', function () {
    $fulfillment = App\Fulfillment::find(1);

    return new App\Mail\WishFulfillmentCreated($fulfillment);
});

Route::get('wish/fulfillment', 'WishFulfillmentController@index')
    ->name('wish.fulfillment.index');
    
Route::resource('/wish', 'WishController');

Route::get('/wish/{wish}/fulfillment/create', 'WishFulfillmentController@create')
    ->name('wish.fulfillment.create');
Route::post('/wish/{wish}/fulfillment', 'WishFulfillmentController@store')
    ->name('wish.fulfillment.store');

Route::get('/wish/fulfillment/{fulfillment}', 'WishFulfillmentController@show')
    ->name('wish.fulfillment.show');
Route::put('/wish/fulfillment/{fulfillment}', 'WishFulfillmentController@update')
    ->name('wish.fulfillment.update');

Route::post('/wish/fulfillment/{fulfillment}/comment', 'WishFulfillmentCommentController@store')
    ->name('wish.fulfillment.comment.store');

Auth::routes();