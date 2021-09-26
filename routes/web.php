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
Route::get('/', 'HomeController@index');



//admin
Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@loginAdmin');

Route::get('/admin/home', function () {
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
    
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
    
        ]);                 
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
    
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
    
        ]);
        
        
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
    
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
    
        ]);
        
        
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'AdminSlideController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'AdminSlideController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSlideController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSlideController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSlideController@update'
    
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSlideController@delete'
    
        ]);
       
        
        
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [
            'as' => 'setting.index',
            'uses' => 'AdminSettingController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'setting.create',
            'uses' => 'AdminSettingController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'setting.store',
            'uses' => 'AdminSettingController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'AdminSettingController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'setting.update',
            'uses' => 'AdminSettingController@update'
    
        ]);
        Route::get('/delete/{id}', [
            'as' => 'setting.delete',
            'uses' => 'AdminSettingController@delete'
    
        ]);

    });
    Route::prefix('user')->group(function () {
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'AdminUserController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'AdminUserController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'AdminUserController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'AdminUserController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'AdminUserController@update'
    
        ]);
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'AdminSettingController@delete'
    
        ]);

    });
    Route::prefix('role')->group(function () {
        Route::get('/', [
            'as' => 'role.index',
            'uses' => 'AdminRoleController@index'
    
        ]);
        Route::get('/create', [
            'as' => 'role.create',
            'uses' => 'AdminRoleController@create'
    
        ]);
        Route::post('/store', [
            'as' => 'role.store',
            'uses' => 'AdminRoleController@store'
    
        ]);
        Route::get('/edit/{id}', [
            'as' => 'role.edit',
            'uses' => 'AdminRoleController@edit'
    
        ]);
        Route::post('/update/{id}', [
            'as' => 'role.update',
            'uses' => 'AdminRoleController@update'
    
        ]);
        Route::get('/delete/{id}', [
            'as' => 'role.delete',
            'uses' => 'AdminSettingController@delete'
    
        ]);
        
    });
        
});



