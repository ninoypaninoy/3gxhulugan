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

Auth::routes();
use Illuminate\Http\Request;

/*=========================== INDEX PAGE ROUTERS ==============================*/
Route::get('/', function () {
    return view('auth/login');
});


/*============================ HOME PAGE ROUTES ===============================*/
Route::get('/home', 'HomeController@index');

/*=========================== CUSTOMER PAGE ROUTES ==============================*/
Route::get('/customers', ['as' => 'create', 'uses' => 'CustomerController@create']);
Route::post('/customers', ['as' => 'customers_store', 'uses' => 'CustomerController@store']);

/*============================ PRODUCT PAGE ROUTES ===============================*/

//route for products layout file and another one for getting data
Route::get('/products',['uses' => 'SystemUsersController@getIndex']); 
Route::get('/products/getproducts', ['as'=>'products.getproducts','uses'=>'SystemUsersController@getProducts']);

/*============================ VALIDATION ROUTES ===============================*/
Route::get('customers/formValidation', 'CustomerController@formValidation');
Route::post('customers/formValidationPost', 'CustomerController@formValidationPost');

