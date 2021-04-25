<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseUserController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Project\Category;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin\Users\User;
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

        return view('groups.user.pages.main.index', compact('user', 'categories'));
    }


    /**
     * @param string $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function user(string $name)
    {
        $user = User::with('categories', 'portfolio')
            ->where('name', $name)
            ->first();
        if ( !$user ){
            abort(404);
        }


//        dd($user->categories);

        return view('groups.user.pages.user.index', compact('user'));


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

    public function uploadImage(Request $request)
    {

        $path = Storage::disk(self::DISK)->put(Auth::id(),  $request->image);
        $update = User::findOrFail(Auth::id())->update([
            'image' => $path,
        ]);

        if ( $update )
        {
            return redirect()->back();
        }
    }

    /**
     * @param int $id
     */
    public function addCategory(int $id)
    {
        $create = Auth::user()->categories()->attach( $id );
        return redirect()->back();
    }

    public function removeCategory(int $id)
    {
        $remove = Auth::user()->categories()->detach( $id );
        return redirect()->back();
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
