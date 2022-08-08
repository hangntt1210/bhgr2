<?php

use Illuminate\Support\Facades\Route;
use App\Models\Type;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

Route::get('thu', function () {
	$ty = Type::find(1);
	//echo $ty->name;
	foreach ($ty->product as $prod) {
		echo $prod->name."<br>";
	}
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('trang-chu','App\Http\Controllers\PageController@getIndex')->name('trang-chu');

Route::get('loai/{type}','App\Http\Controllers\PageController@getLoai')->name('loaisanpham');
Route::get('chatlieu/{type}','App\Http\Controllers\PageController@getChatlieu')->name('loaichatlieu');

Route::get('chi-tiet/{id}','App\Http\Controllers\PageController@getChitiet')->name('chitietsanpham');


Route::get('dang-ki','App\Http\Controllers\PageController@getSignup')->name('signup');

Route::post('dang-ki','App\Http\Controllers\PageController@postSignup')->name('signup');

Route::get('dang-nhap','App\Http\Controllers\PageController@getLogin')->name('login');

Route::post('dang-nhap','App\Http\Controllers\PageController@postLogin')->name('login');

Route::get('dang-xuat','App\Http\Controllers\PageController@getLogout')->name('logout');

Route::get('search','App\Http\Controllers\PageController@getSearch')->name('search');

Route::get('don-hang-da-dat','App\Http\Controllers\PageController@getAllOrder')->name('da-dat');
//
Route::get('so-sanh','App\Http\Controllers\PageController@getCompare')->name('so-sanh');
Route::post('bang-so-sanh','App\Http\Controllers\PageController@getCompareTable')->name('bang-so-sanh');
//
Route::get('tim-theo-kich-thuoc','App\Http\Controllers\PageController@getSearchSize')->name('tim-theo-kich-thuoc');
Route::post('ket-qua-tim-theo-kich-thuoc','App\Http\Controllers\PageController@getSearchSizeResult')->name('kq-tim-theo-kich-thuoc');//sua post->any, post/any ko paginate duoc

Route::get('chi-tiet-don-hang/{id}','App\Http\Controllers\PageController@getDetailOrder')->name('chi-tiet-don');

Route::get('danh-gia/{id}','App\Http\Controllers\PageController@getCommentOrder')->name('danh-gia-don');
Route::post('danh-gia-san-pham/{id}','App\Http\Controllers\PageController@storeComment')->name('danh-gia-sp');

Route::get('add-to-cart/{id}',[
	'as' => 'themgiohang',
	'uses' => 'App\Http\Controllers\CartController@getAddToCart'
]);

Route::get('del-cart/{id}',[
	'as' => 'xoagiohang',
	'uses' => 'App\Http\Controllers\CartController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as' =>'dathang',
	'uses' => 'App\Http\Controllers\CartController@getCheckout'
]);

Route::post('dat-hang',[
	'as' => 'dathang1',
	'uses' => 'App\Http\Controllers\CartController@postCheckout'
]);

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('products', ProductController::class)->names([
	    'create' => 'create_product',
	    'store' => 'store_product',
	    'index' => 'list_product',
	    'edit' => 'edit_product',
	    'update' => 'update_product',
	    'show' => 'read_product',
	]);

	Route::resource('users', UserController::class)->names([
	    'create' => 'create_user',
	    'store' => 'store_user',
	    'index' => 'list_user',
	    'edit' => 'edit_user',
	    'update' => 'update_user',
	    'show' => 'read_user',
	]);

	Route::resource('orders', OrderController::class)->names([
	    'create' => 'create_order',
	    'store' => 'store_order',
	    'index' => 'list_order',
	    'edit' => 'edit_order',
	    'update' => 'update_order',
	    'show' => 'read_order',
	]);
});

Route::get('profile','App\Http\Controllers\PageController@getProfile')->name('profile');

Route::get('combo','App\Http\Controllers\PageController@getCombo')->name('combo');
