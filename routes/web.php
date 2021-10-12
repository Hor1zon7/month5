<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
//登录功能路由
Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('dologin',"StudentController@dologin")->name('dologin');

//群组路由和群组中间件
Route::group(['prefix'=>'student','middleware'=>'LoginCheck'],function (){
   Route::get('form',"StudentController@form")->name('form');
   Route::post('doform',"StudentController@doform")->name('doform');
   Route::get('show',"StudentController@show")->name('show');
   Route::get('delStudent',"StudentController@delStudent")->name('delStudent');
   Route::get('detail',"StudentController@detail")->name('detail');
   Route::post('updateData',"StudentController@updateData")->name('updateData');
});
