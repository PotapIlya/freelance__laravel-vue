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
        Route::post('/update/password/{id}', 'IndexController@updatePassword')->name('user.index.updatePassword');
        Route::post('/add/category/{id}', 'IndexController@addCategory')->name('user.index.addCategory');

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
