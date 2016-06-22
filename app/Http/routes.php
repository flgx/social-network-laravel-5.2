<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::post('/createpost',[
	'uses' => 'PostsController@store',
	'as'  => 'post.store'
]);
Route::get('/',[
	'uses' => 'HomeController@index',
	'as'  => 'welcome'
]);

Route::get('post/{id}/destroy',[
	'uses' => 'PostsController@destroy',
	'as'  => 'post.destroy'
]);
Route::post('/editpost',[
	'uses' => 'PostsController@update',
	'as'  => 'post.edit'
]);
Route::post('/likepost',[
	'uses' => 'PostsController@postLike',
	'as'  => 'post.like'
]);
Route::get('/profile',[
	'uses' => 'UserController@profile',
	'as'  => 'user.edit'
]);
Route::post('/update',[
	'uses' => 'UserController@update',
	'as'  => 'user.update'
]);
Route::get('/userimage/{filename}',[
	'uses' => 'UserController@getUserImage',
	'as'  => 'user.image'
]);
/*
Route::post('/edit',function(\Illuminate\Http\Request $request){
	return response()->json(['message' => $request->content]);
})->name('post.edit');
*/
Route::auth();

//Route::get('/home', 'HomeController@index');
