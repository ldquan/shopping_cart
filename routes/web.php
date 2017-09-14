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

Route::get('index',[
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);
Route::get('product-type/{id}',[
    'as' => 'loai-san-pham',
    'uses' => 'PageController@getProductType'
]);

Route::get('product-detail/{id}',[
    'as' => 'san-pham',
    'uses' => 'PageController@getProductDetail'
]);

Route::get('contact',[
    'as' => 'lien-he',
    'uses' => 'PageController@getContact'
]);

Route::get('about',[
    'as' => 'thong-tin',
    'uses' => 'PageController@getAbout'
]);

Route::get('login',[
    'as' => 'dang-nhap',
    'uses' => 'PageController@getLogin'
]);

Route::post('login',[
    'as' => 'dang-nhap',
    'uses' => 'PageController@postLogin'
]);

Route::get('register',[
    'as' => 'dang-ki',
    'uses' => 'PageController@getRegister'
]);

Route::post('register',[
    'as' => 'dang-ki',
    'uses' => 'PageController@postRegister'
]);

Route::get('logout',[
    'as' => 'dang-xuat',
    'uses' => 'PageController@getLogout'
]);

Route::get('search',[
    'as' => 'tim-kiem',
    'uses' => 'PageController@getSearch'
]);

Route::post('search',[
    'as' => 'tim-kiem',
    'uses' => 'PageController@postSearch'
]);

Route::post('order-products/{id}',[
    'as' => 'dat-hang',
    'uses' => 'PageController@getOrder'
]);
Route::get('delete-cart-item/{id}',[
    'as' => 'xoa-gio-hang',
    'uses' => 'PageController@getDeleteCartItem'
]);