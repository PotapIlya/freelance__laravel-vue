<?php

namespace App\Http\Controllers\User\Index;

use App\Http\Controllers\User\BaseUserController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Project\Category;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Models\Admin\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class IndexController extends BaseUserController
{
    /**
     * IndexController constructor.
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
        $user = User::with('categories.child')
            ->with(['portfolio' => function($query)
            {
                $query->take(4);
            }])
            ->find( Auth::id() );


        $categories = Category::getAll();

        return view('groups.user.pages.index.index', compact('user', 'categories'));
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
     * @param string $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $name)
    {
        $user = User::with('categories', 'portfolio')
            ->where('name', $name)
            ->first();
        if ( !$user ){
            abort(404);
        }

        // перенести в user.show
        return view('groups.user.pages.user.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
