<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users\Role;
use App\Models\Admin\Users\User;
use Illuminate\Http\Request;

class UserController extends BaseAdminController
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
    	$users = User::with('role')->paginate(50);
        return view('groups.admin.pages.users.item.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


	/**
	 * @param $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
        return view('groups.admin.pages.users.item.show', compact('user'));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        $roles = Role::all();
        return view('groups.admin.pages.users.item.edit', compact('user', 'roles'));
    }


	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(Request $request, $id)
    {
        if ( User::findOrFail($id)->update($request->all()) )
        {
        	return redirect()->back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
