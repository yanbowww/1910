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

// Route::get('/', function () {
//     return view('welcome');
// });
//闭包路由
Route::get('/aa', function () {
    return '这是一个闭包路由';
});
//走控制器方法的路由
//返回视图的两种方式
//Route::get('/index','IndexController@index');
Route::view('/index','index',['name'=>'闫博shuaishuai']);
//举例post方法请求
Route::get('/user/add','IndexController@index');
Route::post('/user/doadd','IndexController@doadd')->name('doadd');

//必填参数
// Route::get('/goods/{id}', function ($id) {
//     return $id;
// });
Route::get('/goods/{id}','IndexController@good');
Route::get('/goods/{id}/{name}','IndexController@goods')->where(['name'=>'[a-zA-Z\x{4e00}-\x{9fa5}]{3,6}']);

//可选参数
// Route::get('/show/{id?}',function($id=0){
// 	return $id;
// });
Route::get('/show/{id?}','IndexController@show');
//混合参数
Route::get('/detail/{id}/{name?}','IndexController@detail');

Route::domain('admin.laravel.com')->group(function(){
//品牌管理
Route::prefix('/brand')->middleware('islogin')->group(function(){
Route::get('/','Admin\BrandController@index');//列表展示
Route::get('create','Admin\BrandController@create');//添加页面
Route::post('store','Admin\BrandController@store');//执行添加
Route::get('edit/{id}','Admin\BrandController@edit');//编辑展示
Route::post('update/{id}','Admin\BrandController@update');//执行添加
Route::get('destroy/{id}','Admin\BrandController@destroy');//删除
});
//分类管理
Route::prefix('/cate')->middleware('islogin')->group(function(){
Route::get('/','Admin\CateController@index');//列表展示
Route::get('create','Admin\CateController@create');//添加页面
Route::post('store','Admin\CateController@store');//执行添加
Route::get('edit/{id}','Admin\CateController@edit');//编辑展示
Route::post('update/{id}','Admin\CateController@update');//执行添加
Route::get('destroy/{id}','Admin\CateController@destroy');//删除
});
//商品管理
Route::prefix('/goods')->middleware('islogin')->group(function(){
Route::get('/','Admin\GoodsController@index');//列表展示
Route::get('create','Admin\GoodsController@create');//添加页面
Route::post('store','Admin\GoodsController@store');//执行添加
Route::get('edit/{id}','Admin\GoodsController@edit');//编辑展示
Route::post('update/{id}','Admin\GoodsController@update');//执行添加
Route::get('destroy/{id}','Admin\GoodsController@destroy');//删除
});
//管理员管理
Route::prefix('/admin')->middleware('islogin')->group(function(){
Route::get('/','Admin\AdminController@index');//列表展示
Route::get('create','Admin\AdminController@create');//添加页面
Route::post('store','Admin\AdminController@store');//执行添加
Route::get('edit/{id}','Admin\AdminController@edit');//编辑展示
Route::post('update/{id}','Admin\AdminController@update');//执行添加
Route::get('destroy/{id}','Admin\AdminController@destroy');//删除
});
//友情链接管理
Route::prefix('lianjie')->group(function(){
Route::get('/','Admin\LianjieController@index');//列表展示
Route::get('create','Admin\LianjieController@create');//添加页面
Route::post('store','Admin\LianjieController@store');//执行添加
Route::get('edit/{id}','Admin\LianjieController@edit');//编辑展示
Route::post('update/{id}','Admin\LianjieController@update');//执行添加
Route::get('destroy/{id}','Admin\LianjieController@destroy');//删除
Route::get('destroy/{id}','Admin\LianjieController@destroy');//删除
});
//新闻
Route::prefix('/new')->group(function(){
Route::get('/','Admin\NewController@index');//列表展示
Route::get('create','Admin\NewController@create');//添加页面
Route::post('store','Admin\NewController@store');//执行添加
Route::get('edit/{id}','Admin\NewController@edit');//编辑展示
Route::post('update/{id}','Admin\NewController@update');//执行添加
Route::get('destroy/{id}','Admin\NewController@destroy');//删除
});

// Route::view('/login','admin.login');
// Route::post('/logindo','Admin\LoginController@Logindo');

//cookie的应用
Route::get('/setcookie','IndexController@setcookie');//设置
Route::get('/getcookie','IndexController@getcookie');//设置
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
});
Route::domain('www.laravel.com')->group(function(){
Route::get('/','Index\IndexController@index');
Route::get('login','Index\LoginController@login');
Route::get('reg','Index\LoginController@reg');

//手机号发送验证码
Route::post('sendSms','Index\LoginController@sendSms');
//邮箱发送验证码
Route::get('/sendEmail','Index\LoginController@sendEmail');
Route::get('/goods/{id}','Index\GoodsController@index');
});