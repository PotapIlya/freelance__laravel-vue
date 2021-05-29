<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseAdminController
{
	/**
	 * CategoryController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
    	$categories = Category::with('child')->where('parent_id', 0)->get();

        return view('groups.admin.pages.project.category.index', compact('categories'));
    }


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function create()
    {
    	$categories = Category::where('parent_id', 0)->get();
        return view('groups.admin.pages.project.category.create', compact('categories'));
    }


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
    {
        if ( Category::create( $request->all() ) ){
        	return redirect()->route('admin.categories.index');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit($id)
    {
		$category = Category::with('child')->findOrFail($id);
		return view('groups.admin.pages.project.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if ( Category::findOrFail($id)->update($request->all()) ){
			return redirect()->back();
		}
    }


	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
        if ( Category::destroy($id) ){
        	return redirect()->back();
		}
    }
}
