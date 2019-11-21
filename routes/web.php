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
// Route::get('/hoell',function(){
//     echo 1111;
// });
Route::view('/hoell','hh');
// Route::post('/dofrom',function(){
//     $post = request()->post();
//     dd($post);
// });
// Route::get('/index','regcontroller@index');
// Route::get('/show/{id}',function($id){
//     echo $id;
// });
Route::get('/show/{id?}/{name?}',function($id='0',$username='隔壁老王'){
    echo $id;
    echo $username;
});
Route::view('brand','brand/brand');
//登录
Route::get('login/login','Admin\LoginController@create');
Route::post('login/store','Admin\LoginController@store');
Route::get('login/del','Admin\LoginController@del');
//品牌
Route::prefix('/brand')->middleware('CheckLogin')->group(function () {
    Route::get('create','Admin\BrandController@create');
    Route::post('store','Admin\BrandController@store');
    Route::get('index','Admin\BrandController@index');
    Route::get('delete/{id}','Admin\BrandController@destroy');
    Route::get('edit/{id}','Admin\BrandController@edit');
    Route::post('update/{id}','Admin\BrandController@update');
});
//管理员
Route::prefix('/admin')->middleware('CheckLogin')->group(function () {
    Route::get('create/','Admin\AdminController@create');
    Route::post('store','Admin\AdminController@store');
    Route::get('index','Admin\AdminController@index');
    Route::get('delete/{id}','Admin\AdminController@destroy');
    Route::get('edit/{id}','Admin\AdminController@edit');
    Route::post('update/{id}','Admin\AdminController@update');
});
//分类
Route::prefix('/category')->middleware('CheckLogin')->group(function () {
    Route::get('create/','Admin\CategoryController@create');
    Route::post('store','Admin\CategoryController@store');
    Route::get('index','Admin\CategoryController@index');
    Route::get('delete/{id}','Admin\CategoryController@destroy');
    Route::get('edit/{id}','Admin\CategoryController@edit');
    Route::post('update/{id}','Admin\CategoryController@update');
});
//商品
Route::prefix('/goods')->group(function () {
    Route::get('create/','Admin\GoodsController@create');
    Route::post('store','Admin\GoodsController@store');
    Route::get('index','Admin\GoodsController@index');
    Route::get('delete/{id}','Admin\GoodsController@destroy');
    Route::get('edit/{id}','Admin\GoodsController@edit');
    Route::post('update/{id}','Admin\GoodsController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/text')->middleware('CheckLogin')->group(function () {
    Route::get('create','TextController@create');
    Route::post('store','TextController@store');
    Route::post('show','TextController@show');
    Route::get('index','TextController@index');
    Route::get('delete/{id}','TextController@destroy');
    Route::get('edit/{id}','TextController@edit');
    Route::post('update/{id}','TextController@update');
});



Route::any('/','Index\IndexController@index');
Route::any('/login','Index\IndexController@login');
Route::any('/reg','Index\IndexController@reg');
Route::any('/login2','Index\LoginController@index');
Route::any('/regdo','Index\LoginController@regdo');
Route::any('/logindo','Index\LoginController@logindo');


Route::any('/goods/index/{id}','Index\GoodsController@index');
Route::any('/goods/detail/{id}','Index\GoodsController@detail');


Route::prefix('/cart')->middleware('CheckLogin')->group(function () {
Route::any('addcart','Index\CartController@addcart');
Route::any('cartlist','Index\CartController@cartlist');
Route::any('cartdel','Index\CartController@cartdel');
Route::any('changeNum','Index\CartController@changeNum');
Route::any('getTotal','Index\CartController@getTotal');
Route::any('getCount','Index\CartController@getCount');
Route::any('pay','Index\CartController@pay');
});

Route::prefix('/order')->middleware('CheckLogin')->group(function () {
    Route::any('paymoney/{id}','Index\OrderController@paymoney');
    Route::any('pay','Index\OrderController@pay');


});

Route::any('student','Admin\StudentController@index');

//wuliu
Route::any('/wuliu/login','Wuliu\LoginController@login');
Route::any('/wuliu/logindo','Wuliu\IndexController@logindo');


Route::any('/wuliu/index','Wuliu\IndexController@index');
Route::any('/wuliu/create','Wuliu\IndexController@create');
Route::any('/wuliu/store','Wuliu\IndexController@store');

Route::any('/liuyan/login','Liuyan\LoginController@login');
Route::prefix('/liuyan')->middleware('CheckLogin')->group(function () {
    
    Route::any('pay','Index\OrderController@pay');
});