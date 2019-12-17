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

// Route::get('/', function () {
//     return view('homepage');
// });

Auth::routes();
Route::group(['middleware' => 'App\Http\Middleware\Authenticate'] , function(){
    
Route::get('/', 'HomeController@index')->name('home');
Route::get('/add_user','HomeController@create')->name('add_user');
Route::post('/adduserindb','Auth\regSecondController@register')->name('adduserindb');

Route::get('/addfile' , 'FilesDataController@create')->name('addfiles');
Route::post('/addfileindb' , 'FilesDataController@store')->name('addfilesindb');
Route::post('/getdepartajax' , 'DepartmentController@getDepartments')->name('getdepartajax');

Route::get('/updatefile' , 'FilesDataController@createUpdate')->name('updatefiles');
Route::post('/updatefileindb' , 'FilesDataController@storeUpdate')->name('updatefilesindb');
Route::post('/getdataajax' , 'FilesDataController@getAjaxData')->name('getdataajax');

Route::get('/trackfile' , 'FilesDataController@createTrackView')->name('trackfiles');
Route::post('/gethistoryajax' , 'FilesDataController@getAjaxHistory')->name('gethistoryajax');

Route::get('/changestatus/{id}','FilesDataController@changeStatus')->name('changestatus');
Route::get('/changestatusact/{id}','FilesDataController@changeStatusact')->name('changestatusact');
Route::get('/changevisible/{id}','TrackingDataController@changevisible')->name('changevisible');

});