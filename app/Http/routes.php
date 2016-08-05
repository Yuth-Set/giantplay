<?php
Route::get('/', 'ArticlesController@index');
Route::get('search', ['as' => 'articles.search', 'uses' => 'ArticlesController@search']);
Route::resource('articles', 'ArticlesController');
Route::resource('tags', 'TagsController');
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('protected', ['middleware' => ['auth', 'admin'], function () {
    return "this page requires that you be logged in and an Admin";
}

]);

Route::get('foo', ['middleware' => 'manager', function () {
    return 'This Page is Only for Managers';

}

]);

Route::get('items', 'ItemsController@index');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');