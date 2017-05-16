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
//use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('profile')->group(function() {
    Route::get('/', 'ProfileController@index')->name('update.show');
    Route::post('/show', 'ProfileController@update')->name('update.profile');
    Route::post('/', 'ProfileController@update_avatar')->name('update.avatar');

});





Route::group(['name'=>'company'], function(){
    Route::get('company/login', 'Auth\CompanyLoginController@showLoginForm' )->name('company.login');
    Route::post('company/login', 'Auth\CompanyLoginController@login' )->name('company.login.submit');
    Route::post('company/logi', 'Auth\CompanyRegisterController@postRegister' )->name('company.reg.submit');
    Route::get('company/', 'CompanyController@index' )->name('company.dashboard');
    Route::post('company', 'CompanyController@update_logo')->name('company.update.logo');
    Route::resource('company_profile',  'CompanyProfileController');
    Route::resource('posts',  'PostController');
    Route::resource('comments',  'CommentsController');
});





Route::resource('user_comment',  'UserCommentController');
Route::resource('companys', 'ComViewController');
Route::resource('rating', 'RatingController');



    Route::prefix('admin')->group(function(){
        Route::post('/search/', 'AdminController@index');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm' )->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login' )->name('admin.login.submit');
        Route::get('/', 'AdminController@index' )->name('admin.dashboard');

});
Auth::routes();

