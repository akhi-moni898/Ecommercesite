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

Route::get('/', 'frontend\pagescontroller@index')->name('index');




Route::get('/contact', 'frontend\pagescontroller@contact')->name('contact');


  Route::group(['prefix'=>'products'],function(){



  Route::get('/', 'frontend\productscontroller@index')->name('products');

Route::get('/product/{slug}', 'frontend\productscontroller@show')->name('products.show');
Route::get('/new/search', 'frontend\pagescontroller@search')->name('search');


//Route::get('/categories', 'frontend\categoriescontroller@index')->name('categories.index');

Route::get('/category/{id}', 'frontend\categoriescontroller@show')->name('categories.show');


         

   });

  


Route::get('/products', 'frontend\productscontroller@index')->name('products');

Route::get('/product/{slug}', 'frontend\productscontroller@show')->name('products.show');
Route::get('/search', 'frontend\pagescontroller@search')->name('search');

Route::get('/token/{token}', 'frontend\confirmcontroller@confirm')->name('user.verification');
Route::get('/dashboard', 'frontend\userscontroller@dashboard')->name('user.dashboard');
Route::get('/profile', 'frontend\userscontroller@profile')->name('user.profile');
Route::post('/profile/update', 'frontend\userscontroller@profileupdate')->name('user.profile.update');



 Route::group(['prefix'=>'admin'],function(){
     
 Route::get('/', 'backend\pagescontroller@index')->name('admin.pages.index');

Route::group(['prefix'=>'products'],function(){



  Route::get('/', 'backend\productscontroller@index')->name('admin.products');
  Route::get('/create', 'backend\productscontroller@create')->name('admin.pages.product.create');
 Route::get('/edit/{id}', 'backend\productscontroller@edit')->name('admin.pages.product.edit');
  Route::post('/create', 'backend\productscontroller@store')->name('admin.product.store');
    Route::post('/edit/{id}', 'backend\productscontroller@update')->name('admin.product.update');
     Route::post('/delete/{id}', 'backend\productscontroller@delete')->name('admin.product.delete');

	 });

 
Route::group(['prefix'=>'carts'],function(){
   Route::get('/', 'frontend\cartscontroller@index')->name('carts');

     Route::post('/store', 'frontend\cartscontroller@store')->name('carts.store');

   });
Route::group(['prefix'=>'categories'],function(){



 Route::get('/', 'backend\categoriescontroller@index')->name('admin.categories');
 Route::get('/create', 'backend\categoriescontroller@create')->name('admin.pages.category.create');
 Route::get('/edit/{id}', 'backend\categoriescontroller@edit')->name('admin.pages.categories.edit');
  Route::post('/create', 'backend\categoriescontroller@store')->name('admin.category.store');
    Route::post('/edit/{id}', 'backend\categoriescontroller@update')->name('admin.category.update');
     Route::post('/delete/{id}', 'backend\categoriescontroller@delete')->name('admin.category.delete');

	 });






Route::group(['prefix'=>'brands'],function(){

  Route::get('/', 'backend\BrandsController@index')->name('admin.brands');
  
 Route::get('/create', 'backend\BrandsController@create')->name('admin.pages.brand.create');

 Route::get('/edit/{id}', 'backend\BrandsController@edit')->name('admin.pages.brands.edit');
 
  Route::post('/create', 'backend\BrandsController@store')->name('admin.brand.store');
  
    Route::post('/edit/{id}', 'backend\BrandsController@update')->name('admin.brand.update');
    
     Route::post('/delete/{id}', 'backend\BrandsController@delete')->name('admin.brand.delete');
      

   });



Route::group(['prefix'=>'districts'],function(){

  Route::get('/', 'backend\DistrictsController@index')->name('admin.districts');
  
 Route::get('/create', 'backend\DistrictsController@create')->name('admin.pages.district.create');

 Route::get('/edit/{id}', 'backend\DistrictsController@edit')->name('admin.pages.district.edit');
 
  Route::post('/create', 'backend\DistrictsController@store')->name('admin.district.store');
  
    Route::post('/edit/{id}', 'backend\DistrictsController@update')->name('admin.district.update');
    
     Route::post('/delete/{id}', 'backend\DistrictsController@delete')->name('admin.district.delete');
      

   });


Route::group(['prefix'=>'divisions'],function(){

  Route::get('/', 'backend\DivisionsController@index')->name('admin.divisions');
  
 Route::get('/create', 'backend\DivisionsController@create')->name('admin.pages.division.create');

 Route::get('/edit/{id}', 'backend\DivisionsController@edit')->name('admin.pages.divisions.edit');
 
  Route::post('/create', 'backend\DivisionsController@store')->name('admin.division.store');
  
    Route::post('/edit/{id}', 'backend\DivisionsController@update')->name('admin.division.update');
    
     Route::post('/delete/{id}', 'backend\DivisionsController@delete')->name('admin.division.delete');
      

   });
          
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



