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

Route::get('/re', function () {
    return view('test');
});

Route::get('/', function () {
    return view('client.index ');
});
// Route::get('/detail', function () {
//     return view('client.detail ');
// });
Route::get('/detail', 'DetailController@index')->name('home');
Route::get('summernote',array('as'=>'summernote.get','uses'=>'FileController@getSummernote'));

Route::post('summernote',array('as'=>'summernote.post','uses'=>'FileController@postSummernote'));
Route::get('/home', 'HomeController@index')->name('home');
Route::any('ajax/{id}','AjaxController@init');
Route::post('ajax/admin/subcate','AjaxController@subcates');
Route::post('ajax/admin/cates','AjaxController@cates');
Route::group(['prefix'=>'quantri','middleware'=>'auth'],function(){
    Route::group(['prefix'=>'cate'],function(){
        Route::get('list','CatesController@getList'); 
		Route::get('add','CatesController@getAdd');
		Route::post('add','CatesController@postAdd');

		Route::get('edit/{id}','CatesController@getEdit');
		Route::post('edit/{id}','CatesController@postEdit');

		Route::get('delete/{id}','CatesController@getDelete');
    });
    Route::group(['prefix'=>'subcate'],function(){
        Route::get('list','SubcatesController@getList');

		Route::get('add','SubcatesController@getAdd');
		Route::post('add','SubcatesController@postAdd');

		Route::get('edit/{id}','SubcatesController@getEdit');
		Route::post('edit/{id}','SubcatesController@postEdit');

		Route::get('delete/{id}','SubcatesController@getDelete');
    });

    Route::group(['prefix'=>'subphu'],function(){
        Route::get('list','SubphuController@getList');

		Route::get('add','SubphuController@getAdd');
		Route::post('add','SubphuController@postAdd');

		Route::get('edit/{id}','SubphuController@getEdit');
		Route::post('edit/{id}','SubphuController@postEdit');

		Route::get('delete/{id}','SubphuController@getDelete');
    });

    Route::group(['prefix'=>'new'],function(){
        Route::get('list','NewsController@getList');

		Route::get('add','NewsController@getAdd');
		Route::post('add','NewsController@postAdd');

		Route::get('edit/{id}','NewsController@getEdit');
		Route::post('edit/{id}','NewsController@postEdit');

		Route::get('delete/{id}','NewsController@getDelete');
    });

    Route::group(['prefix'=>'tuyendung'],function(){
        Route::get('list','TuyendungController@getList');

		Route::get('add','TuyendungController@getAdd');
		Route::post('add','TuyendungController@postAdd');

		Route::get('edit/{id}','TuyendungController@getEdit');
		Route::post('edit/{id}','TuyendungController@postEdit');

		Route::get('delete/{id}','TuyendungController@getDelete');
    });

    Route::group(['prefix'=>'static'],function(){
        Route::get('list','StaticController@getList');

		Route::get('add','StaticController@getAdd');
		Route::post('add','StaticController@postAdd');

		Route::get('edit/{id}','StaticController@getEdit');
		Route::post('edit/{id}','StaticController@postEdit');

		Route::get('delete/{id}','StaticController@getDelete');
    });

    Route::group(['prefix'=>'trailer'],function(){
        Route::get('list','TrailerController@getList');

		Route::get('add','TrailerController@getAdd');
		Route::post('add/{id}','TrailerController@postAdd');

		Route::get('edit/{id}','TrailerController@getEdit');
		Route::post('edit/{id}','TrailerController@postEdit');

		Route::get('delete/{id}','TrailerController@getDelete');
    });

    Route::group(['prefix'=>'dichvunew'],function(){
        Route::get('list','DichvuController@getList');

		Route::get('add','DichvuController@getAdd');
		Route::post('add/{id}','DichvuController@postAdd');

		Route::get('edit/{id}','DichvuController@getEdit');
		Route::post('edit/{id}','DichvuController@postEdit');

		Route::get('delete/{id}','DichvuController@getDelete');
    });

    Route::group(['prefix'=>'hoptac'],function(){
        Route::get('list','HoptacController@getList');

		Route::get('add','HoptacController@getAdd');
		Route::post('add/{id}','HoptacController@postAdd');

		Route::get('edit/{id}','HoptacController@getEdit');
		Route::post('edit/{id}','HoptacController@postEdit');

		Route::get('delete/{id}','HoptacController@getDelete');
    });


    Route::group(['prefix'=>'lienhe'],function(){
        Route::get('list','ContactCommentController@getList');

		Route::get('add','ContactCommentController@getAdd');
		Route::post('add/{id}','ContactCommentController@postAdd');

		Route::get('edit/{id}','ContactCommentController@getEdit');
		Route::post('edit/{id}','ContactCommentController@postEdit');

		Route::get('delete/{id}','ContactCommentController@getDelete');
    });


    Route::group(['prefix'=>'donggop'],function(){
        Route::get('list','DonggopController@getList');

		Route::get('add','DonggopController@getAdd');
		Route::post('add/{id}','DonggopController@postAdd');

		Route::get('edit/{id}','DonggopController@getEdit');
		Route::post('edit/{id}','DonggopController@postEdit');

		Route::get('delete/{id}','DonggopController@getDelete');
    });

    Route::group(['prefix'=>'customer'],function(){
        Route::get('list','CustomerController@getList');

		Route::get('add','CustomerController@getAdd');
		Route::post('add/{id}','CustomerController@postAdd');

		Route::get('edit/{id}','CustomerController@getEdit');
		Route::post('edit/{id}','CustomerController@postEdit');

		Route::get('delete/{id}','CustomerController@getDelete');
    });

    Route::get('/', function () {
        return view('admin.home.index');
    });
    Route::get('/news', function () {
        return view('admin.news.index');
    });
    Route::get('/add', function () {
        return view('admin.news.add');
    });
});
Auth::routes();