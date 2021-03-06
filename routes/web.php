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

// Route::get('/admin', function(){
//     return view("admin.upload");
// })->middleware('auth');

Route::get('/test',function(){
    return view("test");
});

Route::get('/wechat-test', function (\Illuminate\Http\Request $request) {

    //    $user = session('wechat.oauth_user');
    
        return view('wechat', [
           'jssdk' => $request->get('jssdk')
        ]);
    });

Route::get('/admin' , "AdminController@home")->middleware('auth');;
Route::post('/admin/putfile', 'AdminController@putFile');
Route::get('/presentation', 'Controller@presentation');

