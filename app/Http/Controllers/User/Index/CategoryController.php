<?php

namespace App\Http\Controllers\User\Index;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Services\User\Index\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseUserController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $id
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(int $id, Category $category)
    {
        if ( is_null($category->add($id)) ) {
            return redirect()->back();
        } else {
            abort(505);
        }
    }


    /**
     * @param int $id
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id, Category $category)
    {
        if ($category->delete( $id )){
            return redirect()->back();
        } else{
            abort(500);
        }
    }

}
