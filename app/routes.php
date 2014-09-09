<?php
/**
 * Binds
 */
require_once app_path() . '/binds.php';
/**
 * AuthController
 */
Route::get('/signin', ['as' => 'signin', 'uses' => 'AuthController@getSignIn']);
Route::get('/signup', ['as' => 'signup', 'uses' => 'AuthController@getSignUp']);
Route::get('/activate', ['as' => 'activate', 'uses' => 'AuthController@getActivate']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

Route::post('/signin', ['uses' => 'AuthController@postSignIn']);
Route::post('/signup', ['uses' => 'AuthController@postSignUp']);
/**
 * RemindersController
 */
Route::get('/remind', ['as' => 'remind', 'uses' => 'RemindersController@getRemind']);
Route::post('/remind', ['uses' => 'RemindersController@postRemind']);

Route::get('/reset', ['as' => 'reset', 'uses' => 'RemindersController@getReset']);
Route::post('/reset', ['uses' => 'RemindersController@postReset']);
/**
 * ProfileController
 */
Route::group(
	['before' => 'auth', 'prefix' => 'profile/{user}'], function () {
		Route::get('/', ['as' => 'profile', 'uses' => 'UserController@getProfile'])
			 ->where('user', '[A-Za-z0-9]+');

		Route::post('/', ['uses' => 'UserController@postProfile']);

		Route::get('/verses', ['as' => 'profile_verses', 'uses' => 'UserController@getVerses'])
			 ->where('user', '[A-Za-z0-9]+');
	}
);
/**
 * HomeController
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showIndex']);