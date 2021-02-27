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

Route::post('/message', function (Illuminate\Http\Request $request)
{
    \App\Events\User\Chat\MessageEvent::dispatch($request->all());

});

Auth::routes();

/*
 * USER
 */
Route::group(
    [
        'prefix' => 'my',
        'middleware' => 'auth',
        'namespace' => '\App\Http\Controllers\User'
    ],
    function ()
    {

        Route::resource('/', 'IndexController')->names('user.index');
        Route::post('/uploadImage', 'IndexController@uploadImage')->name('user.index.uploadImage');
        Route::post('/update/password/{id}', 'IndexController@updatePassword')->name('user.index.updatePassword');
        Route::post('/add/category/{id}', 'IndexController@addCategory')->name('user.index.addCategory');
        Route::post('/remove/category/{id}', 'IndexController@removeCategory')->name('user.index.removeCategory');

        Route::get('/user/{name}', 'IndexController@user')->name('user.index.user');

        Route::group([
            'namespace' => 'Portfolio'
        ], function ()
        {
            Route::resource('/portfolio', 'PortfolioController')->names('user.portfolio');
            Route::resource('/comment', 'CommentsController')->names('user.comments');
            Route::post('/comment/store/{portfolio_id}', 'CommentsController@storeComment')->name('user.comments.storeComment');
        });



        Route::resource('/projects', 'ProjectsController')->names('user.projects');



        Route::post('/project/create/{id}', function (\Illuminate\Http\Request $redirect, $id)
        {
            \App\Models\Admin\Projects\Response::create([
                'project_id' => (int) $id,
                'user_id' => Auth::id(),
                'text' => $redirect->text,
            ]);
            return redirect()->back();
        });


        /**
         * CHAT
         */
        Route::group([
            'namespace' => 'Chat',
            'prefix' => 'chat'
        ], function ()
        {
            Route::resource('/', 'IndexController')->names('user.chat');
        });
    }
);

/*
 * ADMIN
 */
Route::group(
	[
		'prefix' => 'admin',
		'middleware' => ['auth', 'admin'],
		'namespace' => '\App\Http\Controllers\Admin'
	],
	function ()
	{
		Route::resource('/', 'IndexController')->names('admin.main');

		Route::group([
			'namespace' => 'Users'
		], function ()
		{
			Route::resource('/users', 'UserController')->names('admin.users');
			// ROLES
		});
		Route::group([
			'namespace' => 'Projects'
		], function ()
		{
			Route::resource('/project', 'ProjectController')->names('admin.project');
			Route::resource('/categories', 'CategoryController')->names('admin.categories');
			Route::resource('/response', 'ResponseController')->names('admin.response');
		});
	}
);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
