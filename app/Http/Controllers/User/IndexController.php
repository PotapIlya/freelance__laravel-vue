<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseUserController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Project\Category;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin\Users\User;


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
        $user = Auth::user();

        $categories = Category::getAll();

        return view('groups.user.pages.main.index', compact('user', 'categories'));
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

    public function addCategory(int $id)
    {
        dd($id);
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
     * @param Request $request
     * @param $id
     */
    public function updatePassword(Request $request, $id)
    {
        $array = $request->all();

        if ( $array['oldPassword'] === $array['password'] )
        {
            return redirect()->back()->withErrors(['errors' => 'старый и новый пароль совпадают']);
//            return response()->json(['errors' => 'старый и новый пароль совпадают']);
        }

        if (\Hash::check($array['oldPassword'], Auth::user()->password ))
        {
            $update = User::findOrFail( Auth::id() )->update([
                'password' => bcrypt($array['password'])
            ]);
            if ($update){
                return redirect()->back()->withInput(['success' => 'success']);
//                return response()->json(['success' => 'success']);
            }
        }
        else
        {
            return redirect()->back()->withErrors(['errors' => 'Старый пароль не верный']);
//            return response()->json(['errors' => 'You entered an invalid old password']);
        }


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
