<?php





Route::group(['domain'=>env('ADMIN_DOMAIN','admin.cp.dev')] , function(){
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group( ['middleware' => 'auth'],function () {

    Route::get('/home', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);
    Route::get('/', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);

    Route::get('/goods', [
        'as' => 'goods', 'uses' => 'GoodsController@index'
    ]);

    Route::resource('categories', 'CategoriesController');
    Route::resource('stories', 'StoriesController');
    Route::resource('goods', 'GoodsController');

});

});

Route::group(['namespace'=>'Frontend'], function() {
    Route::get('/', [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);
});